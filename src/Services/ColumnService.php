<?php
namespace Peterzaccha\DyForm\Services;


use Peterzaccha\DyForm\Factories\FieldFactory;
use Peterzaccha\DyForm\Models\DyColumn;

class ColumnService
{
    private $column;
    public function __construct(DyColumn $column)
    {
        $this->column = $column;
    }

    public function render(){
        $fieldFactory = new FieldFactory();
        $field = $fieldFactory->getField($this->column->render_type);
        return $field->render();
    }
}