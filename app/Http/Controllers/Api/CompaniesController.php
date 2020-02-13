<?php

namespace App\Http\Controllers\API;

use Auth;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        // return view('companies.index', compact('companies'));
        return response()->json($companies);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('companies.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = $request->all();

        $create = Company::create($company)->refresh();

        return response()->json($create);
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
        return response()->json($company);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $companyInfo = $request->all();

        $company = Company::find($id);

        if (isset($companyInfo['logo']) && $company['logo'] && $company['logo'] !== $companyInfo['logo']) {
            Storage::delete('public/'.$company->logo);
        }
        $newCompany = $company->update($companyInfo);
        return response()->json([
            'request' => $companyInfo,
            'Module' => $company,
            'new Company' => $newCompany
            ]);
        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company->logo) {
            Storage::delete('public/'.$company->logo);
        }
        $company->delete();
        return response()->json('Company deleted succesfully');

        // return redirect('companies')->back()->with('success', 'Company is deleted');
    }
}

