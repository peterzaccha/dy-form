dy-form
===
[![License](https://poser.pugx.org/peterzaccha/dy-form/license)](https://packagist.org/packages/peterzaccha/dy-form)
[![Latest Stable Version](https://poser.pugx.org/peterzaccha/dy-form/v/stable)](https://packagist.org/packages/peterzaccha/dy-form)

Installation
---
You can install the package via composer:

```bash
composer require peterzaccha/dy-form
```

If you are using Laravel in a version < 5.5, the service provider must be registered as a next step:

```php
// config/app.php
'providers' => [
    ...
    Peterzaccha\DyForm\DyFormServiceProvider::class
];
```
You can publish the views ,migrations and config by 
running : 

```bash
php artisan vendor:publish --provider="peterzaccha/dy-form"
php artisan migrate
```

Usage
---

Creating Forms
```php
$form = Dy::create(['name'=>'myForm']);
```

Creating Columns
```php
$column = Dy::createColumn(['name'=>'myColumn','label'=>'My Column','render_type'=>'text']);
```

Add columns to the form
```php
Dy::addColumn($form,$column);
```

Add options to column
```php
Dy::addOption($column,Dy::createOption(['name'=>'one','value'=>'1']));
```

Submit form
```php
Dy::submit($user, \Peterzaccha\DyForm\Models\DyForm::find(1),[
    'columnName' => 'column value',
]);

//or from request

Dy::submit($user, \Peterzaccha\DyForm\Models\DyForm::find(1),$request->all());
```

Using CanSubmit trait
```php
<?php

namespace App;
use Peterzaccha\DyForm\Traits\CanSubmit;

class User extends Authenticatable
{
    use CanSubmit;
}
```
Now you can do

```php
use Peterzaccha\DyForm\Models\DyColumn;

$column = DyColumn::find(1);
$user->getColumnValue($column);
//return the user submitted value in that column
```


```php
use Peterzaccha\DyForm\Models\DyForm;

$form = DyForm::find(1);
$user->getFormValues($form);
//return [ 'colum1'=>'value1' , 'column2'=>'value2' ]
```


Render Types
===
- checkbox
- color
- date
- email
- file
- month
- multipleFile
- number
- password
- push (soon)
- radioButton
- range
- select
- selectMultiple
- textarea
- time
- url
- week

Render
===

You can use the component dy-form
```html
<dy-form :form="$formId" :user="$userModelObject">
    <input type="submit">
</dy-form>
```


Changelog
---
Check [CHANGELOG](CHANGELOG.md) for the changelog

Testing
---
To run tests use

    $ composer test

Contributing
---


Security
---
If you discover any security related issues, please email p.pator@outlook.com or use the issue tracker of GitHub.

About
---

License
---
The MIT License (MIT). Please see [License File](LICENSE) for more information.