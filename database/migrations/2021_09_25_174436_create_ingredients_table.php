<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('best-before');
            $table->dateTime('expires-at');
            $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients' , function (Blueprint $table){

            $table->dropColumn('id');
            $table->dropColumn('title');
            $table->dropColumn('best-before');
            $table->dropColumn('expires-at');
            $table->dropColumn('stock');
        });
    }
}
