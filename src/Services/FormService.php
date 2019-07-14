<?php

namespace Peterzaccha\DyForm\Services;


use Peterzaccha\DyForm\Models\DyForm;

class FormService
{
    private $form;
    private $user = null;

    public function __construct(DyForm $form)
    {
        $this->form = $form;
    }

    public function render()
    {

        $compact = [
            'form' => $this->form,
            'action' => 'dd',
            'user'=>$this->user
        ];
        //$this->form->columns->each(function ());
        return view('vendor.dyform.dyrender.form')->with($compact);
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

}