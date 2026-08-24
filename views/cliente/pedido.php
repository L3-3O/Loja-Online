<?php

declare(strict_types=1);

use App\Helpers\View;

$statusBadges = [
    'aguardando_pagamento' => ['class' => 'text-bg-warning', 'label' => 'Aguardando Pagamento'],
    'pago'                 => ['class' => 'text-bg-info', 'label' => 'Pagamento Aprovado'],
    'em_separacao'         => ['class' => 'text-bg-warning', 'label' => 'Em Preparação'],
    'enviado'              => ['class' => 'text-bg-primary', 'label' => 'Enviado'],
    'entregue'             => ['class' => 'text-bg-success', 'label' => 'Entregue'],
    'cancelado'            => ['class' => 'text-bg-danger', 'label' => 'Cancelado'],
];
$badge = $statusBadges[$pedido['status']] ?? ['class' => 'text-bg-secondary', 'label' => $pedido['status']];
$end = $pedido['endereco'];
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedido #<?= htmlspecialchars($pedido['codigo']) ?> | Loja Online</title>
    <base href="/loja-online/public/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>

<body class="bg-light">
    <?php View::componenteCliente('cliente/nav'); ?>
    <main class="py-5">
        <div class="container">
            <!-- CABEÇALHO -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <a href="cliente/pedidos" class="text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i> Voltar para meus pedidos
                    </a>
                    <h1 class="h3 fw-bold mt-3 mb-1">
                        Pedido #<?= htmlspecialchars($pedido['codigo']) ?>
                    </h1>
                    <p class="text-muted mb-0">
                        Realizado em <?= date('d/m/Y \à\s H:i', strtotime($pedido['criado_em'])) ?>
                    </p>
                </div>
                <span class="badge <?= $badge['class'] ?> px-3 py-2 fs-6">
                    <i class="bi bi-box-seam me-1"></i> <?= $badge['label'] ?>
                </span>
            </div>

            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <!-- PRODUTOS DO PEDIDO -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h2 class="h5 fw-bold mb-0">
                                <i class="bi bi-cart-check text-primary me-2"></i> Produtos do Pedido
                            </h2>
                        </div>
                        <div class="card-body">
                            <?php foreach ($pedido['itens'] as $index => $item): ?>
                                <?php if ($index > 0): ?><hr><?php endif; ?>
                                <div class="row align-items-center g-3">
                                    <div class="col-8 col-md-5">
                                        <h3 class="h6 fw-bold mb-1"><?= htmlspecialchars($item['nome_produto']) ?></h3>
                                        <small class="text-muted">Quantidade: <?= (int)$item['quantidade'] ?></small>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <small class="text-muted d-block">Preço unitário</small>
                                        <strong>R$ <?= number_format((float)$item['preco_unitario'], 2, ',', '.') ?></strong>
                                    </div>
                                    <div class="col-6 col-md-4 text-md-end">
                                        <small class="text-muted d-block">Subtotal</small>
                                        <strong>R$ <?= number_format((float)$item['subtotal'], 2, ',', '.') ?></strong>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- ENDEREÇO DE ENTREGA -->
                    <?php if ($end): ?>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h2 class="h5 fw-bold mb-0">
                                <i class="bi bi-geo-alt text-primary me-2"></i> Endereço de Entrega
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-3">
                                    <i class="bi bi-house-door text-primary" style="font-size: 2rem;"></i>
                                </div>
                                <div>
                                    <h3 class="h6 fw-bold"><?= htmlspecialchars($end['destinatario']) ?></h3>
                                    <p class="mb-1"><?= htmlspecialchars($end['logradouro']) ?>, <?= htmlspecialchars($end['numero']) ?></p>
                                    <?php if (!empty($end['complemento'])): ?>
                                        <p class="mb-1"><?= htmlspecialchars($end['complemento']) ?> - <?= htmlspecialchars($end['bairro']) ?></p>
                                    <?php else: ?>
                                        <p class="mb-1"><?= htmlspecialchars($end['bairro']) ?></p>
                                    <?php endif; ?>
                                    <p class="mb-1"><?= htmlspecialchars($end['cidade']) ?> - <?= htmlspecialchars($end['estado']) ?></p>
                                    <p class="mb-0 text-muted">CEP: <?= htmlspecialchars($end['cep']) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- COLUNA LATERAL - RESUMO -->
                <aside class="col-12 col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h2 class="h5 fw-bold mb-0">
                                <i class="bi bi-receipt text-primary me-2"></i> Resumo do Pedido
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span>R$ <?= number_format((float)$pedido['subtotal'], 2, ',', '.') ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Frete</span>
                                <span>R$ <?= number_format((float)$pedido['frete'], 2, ',', '.') ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Desconto</span>
                                <span class="text-success">- R$ <?= number_format((float)$pedido['desconto'], 2, ',', '.') ?></span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Total</strong>
                                <span class="fs-4 fw-bold text-success">R$ <?= number_format((float)$pedido['total'], 2, ',', '.') ?></span>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>