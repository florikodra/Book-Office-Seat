<?php

namespace App\Http\Services;

use App\Http\Repositories\CompanyRepository;
use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class CompanyService extends Service
{
    /**
     * @var $companyRepository
     */
    protected $companyRepository;

    /**
     * PostService constructor.
     *
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Get all companies.
     *
     * @return String
     */
    public function getAll()
    {
        return $this->getResponseData($this->companyRepository->getAll());
    }

    /**
     * Validate company data.
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function saveCompany($data)
    {
        return $this->getResponseData($this->companyRepository->save($data));
    }

    /**
     * Update company data
     * Store to DB if there are no errors.
     *
     * @param array $data
     * @return String
     */
    public function updateCompany($data, $id)
    {

        DB::beginTransaction();

        try {
            $company = $this->companyRepository->update($data, $id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Unable to update company data');
        }

        DB::commit();

        return  $this->getResponseData($company);

    }


}