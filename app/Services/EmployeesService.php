<?php
namespace App\Services;

use App\Models\Employee;


class EmployeesService
{
    /**
     * Get all Employees from storage
     *
     * @param $paginationCount
     *
     * @return object Employees
     */

    public function getAll($paginationCount = 10)
    {
        if('all' === $paginationCount) {
            return Employee::with('company')->all();
        }
        return Employee::with('company')->paginate($paginationCount);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param $inputs
     *
     * @return object Employee
     */
    public function create($inputs)
    {
        $employee = Employee::create($inputs)->refresh();
        return  $employee;
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
        $employee = Employee::with('company')->find($id);
        return $employee->update($inputs);
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
        return Employee::with('company')->find($id);
    }

    /**
     * Delete a resource from storage
     *
     * @param $id
     *
     * @return deleted Employee
     */
    public function deleteById($id)
    {
        $employee = Employee::find($id);
        if($employee) {
            return $employee->delete();
        }
        return false;
    }
}
