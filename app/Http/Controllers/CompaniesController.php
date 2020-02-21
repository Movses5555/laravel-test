<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Services\CompaniesService;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\View
     */
    public function index(CompaniesService $companyService)
    {
        $companies = $companyService->getAll();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\View
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest;  $request
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Redirect
     */
    public function store(CompanyRequest $request, CompaniesService $companyService)
    {
        $companies = $companyService
            ->create($request
                ->only('name','email','website','logo')
            );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\View
     */
    public function show($id, CompaniesService $companyService)
    {
        $company = $companyService->getById($id);
        return view('companies.show' , compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\View
     */
    public function edit($id, CompaniesService $companyService)
    {
        $company = $companyService->getById($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest;  $request
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Redirect
     */
    public function update(CompanyRequest $request, $id, CompaniesService $companyService)
    {
        $company = $companyService
            ->updateById(
                $request->only('name','email','website','logo','full_logo'),
                $id
            );
        return redirect('companies', compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Redirect
     */
    public function destroy($id, CompaniesService $companyService)
    {
        $company = $companyService->getById($id);
        return redirect('companies', compact('company'));
    }
}
