<?php


namespace Peterzaccha\DyForm\Fields;


use Illuminate\Support\Facades\View;
use Peterzaccha\DyForm\Interfaces\Field;
use Peterzaccha\DyForm\Models\DyColumn;

class FileField implements Field
{

    public $blade = 'dyInput';
    public $column;
    public function __construct(DyColumn $dyColumn)
    {
        $this->column = $dyColumn;
    }

    public function render()
    {
        return View::dyComponent($this->blade)->with([
            'name'=>$this->column->name,
            'type'=>'file',
            'label'=>$this->column->label,
            'required'=>$this->column->required,
        ]);
    }
}