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
        $user = config('dy-form.userInstance')($this, $form);

        foreach ($form->columns as $column) {
            if ($column->render_type == 'file' ){
                if (!$user->getColumnValue($column)){
                    $rules[$column->name] = $column->rules.$column->required ? '|required' : '';
                }
            }else{
                $rules[$column->name] = $column->rules.$column->required ? '|required' : '';
            }
        }

        return $rules;
    }
}
