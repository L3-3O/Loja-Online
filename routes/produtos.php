<?php

declare(strict_types=1);

use App\Controllers\Site\ProdutoController;

return [
    [
        'method' => 'GET',
        'path' => '/produtos',
        'action' => [
            ProdutoController::class,
            'index',
        ],
    ],
   
];
