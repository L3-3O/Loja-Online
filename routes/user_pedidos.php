<?php

declare(strict_types=1);

use App\Controllers\Site\UserPedidoController;

return [
    [
        'method' => 'GET',
        'path' => '/user_pedido',
        'action' => [
            UserPedidoController::class,
            'index',
        ],
    ],
   
];
