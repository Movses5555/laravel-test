<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\Controller;
use App\Services\CompaniesService;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompaniesService $companyService)
    {
        $companies = $companyService->getAll();
        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\CompanyRequest  $request
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request, CompaniesService $companyService)
    {
        $companies = $companyService
            ->create($request
                ->only('name','email','website','logo','full_logo')
            );
        return response()->json($companies);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, CompaniesService $companyService)
    {
        $company = $companyService->getById($id);
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CompanyRequest  $request
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id, CompaniesService $companyService)
    {
        $company = $companyService
            ->updateById(
                $request->only('name','email','website','logo','full_logo'),
                $id
            );
        return response()->json($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param App\Services\CompaniesService $companyService
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CompaniesService $companyService)
    {
        $company = $companyService->deleteById($id);
        return response()->json(null, 204);
    }
}
