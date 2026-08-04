<?php

declare(strict_types=1);

use App\Controllers\Admin\AdminController;

return [
    [
        'method' => 'GET',
        'path' => '/admin',
        'action' => [
            AdminController::class,
            'formulario',
        ],
    ],
    [
        'method' => 'POST',
        'path' => '/admin',
        'action' => [
            AdminController::class,
            'autenticar',
        ],
    ],
    [
        'method' => 'POST',
        'path' => '/admin',
        'action' => [
            AdminController::class,
            'sair',
        ],
    ],
];
