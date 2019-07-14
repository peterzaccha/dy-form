<?php

namespace Peterzaccha\DyForm;

use Peterzaccha\DyForm\Models\DyColumn;
use Peterzaccha\DyForm\Models\DyOption;
use Peterzaccha\DyForm\Services\FormService;
use Peterzaccha\DyForm\Services\MigrationService;
use Peterzaccha\DyForm\Services\TableService;

class DyForm
{
    public function createOption(array $fillable){
        $optionModel = config('dy-form.optionModel');
        $option = new $optionModel($fillable);
        $option->save();
        return $option;
    }

    public function addOption(DyColumn $column,DyOption $option){
        $column->options()->attach($option->id);
        return $column->options;
    }

    public function addNextColumn(DyOption $option,DyColumn $column){
        $option->nextColumns()->attach($column->id);
        return $option->nextColumns;
    }

    public function createColumn(array $fillable){
        $columnModel = config('dy-form.columnModel');
        $fillable['table_name'] =TableService::getNextTableName();
        $column = new $columnModel($fillable);
        $column->save();
        $column->refresh();
        MigrationService::createColumn($column);

        return $column;
    }

    public function create(array $fillable){
        $formModel = config('dy-form.formModel');
        $form = new $formModel($fillable);
        $form->save();
        return $form;
    }

    public function addColumn(\Peterzaccha\DyForm\Models\DyForm $form, DyColumn $column){
        $form->columns()->attach($column->id);
        return $form->columns;
    }

    public function dropColumn(DyColumn $column){
        MigrationService::dropColumn($column);
        return $column->delete();
    }

    public function render(\Peterzaccha\DyForm\Models\DyForm $form){
        $formService = new FormService($form);
        return $formService->render();
    }

}