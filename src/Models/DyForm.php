<?php

namespace Peterzaccha\DyForm\Models;

use Illuminate\Database\Eloquent\Model;

class DyForm extends Model
{
    protected $fillable = ['name'];
    public function columns()
    {
        return $this->belongsToMany(DyColumn::class,
            'forms_columns',  'form_id','column_id');
    }
}
