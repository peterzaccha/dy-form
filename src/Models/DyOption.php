<?php

namespace Peterzaccha\DyForm\Models;

use Illuminate\Database\Eloquent\Model;

class DyOption extends Model
{

    protected $fillable = ['name','hint'];

    public function columns()
    {
        return $this->belongsToMany(DyOption::class,
            'options_columns','option_id', 'column_id');
    }
}
