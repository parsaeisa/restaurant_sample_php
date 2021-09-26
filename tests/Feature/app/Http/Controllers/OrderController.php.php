<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_status()
    {

        $response = $this->get('/menu');

        $response->assertStatus(200);
    }

    public function test_show_foods_with_ingredients()
    {
        $response = $this->get('/menu');


    }

}
