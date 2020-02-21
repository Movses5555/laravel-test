<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;
use App\Services\CompaniesService;
use App\Services\EmployeesService;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\View
     */
    public function index(EmployeesService $employeeService)
    {
        $employees = $employeeService->getAll();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\View
     */
    public function create(CompaniesService $companyService)
    {
        $companies = $companyService->getAll();
        return view('employees.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Redirect
     */

    public function store(EmployeeRequest $request, EmployeesService $employeeService)
    {
        $employees = $employeeService
            ->create($request
                ->only('firstname', 'lastname', 'email', 'phone', 'company_id')
            );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\View
     */
    public function show($id, EmployeesService $employeeService)
    {
        $employee = Employee::find($id);
        return view('employees.show' , compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\View
     */
    public function edit($id, EmployeesService $employeeService, CompaniesService $companyService )
    {
        $employee = $employeeService->getById($id);
        $companies = $companyService->getAll();
        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Redirect
     */
    public function update(EmployeeRequest $request, $id, EmployeesService $employeeService)
    {
        $employee = $employeeService->updateById(
            $request->only('firstname', 'lastname', 'email', 'phone', 'company_id'),
            $id
        );
        return redirect('employees', compact('employee'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Redirect
     */
    public function destroy($id, EmployeesService $employeeService)
    {
        $employee = $employeeService->deleteById($id);
        return redirect('employees', compact('employee'));
    }
}
