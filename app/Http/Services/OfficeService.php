<?php

namespace App\Http\Services;

use App\Http\Repositories\OfficeRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class OfficeService
{
    /**
     * @var $officeRepository
     */
    protected $officeRepository;

    /**
     * OfficeService constructor.
     *
     * @param OfficeRepository $officeRepository
     */
    public function __construct(OfficeRepository $officeRepository)
    {
        $this->officeRepository = $officeRepository;
    }

    /**
     * Get all offices.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->officeRepository->getAll();
    }

    /**
     * Get all offices by company id.
     *
     * @param $id
     * @return String
     */
    public function getAllOfficesByCompanyId($id)
    {
        return $this->officeRepository->getAllOfficesByCompanyId($id);
    }

    /**
     * Validate office data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveOffice($data)
    {
        

        $result = $this->officeRepository->save($data);

        return $result;
    }

}