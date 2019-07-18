<?php

namespace Peterzaccha\DyForm\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Peterzaccha\DyForm\Models\DyForm;

class DyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $form = DyForm::find($this->route('form'));
        foreach ($form->columns as $column) {
            $rules[$column->name] = $column->rules.$column->required ? '|required' : '';
        }

        return $rules;
    }
}
