<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDyColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dy_columns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('label');
            $table->enum('database_type',[
                'bigInteger',
                'boolean',
                'char',
                'date',
                'dateTime',
                'float',
                'integer',
                'longText',
                'mediumInteger',
                'mediumText',
                'string',
                'text',
                'time',
            ])->default('string');
            $table->string('render_type')->default('text');
            $table->string('rules')->nullable();
            $table->string('default')->nullable();
            $table->bigInteger('length')->nullable();
            $table->string('hint')->nullable();
            $table->string('table_name');

            $table->boolean('migrated')->default(0);
            $table->boolean('options')->default(0);
            $table->boolean('required')->default(0);
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
        Schema::dropIfExists('dy_columns');
    }
}
