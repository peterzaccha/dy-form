<?php


namespace Peterzaccha\DyForm\Services;


use Exception;
use Illuminate\Support\Facades\DB;
use Peterzaccha\DyForm\Factories\FieldFactory;
use Peterzaccha\DyForm\Models\DyForm;

class SubmitService
{

    public $user;
    public $form;
    public $data;

    public function __construct($user, DyForm $form, array $data)
    {
        $this->data = $data;
        $this->form = $form;
        $this->user = $user;
    }

    public function submit(){
        try{
            $data= collect($this->data)->map(function ($value,$column){
                $columnModel = $this->form->columns()->where('name',$column)->first();
                $field = (new FieldFactory())->getField($columnModel);
                return method_exists($field,'mapInput') ? $field->mapInput($value) : $value;
            });
            $data['user_id'] = $this->user->id;
            $this->form->getTables()->each(function ($table) use ($data){
                DB::table($table)->updateOrInsert(['user_id'=>$data['user_id']],$data->filter(function ($value,$column) use($table){
                    return MigrationService::columnExist($table,$column);
                })->all());
            });
            return true;
        }catch (Exception $exception){
            return false;
        }
    }

}