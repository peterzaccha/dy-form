<?php

use Illuminate\Support\Facades\Auth;
use Peterzaccha\DyForm\Fields\CheckBoxField;
use Peterzaccha\DyForm\Fields\ColorField;
use Peterzaccha\DyForm\Fields\DateField;
use Peterzaccha\DyForm\Fields\EmailField;
use Peterzaccha\DyForm\Fields\FileField;
use Peterzaccha\DyForm\Fields\MonthField;
use Peterzaccha\DyForm\Fields\MultipleFileField;
use Peterzaccha\DyForm\Fields\NumberField;
use Peterzaccha\DyForm\Fields\PasswordField;
use Peterzaccha\DyForm\Fields\RadioButtonField;
use Peterzaccha\DyForm\Fields\RangeField;
use Peterzaccha\DyForm\Fields\SelectField;
use Peterzaccha\DyForm\Fields\SelectMultipleField;
use Peterzaccha\DyForm\Fields\TextAreaField;
use Peterzaccha\DyForm\Fields\TextField;
use Peterzaccha\DyForm\Fields\TimeField;
use Peterzaccha\DyForm\Fields\UrlField;
use Peterzaccha\DyForm\Fields\WeekField;
use Peterzaccha\DyForm\Models\DyForm;
use Peterzaccha\DyForm\Requests\DyRequest;

return [
    'columnModel'=> 'Peterzaccha\DyForm\Models\DyColumn',
    'optionModel'=> 'Peterzaccha\DyForm\Models\DyOption',
    'formModel'  => 'Peterzaccha\DyForm\Models\DyForm',
    'userModel'=>'App\User',
    'maxColumns' => 30,
    'factory'    => [
        ['type'=>'text', 'class'=>TextField::class],
        ['type'=> 'file', 'class'=>FileField::class],
        ['type'=> 'select', 'class'=> SelectField::class],
        ['type'=> 'selectMultiple', 'class'=> SelectMultipleField::class],
        ['type'=> 'checkbox', 'class'=> CheckBoxField::class],
        ['type'=> 'radioButton', 'class'=> RadioButtonField::class],
        ['type'=> 'textArea', 'class'=> TextAreaField::class],
        ['type'=> 'number', 'class'=> NumberField::class],
        ['type'=> 'color', 'class'=> ColorField::class],
        ['type'=> 'date', 'class'=> DateField::class],
        ['type'=> 'email', 'class'=> EmailField::class],
        ['type'=> 'month', 'class'=> MonthField::class],
        ['type'=> 'multipleFile', 'class'=> MultipleFileField::class],
        ['type'=> 'password', 'class'=> PasswordField::class],
        ['type'=> 'range', 'class'=> RangeField::class],
        ['type'=> 'time', 'class'=> TimeField::class],
        ['type'=> 'url', 'class'=> UrlField::class],
        ['type'=> 'week', 'class'=> WeekField::class],
    ],
    'middleware'  => ['web','auth'],
    'userInstance'=>'\Peterzaccha\DyForm\Services\ConfigService::getUserInstance',
    'filesPath'=>'\Peterzaccha\DyForm\Services\ConfigService::getFilePath',
];
