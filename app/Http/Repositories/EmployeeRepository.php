<?php

namespace App\Http\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    /**
     * @var Employee
     */
    protected $employee;

    /**
     * EmployeeRepository constructor.
     *
     * @param Employee $employee
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    /**
     * Get all employees.
     *
     * @return Employee $employee
     */
    public function getAll()
    {
        return $this->employee->with('company')->get();
    }

    /**
     * Get employees by company id
     *
     * @param $id
     * @return mixed
     */
    public function getAllEmployeesByCompanyId($id)
    {
        return $this->employee->where('company_id', $id)->get();
    }

    /**
     * Save Employee
     *
     * @param $data
     * @return Employee
     */
    public function save($data)
    {
        $employee = new $this->employee;
        $employee->first_name = $data['first_name'];
        $employee->last_name = $data['last_name'];
        $employee->payroll_no = $data['payroll_no'];
        $employee->email = $data['email'];
        $employee->company_id = $data['company_id'];
        $employee->save();

        return $employee->fresh();
    }
}