<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms_columns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('column_id');
            $table->unsignedBigInteger('form_id');

            $table->foreign('column_id')->on('dy_columns')->references('id')->onDelete('cascade');
            $table->foreign('form_id')->on('dy_forms')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms_columns');
    }
}
