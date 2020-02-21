<?php
namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class CompaniesService
{
    /**
     * Get all Companies from storage
     * @param $paginationCount
     *
     * @return object Company
     */
    public function getAll($paginationCount = 10)
    {
        if('all' === $paginationCount) {
            return Company::all();
        }
        return Company::paginate($paginationCount);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param $inputs
     *
     * @return object Company
     */
    public function create($inputs)
    {
        $file = $inputs['logo'];
        if (getType($file) !== 'string') {
            $fileName = time().$file->getClientOriginalName();
            Storage::disk('public')->put($fileName, File::get($file));
            $file = $fileName;
        }
        $inputs['logo'] = $file;
        $company = Company::create($inputs)->refresh();
        return  $company;
    }

    /**
     * Store a updated resource in storage
     *
     * @param $inputs
     * @param $id
     *
     * @return boolean
     */
    public function updateById($inputs, $id)
    {
        $company = Company::find($id);
        if (isset($inputs['logo']) && $company['logo'] && $company['logo'] !== $inputs['logo']) {
            Storage::delete('public/'.$company->logo);
        }
        return $company->update($inputs);
    }

    /**
     * Get resource from storage
     *
     * @param $id
     *
     * @return object Employee
     */
    public function getById($id)
    {
        return Company::find($id);
    }

    /**
     * Delete a resource from storage
     *
     * @param $id
     *
     * @return deleted Company
     */
    public function deleteById($id)
    {
        $company = Company::find($id);
        if($company) {
            if ($company->logo) {
                Storage::delete('public/'.$company->logo);
            }
            return $company->delete();
        }
        return false;
    }
}

