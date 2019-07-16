<?php

namespace Peterzaccha\DyForm\Fields;

use Illuminate\Support\Str;
use Peterzaccha\DyForm\Abstracts\MultipleField;

class MultipleFileField extends MultipleField
{
    public $blade = 'dyInput';
    public $type = 'file';

    public function mapInput(array $input)
    {
        $paths = [];
        foreach ($input as $file) {
            $path = config('dy-form.filesPath')($this->column->name);
            array_push($paths, $file->storeAs($path, Str::random(30).time().'.'.$file->clientExtension()));
        }
        parent::mapInput($paths);
    }
}
