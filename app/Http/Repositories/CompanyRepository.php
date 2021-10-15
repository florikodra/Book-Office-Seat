<?php

namespace App\Http\Repositories;

use App\Models\Company;

class CompanyRepository
{
    /**
     * @var Company
     */
    protected $company;

    /**
     * CompanyRepository constructor.
     *
     * @param Company $company
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get all companies.
     *
     * @return Company $company
     */
    public function getAll()
    {
        return $this->company->get();
    }

    /**
     * Save Company
     *
     * @param $data
     * @return Company
     */
    public function save($data)
    {
        $company = new $this->company;
        $company->name = $data['name'];
        $company->save();

        return $company->fresh();
    }

    /**
     * Update Company
     *
     * @param $data
     * @return Company
     */
    public function update($data, $id)
    {
        
        $company = $this->company->find($id);
        $company->name = $data['name'];
        $company->update();

        return $company;
    }
}