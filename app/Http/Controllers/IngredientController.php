<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB ;
use mysql_xdevapi\Exception;

class IngredientController extends Controller
{
    //
    public function fillWareHouse()
    {
        DB::table('ingredients')
            ->update([
                'stock' => DB::raw('stock+1')
            ]);
    }

    public static function wareHouseFirstLoad()
    {

        $firstIngredients = json_decode(file_get_contents('D:\backend\php\snappfood test\sample_prject1\sample_project\app\Http\Controllers\ingredients.json'));
        foreach ($firstIngredients->ingredients as $ingredient)
        {
            try {
                DB::table('ingredients')
                    ->insert([
                        "title" => $ingredient->title,
                        "best_before" => $ingredient->best_before,
                        "expires_at" => $ingredient->expires_at,
                        "stock" => $ingredient->stock
                    ]);
            }  catch (ErrorException $e){}

        }

    }

    public static function cookFoods()
    {

        $food_index= 1 ;
        $foods = json_decode(file_get_contents('D:\backend\php\snappfood test\sample_prject1\sample_project\app\Http\Controllers\foods.json'));
        foreach ($foods->recipes as $food)
        {
            // add foods to the data base
            DB::table('foods')
                ->insert([
                    "title" => $food->title,
                ]);

            // add relations to the database

            foreach($food->ingredients as $ingredient)
            {
//                $ingredient_exists = DB::table('ingredients')
//                    ->where('title' , $ingredient)
//                    ->exists();
//
//                if($ingredient_exists == false)


                try{
                DB::table('food_ingredients')
                    ->insert([
                        'food_id' => DB::table('foods')->max('id'),
                        'ingredients_id' => DB::table('ingredients')
                            ->where('title', $ingredient)
                            ->get(['id'])[0]
                            ->id
                    ]);
                } catch (\ErrorException $e) {

                }
            }

        }
    }

}
