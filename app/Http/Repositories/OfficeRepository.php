<?php

namespace App\Http\Repositories;

use App\Models\Office;

class OfficeRepository
{
    /**
     * @var Office
     */
    protected $office;

    /**
     * OfficeRepository constructor.
     *
     * @param Office $office
     */
    public function __construct(Office $office)
    {
        $this->office = $office;
    }

    /**
     * Get all offices.
     *
     * @return Office $office
     */
    public function getAll()
    {
        return $this->office->with('company')->get();
    }

    /**
     * Get offices by company id
     *
     * @param $id
     * @return mixed
     */
    public function getAllOfficesByCompanyId($id)
    {
        return $this->office->where('company_id', $id)->get();
    }

    /**
     * Save office
     *
     * @param $data
     * @return Office
     */
    public function save($data)
    {
        $office = new $this->office;
        $office->address = $data['address'];
        $office->no_seats = $data['no_seats'];
        $office->company_id = $data['company_id'];
        $office->save();

        return $office->fresh();
    }
}