<?php

namespace Peterzaccha\DyForm\Fields;

use Illuminate\Support\Facades\View;
use Peterzaccha\DyForm\Abstracts\Field;
use Peterzaccha\DyForm\Models\DyColumn;

class TextField extends Field
{
    public $blade = 'dyInput';
    public $value = null;
}