<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection ;

class food extends Model
{
    use HasFactory;

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,
            'food_ingredients',
            'food_ingredients',
            'food_id',
            'ingredients_id')
            ->withPivot('food_ingredients');
    }
}
