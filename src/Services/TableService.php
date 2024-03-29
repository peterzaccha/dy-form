<?php

namespace Peterzaccha\DyForm\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class TableService
{
    public static $tableNameSchema = 'dytable_%';
    public static $defaultColumnsNumber = 4;

    /**
     * get the valid table name to migrate the next column
     * according to the max number of columns allowed.
     *
     * @return string
     */
    public static function getNextTableName()
    {
        $tables = static::getTablesCollection();
        if ($tables->isEmpty()) {
            return static::startTableSequence();
        } else {
            $columns = MigrationService::columnsInTable($tables->last());
            if ($columns->count() >= config('dy-form.maxColumns') + static::$defaultColumnsNumber) {
                $tableName = static::generateNewTableName($tables->last());
                MigrationService::startTable($tableName);

                return $tableName;
            } else {
                return $tables->last();
            }
        }
    }

    public static function startTableSequence()
    {
        $tableName = static::getTableNameByNumber();
        MigrationService::startTable($tableName);

        return $tableName;
    }

    /**
     * @return Collection
     */
    public static function getTablesCollection()
    {
        $database = Config::get('database.connections.mysql.database');
        $tables = DB::select("SHOW TABLES Like '".static::$tableNameSchema."'");
        $combine = 'Tables_in_'.$database.' ('.static::$tableNameSchema.')';
        $collection = new Collection();
        foreach ($tables as $table) {
            $collection->put($table->$combine, $table->$combine);
        }

        return $collection;
    }

    public static function generateNewTableName($prevTable)
    {
        $prevNumber = (int) explode('_', $prevTable)[1];

        return static::getTableNameByNumber(++$prevNumber);
    }

    public static function getTableNameByNumber($number = 1)
    {
        return str_replace('%', $number, static::$tableNameSchema);
    }
}
