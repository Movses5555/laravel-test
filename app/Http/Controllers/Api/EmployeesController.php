<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;
use App\Services\EmployeesService;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EmployeesService $employeeService)
    {
        $employees = $employeeService->getAll();
        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Response
     */

    public function store(EmployeeRequest $request, EmployeesService $employeeService)
    {
        $employees = $employeeService
            ->create($request
                ->only('firstname', 'lastname', 'email', 'phone', 'company_id')
            );
        return response()->json($employees, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, EmployeesService $employeeService)
    {
        $employee = $employeeService->getById($id);
        return response()->json($employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\EmployeeRequest  $request
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id, EmployeesService $employeeService)
    {
        $employee = $employeeService->updateById(
            $request->only('firstname', 'lastname', 'email', 'phone', 'company_id'),
            $id
        );
        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\Services\EmployeesService $employeeService
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, EmployeesService $employeeService)
    {
        $employee = $employeeService->deleteById($id);
        return response()->json($employee);
    }
}
