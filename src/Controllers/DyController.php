<?php

namespace Peterzaccha\DyForm\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Peterzaccha\DyForm\Facades\Dy;
use Peterzaccha\DyForm\Models\DyForm;
use Peterzaccha\DyForm\Requests\DyRequest;

class DyController extends Controller
{
    public function submit(DyRequest $request, $form){
        $form = DyForm::findOrFail($form);
        $user = config('dy-form.userInstance')($request,$form);
        Dy::submit($user, $form,$request->all());
        return redirect()->back();
    }
}
