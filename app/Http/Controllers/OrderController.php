<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB ;
use App\Models\Food ;

class OrderController extends Controller
{

    public function menu()
    {

        $response = array();
        foreach (Food::all() as $food)
        {
            $ingredient_titles = array();
            $is_food_ready = true ;

            foreach ($food->ingredients as $ingredient )
            {
                if($ingredient->stock == 0 || $ingredient->expires_at < date("Y-m-d"))
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

    public function order($food_id)
    {

        $food = Food::where('title' , $food_id)
            ->first();
        foreach ($food->ingredients as $ingredient)
        {

            DB::table('ingredients')
                ->where('id', $ingredient->id)
                ->update([
                    'stock' => DB::raw('stock-1')
                ]);
        }

    }
}
