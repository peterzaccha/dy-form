<?php
Route::group([
    'namespace'=>'Peterzaccha\DyForm\Controllers',
    'middleware'=>config('dy-form.middleware')
],function (){
    Route::post('dy-form-submit/{form}','DyController@submit')->name('dyform.submit');
});
