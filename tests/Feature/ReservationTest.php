<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    public function test_create_reservation()
    {
        $data = [
            "office_id" => 1,
            "employee_id" => 1,
            "seat_no" => 1,
            "date" => '2021-10-18',
            "start_at" => '10:01',
            "end_at" => '12:00'
        ];

        $this->post(route('reserve.seat'), $data)
            ->assertStatus(200);
    }
}
