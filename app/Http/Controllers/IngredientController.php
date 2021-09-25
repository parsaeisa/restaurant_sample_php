<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB ;

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

}
