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
                $table->$fun($column->name,$column->length)->nullable();
            }else{
                $table->$fun($column->name)->nullable();
            }
        });
    }

    public static function dropColumn(DyColumn $column)
    {
        Schema::table($column->table_name, function(Blueprint $table) use ($column)
        {
            $table->dropColumn([$column->name]);
        });

        if (static::columnsInTable($column->table_name)->count() <= TableService::$defaultColumnsNumber ){
            Schema::dropIfExists($column->table_name);
        }

        return true;
    }

    public static function columnsInTable($tableName){
        return  collect(Schema::getColumnListing($tableName));
    }

    public static function columnExist($tableName,$column){
        return Schema::hasColumn($tableName, $column);
    }

}