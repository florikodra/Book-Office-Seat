<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Exception;
use App\Http\Services\CompanyService;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{

    /**
     * @var companyService
     */
    protected $companyService;

    /**
     * CompanyController Constructor
     *
     * @param CompanyService $companyService
     *
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $result = $this->companyService->getAll();
        return response()->json($result, $result['status']);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompanyRequest $request)
    {
    
        $result = $this->companyService->saveCompany($request->validated());
        return response()->json($result, $result['status']);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompanyRequest $request, $id)
    {
        
        $result = $this->companyService->updateCompany($request->validated(), $id);
        return response()->json($result, $result['status']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
