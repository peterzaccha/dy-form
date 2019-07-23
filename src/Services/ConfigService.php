<?php


namespace Peterzaccha\DyForm\Services;


use Illuminate\Support\Facades\Auth;
use Peterzaccha\DyForm\Models\DyForm;
use Peterzaccha\DyForm\Requests\DyRequest;

class ConfigService
{
    public static function getUserInstance(DyRequest $request, DyForm $form){
        return Auth::user();
    }

    public static function getFilePath($columnName){
        return $columnName;
    }

}