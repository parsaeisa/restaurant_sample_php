<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB ;
use Illuminate\Database\Eloquent\Collection ;

class OrderController extends Controller
{
    //

    public function menu()
    {
        $food = DB::table('foods')->find(1);
        var_dump($food);
        return $food->ingredients;

        $menu = DB::table('foods')
            ->get()
            ->jsonSerialize();

        $response = array();
//        dd($menu);
        foreach ($menu as $food)
        {
            dd($food->ingredients);
            $food_with_grediens = array(
                'title' => $food->title,
//                "ingredients" => $food ->ingredients
            );

            array_push($response, $food_with_grediens );
        }

        return $response ;

    }
}
