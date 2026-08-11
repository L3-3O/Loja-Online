<?php

declare(strict_types=1);

use App\Controllers\Site\UserCriarController;

return [
    [
        'method' => 'GET',
        'path' => '/user_criar',
        'action' => [
            UserCriarController::class,
            'index',
        ],
    ],
   
];
