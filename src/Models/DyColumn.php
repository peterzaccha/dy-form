<?php

namespace Peterzaccha\DyForm\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed table_name
 * @property mixed name
 */
class DyColumn extends Model
{
    protected $fillable = ['name', 'label', 'render_type', 'rules', 'default', 'length', 'hint', 'table_name', 'database_type'];

    public function options()
    {
        return $this->belongsToMany(DyOption::class,
            'options_columns', 'column_id', 'option_id');
    }
}
