<?php

namespace Peterzaccha\DyForm\Traits;

use Exception;
use Illuminate\Support\Facades\DB;
use Peterzaccha\DyForm\Models\DyColumn;
use Peterzaccha\DyForm\Models\DyForm;

trait CanSubmit
{
    public function getColumnValue(DyColumn $column)
    {
        $name = $column->name;

        try {
            return DB::table($column->table_name)->where('user_id', $this->id)->select($name)->first()->$name;
        } catch (Exception $exception) {
            return;
        }
    }

    public function getFormValues(DyForm $form)
    {
        $values = [];
        foreach ($form->columns as $column) {
            $values[$column->name] = $this->getColumnValue($column);
        }

        return collect($values);
    }
}
