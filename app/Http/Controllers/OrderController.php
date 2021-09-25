<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Database\Eloquent\Collection ;
use App\Models\Food ;

class OrderController extends Controller
{

    public function menu()
    {

        $menu = Food::all();

        $response = array();
        foreach ($menu as $food)
        {
            $gredient_titles = array();

            foreach ($food->ingredients as $gredient )
                array_push($gredient_titles , $gredient->title);


            $food_with_grediens = array(
                'title' => $food->title,
                "ingredients" => $gredient_titles
            );


            array_push($response, $food_with_grediens );
        }

        return $response ;

    }
}
