<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' =>  'required',
            'lastname' =>  'required',
            'company' =>  'required',
            'email' =>  'required',
            'phone' =>  'required|digits_between:2,10'
        ]);
        $employee = $request->all();
        Employee::create($employee);
        return redirect()->back();
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
        return view('employee.show' , compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editEmpl = Employee::find($id);
        return view('employee.edit', compact('editEmpl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee_info = $request->all();
        $employee = Employee::find($id);

        // if(!in_array("logo", $employee_info)){
        //     $company_info['logo'] = $employee['logo'];
        // }else {
        //     $logo = $request->file('logo');
        //     $logoName = time().$logo->getClientOriginalName();
        //     Storage::disk('public/employee')->put($logoName, File::get($logo));
        //     $employee_info['logo'] = $logoName;
        // }
        $employee->update($employee_info);

        return redirect('employee');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Employee::find($id);
        $del->delete();
        return redirect('employee');
    }
}
