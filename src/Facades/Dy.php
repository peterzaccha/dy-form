<?php
namespace Peterzaccha\DyForm\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static create(array $array)
 * @method static createColumn(array $array)
 * @method static addColumn($form, $second)
 * @method static render($form)
 * @method static submit($find, $find1,array $data)
 * @method static addOption($first, $createOption)
 * @method static createOption(array $array)
 */
class Dy extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'dy';
    }
}
