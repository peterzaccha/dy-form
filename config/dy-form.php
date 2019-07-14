<?php

use Peterzaccha\DyForm\Fields\FileField;
use Peterzaccha\DyForm\Fields\TextField;

return [
    'columnModel'=>'Peterzaccha\DyForm\Models\DyColumn',
    'optionModel'=>'Peterzaccha\DyForm\Models\DyOption',
    'formModel'=>'Peterzaccha\DyForm\Models\DyForm',
    'maxColumns' => 1,
    'factory'=>[
        ['type'=>'text','class'=>TextField::class],
        ['type'=>'file','class'=>FileField::class],
    ]
];