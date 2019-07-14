<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDyOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dy_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('hint')->nullable();
            $table->unsignedBigInteger('next_column')->nullable();
            $table->foreign('next_column')->on('dy_columns')->references('id')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dy_options');
    }
}
