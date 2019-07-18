<?php

namespace Peterzaccha\DyForm\Abstracts;

class MultipleField extends Field
{
    public $blade = 'dySelect';
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
