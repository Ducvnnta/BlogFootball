<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rank_category_id');
            $table->string('name');
            $table->integer('total');
            $table->integer('win');
            $table->integer('equal');
            $table->integer('difference');
            $table->integer('score');
            $table->integer('rank');
            $table->timestamps();

            $table->index(['rank_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ranks');
    }
}
