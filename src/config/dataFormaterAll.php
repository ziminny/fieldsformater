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
      'phones' =>
          [
                   /* celular */
          'cell' =>[
              'codeCountry' =>
                  [
                      'signal' => true,       // Se definido como false ignora os sinais e retorna o valor 55
                      'first' => '+',
                      'second' => ' ',
                      'retireNumber' => 'no'  // se definido com yes retira o cód 55 OBS :. se yes definir signal como false
                  ],
              'codeState'   =>
                  [
                      'signal' => true,       // Se definido como false ignora os sinais e retorna dois numeros aleatorios sem carac Ex:. 12
                      'first' => '(',
                      'second' => ')',
                      'third' => ' ',
                      'retireNumber' => 'no'  // se definido com yes retira o cód 12 OBS :. se yes definir signal como false
                  ],
              'number' =>
                  [
                       'signal' => true,// se definido com false retira o hífen e imprime Ex:. 912341234
                       'first' => '-',
              ]
          ],
                  /* resodencial */
          'residential' =>
              [
                  'all' => true,
                  'codeCountry' =>
                      [
                          'signal' => true,
                          'first' => '+',
                          'second' => ' ',
                      ],
                  'codeState'   =>
                      [
                          'signal' => true,
                          'first' => '(',
                          'second' => ')',
                          'third' => ' '
                      ],
                  'number' => [
                      'signal' => true,
                      'first' => '-'
                  ]
          ]
      ],

    'class' => [
        'Rg' => Ziminny\Fieldsformater\fields\Rg::class,
        'Cpf' =>Ziminny\Fieldsformater\fields\Cpf::class,
        'Cell' =>Ziminny\Fieldsformater\fields\Cell::class,
        'Residential' =>Ziminny\Fieldsformater\fields\Residential::class,


    ]

];
