<?php

namespace Peterzaccha\DyForm\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TableService
{
    public static $tableNameSchema = 'dytable_%';

    public static function getNextTableName()
    {
        $tables = static::getTablesCollection();
        if ( $tables->isEmpty()){
            $tableName = str_replace('%',1,static::$tableNameSchema);
            MigrationService::startTable($tableName);
            return $tableName;
        }else{
            $columns = collect(Schema::getColumnListing($tables->last()));
            if ($columns->count() >= config('dy-form.maxColumns') + 4){
                $tableName = static::generateNewTableName($tables->last());
                MigrationService::startTable($tableName);
                return $tableName;
            }else{
                return $tables->last();
            }
        }
    }

    public static function getTablesCollection(){
        $database = Config::get('database.connections.mysql.database');
        $tables = DB::select("SHOW TABLES Like '".static::$tableNameSchema."'");
        $combine = "Tables_in_".$database .' ('.static::$tableNameSchema.')';

        $collection = new Collection();
        foreach($tables as $table){
            $collection->put($table->$combine, $table->$combine);
        }
        return $collection;
    }

    public static function generateNewTableName($prevTable){
        $prevNumber = (int) explode('_',$prevTable)[1];
        return str_replace('%',++$prevNumber,static::$tableNameSchema);
    }
}