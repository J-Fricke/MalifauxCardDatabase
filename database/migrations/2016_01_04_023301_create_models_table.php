<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->tinyInteger('cost')->unsigned()->nullable();
            $table->tinyInteger('cache')->unsigned()->nullable();
            $table->tinyInteger('Df')->unsigned();
            $table->tinyInteger('Wp')->unsigned();
            $table->tinyInteger('Wd')->unsigned();
            $table->tinyInteger('Wk')->unsigned();
            $table->tinyInteger('Cg')->unsigned()->nullable();
            $table->tinyInteger('Ht')->unsigned()->default(2);
            $table->tinyInteger('base_size')->default(30);
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('models');
    }
}
