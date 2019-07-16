<?php


namespace Peterzaccha\DyForm\Fields;


use Peterzaccha\DyForm\Abstracts\MultipleField;

class CheckBoxField extends MultipleField
{
    public $blade = 'dyCheck';
    public $multiple = true;
    public $type = 'checkbox';
}