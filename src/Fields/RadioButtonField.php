<?php


namespace Peterzaccha\DyForm\Fields;


use Peterzaccha\DyForm\Abstracts\Field;
use Peterzaccha\DyForm\Models\DyColumn;

class RadioButtonField extends Field
{
    public $blade = 'dyCheck';
    public $type = 'radio';
}