<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    public function test_create_company()
    {
        $data = [
            'name' => "Unit Test"
        ];

        $this->post(route('companies.store'), $data)
            ->assertStatus(200);
            //->assertJson($data);
    }
}
