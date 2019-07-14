<?php

namespace Peterzaccha\DyForm\Factories;


use Peterzaccha\DyForm\Fields\FileField;
use Peterzaccha\DyForm\Fields\TextField;
use Peterzaccha\DyForm\Models\DyColumn;

class FieldFactory
{

    public function getField(DyColumn $column)
    {
        $class = $this->correspondingFields()->firstWhere('type', ctype_lower($column->render_type))['class'];
        return new $class($column);
    }

    private function correspondingFields()
    {
        return collect(config('dy-form.factory'));
    }


}