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
            $ingredient_titles = array();
            $is_food_ready = true ;

            foreach ($food->ingredients as $ingredient )
            {
                if($ingredient->stock == 0)
                {
                    $is_food_ready = false ;
                    break ;
                }


                array_push($ingredient_titles, $ingredient->title);
            }

            if($is_food_ready == false)
                continue ;

            $food_with_grediens = array(
                'title' => $food->title,
                "ingredients" => $ingredient_titles
            );

            array_push($response, $food_with_grediens );
        }

        return $response ;

    }
}
