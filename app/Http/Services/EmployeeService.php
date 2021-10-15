<?php

namespace App\Http\Services;

use App\Http\Repositories\EmployeeRepository;
use App\Models\Office;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class EmployeeService extends Service
{
    /**
     * @var $employeeRepository
     */
    protected $employeeRepository;

    /**
     * EmployeeService constructor.
     *
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Get all employees.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->getResponseData($this->employeeRepository->getAll());
    }

    /**
     * Get all employees by company id.
     *
     * @param $id
     * @return String
     */
    public function getAllOfficesByCompanyId($id)
    {
        return $this->getResponseData($this->employeeRepository->getAllOfficesByCompanyId($id));
    }

    /**
     * Validate employee data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveEmployee($data)
    {
        return $this->getResponseData($this->employeeRepository->save($data));
    }


}