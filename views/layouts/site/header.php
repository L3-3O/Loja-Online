<?php

declare(strict_types=1);

$descricaoHeader = $descricaoHeader
    ?? 'Frete grátis para todo o país em compras acima de R$ 199<';

$baseUrl = defined('BASE_URL')
    ? BASE_URL
    : '';

?>
<header class="bg-dark text-white py-2 small d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-start">
                    <span class="me-3"><i class="bi bi-truck me-1"></i> <?=htmlspecialchars($descricaoHeader,ENT_QUOTES,'UTF-8')?></span>
                    <span><i class="bi bi-telephone me-1"></i> (11) 4002-8922</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="rastrear-pedido" class="text-white text-decoration-none me-3">Rastrear pedido</a>
                    <a href="ajuda" class="text-white text-decoration-none">Central de ajuda</a>
                </div>
            </div>
        </div>
    </header>