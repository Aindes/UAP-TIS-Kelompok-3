<?php

return [
    'secret' => env('JWT_SECRET'),
    'ttl' => 60,
    'algo' => 'HS256',
    'user' => 'App\Models\Mahasiswa',
    'identifier' => 'nim',
];
