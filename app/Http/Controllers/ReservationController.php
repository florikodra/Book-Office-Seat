<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Services\CompanyService;
use App\Http\Services\ReservationService;
use App\Http\Requests\GetReservationRequest;
use App\Http\Requests\StoreReservationRequest;


class ReservationController extends Controller
{

    /**
     * @var reservationService
     */
    protected $reservationService;

    /**
     * ReservationController Constructor
     *
     * @param ReservationService $reservationService
     *
     */
    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    /**
     * Create Blade File
     * 
     */
    public function create(CompanyService $companies){

        $data = [
            'companies' => $companies->getAll(),
        ];

        return view("booking.create", $data);
    }

    /**
     * Get all reserved seats.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getReservedSeats(GetReservationRequest $request)
    {
        
        $result = ['status' => 200];

        try {
            $result['data'] = $this->reservationService->getReservedSeats($request->validated());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }


     /**
     * Reserve a seat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reserveSeat(StoreReservationRequest $request)
    {
        
        $result = ['status' => 200];

        try {
            $result['data'] = $this->reservationService->reserveSeat($request->validated());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
