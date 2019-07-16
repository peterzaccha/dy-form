<?php

use Illuminate\Support\Facades\Auth;
use Peterzaccha\DyForm\Fields\FileField;
use Peterzaccha\DyForm\Fields\SelectField;
use Peterzaccha\DyForm\Fields\TextField;
use Peterzaccha\DyForm\Models\DyForm;
use Peterzaccha\DyForm\Requests\DyRequest;

return [
    'columnModel'=>'Peterzaccha\DyForm\Models\DyColumn',
    'optionModel'=>'Peterzaccha\DyForm\Models\DyOption',
    'formModel'=>'Peterzaccha\DyForm\Models\DyForm',
    'maxColumns' => 10,
    'factory'=>[
        ['type'=>'text','class'=>TextField::class],
        ['type'=>'file','class'=>FileField::class],
        ['type'=>'select','class'=> SelectField::class],
    ],
    'middleware'=>'auth',
    'userInstance'=>function(DyRequest $request, DyForm $form){
        return Auth::user();
    },
    'filesPath'=>function($columnName){
        return $columnName;
    }
];