<?php

namespace Peterzaccha\DyForm\Abstracts;

use Illuminate\Support\Facades\View;
use Peterzaccha\DyForm\Models\DyColumn;

class Field implements \Peterzaccha\DyForm\Interfaces\Field
{
    public $blade;
    public $column;
    public $type = 'text';
    public $value = null;
    public $multiple = false;

    public function __construct(DyColumn $column)
    {
        $this->column = $column;
    }

    public function render()
    {
        $compact = [
            'name'    => $this->getName(),
            'type'    => $this->type,
            'label'   => $this->column->label,
            'required'=> $this->column->required,
            'value'   => $this->value,
            'options' => $this->column->options,
        ];

        $this->multiple ? $compact['multiple'] = true : '';

        return View::dyComponent($this->blade)->with($compact);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getName()
    {
        return $this->column->name;
    }
}
