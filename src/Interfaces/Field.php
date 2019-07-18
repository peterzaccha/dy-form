<?php

namespace Peterzaccha\DyForm\Interfaces;

use Peterzaccha\DyForm\Models\DyColumn;

interface Field
{
    public function __construct(DyColumn $column);

    public function render();

    public function setValue($value);
}
