<?php

namespace Peterzaccha\DyForm\Factories;


use Peterzaccha\DyForm\Fields\FileField;
use Peterzaccha\DyForm\Fields\TextField;
use Peterzaccha\DyForm\Models\DyColumn;

class FieldFactory
{

    public function getField(DyColumn $column)
    {
        $class = $this->correspondingFields()->where('type', $column->render_type)->first()['class'];
        return new $class($column);
    }

    private function correspondingFields()
    {
        return collect(config('dy-form.factory'));
    }


}