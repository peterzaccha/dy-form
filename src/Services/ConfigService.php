<?php


namespace Peterzaccha\DyForm\Services;


use Peterzaccha\DyForm\Models\DyForm;
use Peterzaccha\DyForm\Requests\DyRequest;

class ConfigService
{
    public static function getUserInstance(DyRequest $request, DyForm $form){
        return \App\User::find(1);
    }

    public static function getFilePath($columnName){
        return $columnName;
    }

}