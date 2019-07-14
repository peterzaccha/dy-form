<?php
namespace Peterzaccha\DyForm\Services;


use Peterzaccha\DyForm\Factories\FieldFactory;
use Peterzaccha\DyForm\Models\DyColumn;
use Peterzaccha\DyForm\Traits\CanSubmit;

class ColumnService
{
    private $column;
    private $user = null;
    public function __construct(DyColumn $column, $user = null)
    {
        $this->column = $column;
        $this->user = $user;
    }

    public function render(){
        $fieldFactory = new FieldFactory();
        $field = $fieldFactory->getField($this->column);
        if ($user = $this->user){
            $field->setValue($user->getColumnValue($this->column));
        }
        return $field->render();
    }
}