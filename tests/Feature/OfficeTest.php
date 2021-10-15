<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfficeTest extends TestCase
{
    public function test_create_office()
    {
        $data = [
            "address" => 'Albania',
            "no_seats" => 50,
            "company_id" => 1,  
        ];

        $this->post(route('offices.store'), $data)
            ->assertStatus(200);
    }
}
