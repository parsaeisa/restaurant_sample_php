<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB ;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    //
    public function fillWareHouse()
    {
        DB::table('ingredients')
            ->update([
                'stock' => 23
            ]);
    }

}
