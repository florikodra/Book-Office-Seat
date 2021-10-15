<?php

namespace App\Http\Repositories;

use App\Models\Reservation;

class ReservationRepository
{
    /**
     * @var reservation
     */
    protected $reservation;

    /**
     * ReservationRepository constructor.
     *
     * @param Reservation $reservation
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Return Reservated Seats
     *
     * @param $data
     */
    public function getReservedSeats($data)
    {

        $query = $this->reservation::query();

        if($data['office_id']){
            $query->where('office_id',"=", $data['office_id']);
        }

        if($data['employee_id']){
            $query->where('employee_id',"=", $data['employee_id']);
        }

        if($data['seat_no']){
            $query->where('seat_no',"=", $data['seat_no']);
        }

        if($data['date']){
            $query->where('date',"=", $data['date']);
        }

        if($data['start_at'] && $data['end_at']){
            $query->where(function($q) use($data) {
                $q->whereRaw('? BETWEEN start_at AND end_at', $data['start_at'])
                    ->orWhereRaw('? BETWEEN start_at AND end_at', $data['end_at'])
                    ->orWhereRaw('start_at BETWEEN "'. $data['start_at'].'" AND "'. $data['end_at'].'"');
            });
        }

        return $query->with('office','employee','office.company')->get();
    }

    /**
     * Reserve Seat
     *
     * @param $data
     * @return Reservation
     */
    public function saveSeat($data)
    {
        $reservation = new $this->reservation;
        $reservation->office_id = $data['office_id'];
        $reservation->employee_id = $data['employee_id'];
        $reservation->seat_no = $data['seat_no'];
        $reservation->date = $data['date'];
        $reservation->start_at = $data['start_at'];
        $reservation->end_at = $data['end_at'];
        $reservation->save();

        return $reservation->fresh();
    }

}