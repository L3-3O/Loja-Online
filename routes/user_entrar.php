<?php

declare(strict_types=1);

use App\Controllers\Site\UserEntrarController;

return [
    [
        'method' => 'GET',
        'path' => '/user_entrar',
        'action' => [
            UserEntrarController::class,
            'index',
        ],
    ],
   
];
