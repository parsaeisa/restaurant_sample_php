<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Http\Controllers\IngredientController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IngredientControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

//        $response->assertTrue($response)

        $response->assertStatus(200);
    }

    public function test_ingredient_first_load ()
    {
        $this->assertDatabaseHas('ingredients' , [
            "title" => "Lettuce",
            "best_before" => "2020-07-25",
            "expires_at" => "2020-07-27",
            "stock" => 3
        ]);

        $this->assertDatabaseHas('foods' , [
            "title" => "Ham and Cheese Toastie"
        ]);

    }
}
