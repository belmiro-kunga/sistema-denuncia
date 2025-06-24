<?php

return [
    // Configurações de segurança do banco de dados
    'db' => [
        'sql_mode' => 'STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION',
        'ssl_mode' => 'require',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ],

    // Configurações de rate limiting
    'rate_limiting' => [
        'max_requests' => 60,
        'time_window' => 1, // em minutos
    ],

    // Configurações de criptografia
    'encryption' => [
        'key' => env('APP_KEY'),
        'cipher' => 'AES-256-CBC',
    ],

    // Configurações de sessão
    'session' => [
        'lifetime' => 120, // em minutos
        'encrypt' => true,
        'domain' => env('SESSION_DOMAIN'),
    ],

    // Configurações de cache
    'cache' => [
        'store' => 'database',
        'prefix' => env('CACHE_PREFIX', 'laravel_'),
    ],

    // Configurações de logs
    'logging' => [
        'level' => env('LOG_LEVEL', 'debug'),
        'channel' => env('LOG_CHANNEL', 'stack'),
    ],
];
