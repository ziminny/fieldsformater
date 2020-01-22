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
* Adicionar o servidor de serviços em conf/app.php
    'aliases' => [
.....

Ziminny/Fieldformater/main/FieldsFormaterServiceProvider

];
```
- Gerando dados randômicos
```php
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Ziminny\Fieldsformater\main\DataFormater

$factory->define(Model::class, function (Faker $faker) {
    $cpf = new DataFormater();
    return [
        'name' => $cpf->getCpf()// ou $cpf->getCpf()->valid() //  somente cpf validos
    ];
});
```

  - Arquivo dataFormaterAll.php
  ```php
<?php

return [
    'cpf' => [
        'signal' => false, // Se definido como false ignora os sinais e retorna o valor 123456789
        'first' => '.',    //
        'second' => '.', //   Definição de cada intervalo
        'third' => '-',   //
    ]
];
```


