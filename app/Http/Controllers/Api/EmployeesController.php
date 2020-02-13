<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\EmployeeRequest;
use App\Http\Controllers\Controller;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        $companies = Company::all();
        $result = [
            'companies' => $companies,
            'employees' => $employees,
        ];
        // return view('employees.index', compact('employees','companies'));
        // return response()->json($employees);
        return response()->json($result);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     if(request()->session()->has('errors')) {
    //         // dd(request()->session());
    //     }
    //     $companies = Company::all();
    //     // dd($companies);
    //     return view('employees.create', compact('companies'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(EmployeeRequest $request)
    {
        // dd('gggggg');
        $employee = $request->all();
        // dd($request->all());
        $employee = Employee::create($employee);
        //dd($employee);

        return response()->json('Employee is add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show' , compact('employee'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $employee = Employee::find($id);
    //     $companies = Company::all();
    //     return view('employees.edit', compact('employee','companies'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {

        $employeeInfo = $request->all();



        $employee = Employee::find($id);
        // return response()->json($employee);
        //dd($employeeInfo);
        $emp = $employee->update($employeeInfo);
        //dd(response()->json($employee));
        // return redirect('employees');

        return response()->json([
            'REQUEST' => $employeeInfo,
            'MODEL' => $employee,
            'isModel' =>  $emp
            ]);

        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('Employee deleted succesfully');

        // $employee = Employee::find($id);
        // $employee->delete();
        // // return response()->json('ggggggggggggggg');
        // return redirect()->back();
    }
}
