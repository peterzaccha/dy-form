<?php

namespace Peterzaccha\DyForm\Fields;

use Illuminate\Support\Facades\View;
use Peterzaccha\DyForm\Interfaces\Field;
use Peterzaccha\DyForm\Models\DyColumn;

class TextField implements Field
{
    public $blade = 'dyInput';
    public $value = null;
    public $column;
    public function __construct(DyColumn $dyColumn)
    {
        $this->column = $dyColumn;
    }

    public function render()
    {
        return View::dyComponent($this->blade)->with([
            'name'=>$this->column->name,
            'type'=>'text',
            'label'=>$this->column->label,
            'required'=>$this->column->required,
            'value'=>$this->value
        ]);
    }

    public function mapInput($input){
        return $input;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}