### Este projeto se encontra em contrução 
     --   CLASSE CPF PRONTA PARA USO       
     --   CLASSE RG PRONTA PARA USO        
     --   CLASSE TELEFONE PRONTA PARA USO 

# Field Formater LARAVEL

#### Sobre
Gerador de campos randomicos formato pt-br

#### Instalacao 

* Instalando o pacote
```bash
composer require ziminny/fieldsformater
```
* Adicionar o arquivo dataFormaterAll.php
```bash 

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
        'cpf'  =>  Fields::cpf(), // retorna um cpf valido cpf()->valid()
        'rg'   =>  Fields::rg(),
        'cell' =>  Fields::phones()->cellPhone(),
        'phone'=>  Fields::phones()->residentialPhone()
    ];

});
```

  - Arquivo config/dataFormaterAll.php
  ```php
<?php

return [
                          // ********************************* //
                          //                CPF                //
                          // ********************************* //
    'cpf' => [
        'signal' => true, // Se definido como false ignora os sinais e retorna o valor 12345678910
        'first' => '.',
        'second' => '.',  // Definição de cada intervalo
        'third' => '-',

    ],
                          // ********************************* //
                          //                RG                 //
                          // ********************************* //
    'rg' => [
        'signal' => true,
        'first' => '.',
        'second' => '.',
        'third' => '-',
],
                          // ********************************* //
                          //                PHONES             //
                          // ********************************* //

...

];

```


