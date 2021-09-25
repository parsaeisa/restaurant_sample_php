<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
//    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'foods';

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class
            , 'food_ingredients'
            ,  'food_id'
            ,"ingredients_id");
    }
}
