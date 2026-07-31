<?php

declare(strict_types=1);


use App\Controllers\Site\AdmloginController;


return [
    [
        'method' => 'GET',
        'path' => '/logadm',
        'action' => [
            AdmloginController::class,
            'index',
        ],
    ],
];
