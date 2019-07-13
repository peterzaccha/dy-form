<?php

namespace Peterzaccha\DyForm\Models;

use Illuminate\Database\Eloquent\Model;

class DyColumn extends Model
{
    protected $fillable = ['name','label','render_type','rules','default','length','hint','table_name'];
    public function options()
    {
        return $this->belongsToMany(DyColumn::class,
            'options_columns', 'column_id', 'option_id');
    }
}
