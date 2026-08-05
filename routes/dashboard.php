<?php

declare(strict_types=1);

use App\Controllers\Admin\DashboardController;

return [
    [
        'method' => 'GET',
        'path' => '/dash',
        'action' => [
            DashboardController::class,
            'index',
        ],
    ],
     [
        'method' => 'POST',
        'path' => '/dash',
        'action' => [
            DashboardController::class,
            'index',
        ],
    ],
];
