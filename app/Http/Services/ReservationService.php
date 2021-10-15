<?php

namespace App\Http\Services;

use App\Http\Repositories\ReservationRepository;
use App\Models\Reservation;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ReservationService
{
    /**
     * @var $reservationRepository
     */
    protected $reservationRepository;

    /**
     * ReservationService constructor.
     *
     * @param ReservationRepository $reservationRepository
     */
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    /**
     * Validate reservation data.
     *
     * @param array $data
     * @return Array
     */
    public function getReservedSeats($data)
    { 

        return $this->reservationRepository->getReservedSeats($data);
        
    }

    /**
     * Reserve a seat for employee.
     *
     * @param array $data
     * @return String
     */
    public function reserveSeat($data)
    { 

        $result = $this->reservationRepository->getReservedSeats($data);

        if($result->count() > 0){
            throw new InvalidArgumentException($result);
        }
        
        return $this->reservationRepository->saveSeat($data);
    }

}