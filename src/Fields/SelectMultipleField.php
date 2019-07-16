<?php


namespace Peterzaccha\DyForm\Fields;


use Peterzaccha\DyForm\Abstracts\Field;

class SelectMultipleField extends Field
{

    public $column;
    public $blade = 'dySelect';
    public $value;
    public $multiple = true;

    public function setValue($value)
    {
        $this->value = explode(',', $value);
    }

    public function getName()
    {
        return $this->column->name.'[]';
    }

    public function mapInput(array $input)
    {
        return implode(',', $input);
    }
}