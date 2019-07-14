<?php

namespace Peterzaccha\DyForm\Services;


use Peterzaccha\DyForm\Models\DyForm;

class FormService
{
    private $dyform;
    public function __construct(DyForm $dyForm)
    {
        $this->dyform = $dyForm;
    }

    public function render(){
        $form = $this->dyform;
        return view('vendor.dyform.dyrender.form')->with([
            'form'=>$form,
            'action'=>'dd'
        ]);
    }

}