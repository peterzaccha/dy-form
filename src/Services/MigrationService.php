<?php

namespace Peterzaccha\DyForm\Services;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Peterzaccha\DyForm\Models\DyColumn;

class MigrationService
{
    public static function startTable($tableName){
        Schema::create($tableName, function(Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public static function createColumn(DyColumn $column){
        Schema::table($column->table_name, function(Blueprint $table) use ($column)
        {
            $fun = $column->database_type;
            if ($column->length){
                $table->$fun($column->name,$column->length);
            }else{
                $table->$fun($column->name);
            }
        });
    }

}