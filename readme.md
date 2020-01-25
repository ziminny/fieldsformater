### Este projeto se encontra em contrução

# Field Formater LARAVEL

#### Sobre
Gerador de campos randomicos formato pt-br

#### Instalacao 

* Instalando o pacote
```bash
composer require ziminny/generatefieldsrandon
```
* Adicionar arquivo de configuração
```bash 
php artisan vendor:publish --provider="Ziminny/Fieldformater/main/FieldsFormaterServiceProvider" --tag=configure
```
```bash 
* Adicionar o arquivo dataFormaterAll.php
php artisan vendor:publish --provider="Ziminny\Fieldsformater\main\FieldsFormaterServiceProvider" --tag=configure
```

* Service Provider
```php

    'aliases' => [
...

 Ziminny\Fieldsformater\main\FieldsFormaterServiceProvider::class,
...

];

```
- Gerando dados randômicos
```php
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\User;
use Ziminny\Fieldsformater\main\Fields;

$factory->define(Cliente::class, function (Faker $faker) {

    return [
        'cpf' =>  Fields::Cpf()->get()->valid(), // retorna um cpf valido
    ];

});
```

  - Arquivo config/dataFormaterAll.php
  ```php
<?php

return [
    'cpf' => [
        'signal' => true, // Se definido como false ignora os sinais e retorna o valor Ex .: 123456789
        'first' => '.',    //
        'second' => '.', //   Definição de cada intervalo
        'third' => '-',   //
    ]
];
```


