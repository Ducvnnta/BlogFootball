<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('new_id');
            $table->boolean('is_start')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->index(['user_id']);

            $table->foreign('new_id')->references('id')->on('news')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->index(['new_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
