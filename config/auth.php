<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'mahasiswas',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'mahasiswas',
        ],
    ],

    'providers' => [
        'mahasiswas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Mahasiswa::class,
        ],
    ],
];
