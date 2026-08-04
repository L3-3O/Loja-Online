<?php

declare(strict_types=1);

use App\Controllers\Admin\AdminLoginController;

return [
    [
        'method' => 'GET',
        'path' => '/logadm',
        'action' => [
            AdminLoginController::class,
            'formulario',
        ],
    ],
    [
        'method' => 'POST',
        'path' => '/logadm',
        'action' => [
            AdminLoginController::class,
            'autenticar',
        ],
    ],
    [
        'method' => 'POST',
        'path' => '/logadm',
        'action' => [
            AdminLoginController::class,
            'sair',
        ],
    ],
];
