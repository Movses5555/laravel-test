<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'name' =>  'required',
            'logo' =>  'required|file|dimensions:min_width=100,min_height=100',
        ]);
        $logo = $request->file('logo');
        $logoName = time().$logo->getClientOriginalName();
        Storage::disk('public')->put($logoName, File::get($logo));

        $company = $request->all();
        $company['logo'] = $logoName;
        Company::create($company);
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
        $company = Company::find($id);
        return view('company.show' , compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editComp = Company::find($id);
        return view('company.edit', compact('editComp'));
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
        $company_info = $request->all();
        $company = Company::find($id);

        if(!in_array("logo", $company_info)){
            $company_info['logo'] = $company['logo'];
        }else {
            $logo = $request->file('logo');
            $logoName = time().$logo->getClientOriginalName();
            Storage::disk('public/company')->put($logoName, File::get($logo));
            $company_info['logo'] = $logoName;
        }
        $company->update($company_info);

        return redirect('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = Company::find($id);
        $del->delete();
        return redirect('company');
    }
}
