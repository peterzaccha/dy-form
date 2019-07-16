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

    public function __construct(DyColumn $column)
    {
        $this->column = $column;
    }

    public function render()
    {
        return View::dyComponent($this->blade)->with([
            'name'=>$this->column->name,
            'type'=>$this->type,
            'label'=>$this->column->label,
            'required'=>$this->column->required,
            'value'=>$this->value,
            'options'=> $this->column->options
        ]);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
