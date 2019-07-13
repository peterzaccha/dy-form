<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options_columns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('column_id');
            $table->unsignedBigInteger('option_id');

            $table->foreign('column_id')->on('dy_columns')->references('id')->onDelete('cascade');
            $table->foreign('option_id')->on('dy_options')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options_columns');
    }
}
