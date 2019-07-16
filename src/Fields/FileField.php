<?php


namespace Peterzaccha\DyForm\Fields;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Peterzaccha\DyForm\Abstracts\Field;
use Peterzaccha\DyForm\Models\DyColumn;

class FileField extends Field
{

    public $blade = 'dyInput';
    public $type = 'file';
    public $column;

    public function mapInput(UploadedFile $input){
        $path = config('dy-form.filesPath')($this->column->name);
        return $input->storeAs($path,Str::random(30).time().'.'.$input->clientExtension());
    }

}