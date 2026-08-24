<?php

declare(strict_types=1);

use App\Helpers\View;

$statusBadges = [
    'aguardando_pagamento' => ['class' => 'text-bg-warning', 'label' => 'Aguardando Pagamento', 'icon' => 'bi-clock'],
    'pago'                 => ['class' => 'text-bg-info', 'label' => 'Pagamento Aprovado', 'icon' => 'bi-credit-card'],
    'em_separacao'         => ['class' => 'text-bg-warning', 'label' => 'Em Preparação', 'icon' => 'bi-box-seam'],
    'enviado'              => ['class' => 'text-bg-primary', 'label' => 'Enviado', 'icon' => 'bi-truck'],
    'entregue'             => ['class' => 'text-bg-success', 'label' => 'Entregue', 'icon' => 'bi-check-circle'],
    'cancelado'            => ['class' => 'text-bg-danger', 'label' => 'Cancelado', 'icon' => 'bi-x-circle'],
];
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Meus Pedidos | Loja Online</title>
    <base href="/loja-online/public/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>
<body class="bg-light">
    <?php View::componenteCliente('nav'); ?>
    <main class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="h3 fw-bold mb-1">
                        <i class="bi bi-bag-check text-primary me-2"></i>
                        Meus Pedidos
                    </h1>
                    <p class="text-muted mb-0">Consulte seus pedidos e acompanhe o andamento das suas compras.</p>
                </div>
            </div>

            <!-- FILTROS -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <form method="GET" action="cliente/pedidos" class="row g-3 align-items-end">
                        <div class="col-12 col-md-5">
                            <label for="buscarPedido" class="form-label">Buscar pedido</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" name="busca" id="buscarPedido" placeholder="Código do pedido" value="<?= htmlspecialchars($busca ?? '') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="statusPedido" class="form-label">Status</label>
                            <select class="form-select" name="status" id="statusPedido">
                                <option value="">Todos os pedidos</option>
                                <option value="aguardando_pagamento" <?= ($status === 'aguardando_pagamento') ? 'selected' : '' ?>>Aguardando pagamento</option>
                                <option value="pago" <?= ($status === 'pago') ? 'selected' : '' ?>>Pagamento aprovado</option>
                                <option value="em_separacao" <?= ($status === 'em_separacao') ? 'selected' : '' ?>>Em preparação</option>
                                <option value="enviado" <?= ($status === 'enviado') ? 'selected' : '' ?>>Enviado</option>
                                <option value="entregue" <?= ($status === 'entregue') ? 'selected' : '' ?>>Entregue</option>
                                <option value="cancelado" <?= ($status === 'cancelado') ? 'selected' : '' ?>>Cancelado</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-funnel me-1"></i> Filtrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- LISTAGEM DE PEDIDOS -->
            <?php if (empty($resultado['itens'])): ?>
                <div class="alert alert-info text-center py-4">
                    <i class="bi bi-info-circle fs-3 d-block mb-2"></i>
                    Nenhum pedido foi encontrado.
                </div>
            <?php else: ?>
                <?php foreach ($resultado['itens'] as $p): 
                    $badge = $statusBadges[$p['status']] ?? ['class' => 'text-bg-secondary', 'label' => $p['status'], 'icon' => 'bi-info-circle'];
                ?>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                                <div>
                                    <h2 class="h5 fw-bold mb-1">Pedido #<?= htmlspecialchars($p['codigo']) ?></h2>
                                    <small class="text-muted">Realizado em <?= date('d/m/Y \à\s H:i', strtotime($p['criado_em'])) ?></small>
                                </div>
                                <span class="badge <?= $badge['class'] ?> px-3 py-2">
                                    <i class="bi <?= $badge['icon'] ?> me-1"></i> <?= $badge['label'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-12 col-md-6">
                                    <small class="text-muted d-block">Total do Pedido</small>
                                    <span class="fs-4 fw-bold text-success">R$ <?= number_format((float)$p['total'], 2, ',', '.') ?></span>
                                </div>
                                <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
                                    <a href="cliente/pedido?id=<?= urlencode($p['id_seguro']) ?>" class="btn btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i> Ver detalhes do pedido
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- PAGINAÇÃO -->
                <?php if ($resultado['paginas'] > 1): ?>
                    <nav aria-label="Navegação dos pedidos" class="mt-4">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $resultado['paginas']; $i++): ?>
                                <li class="page-item <?= ($i === $resultado['pagina_atual']) ? 'active' : '' ?>">
                                    <a class="page-link" href="cliente/pedidos?pagina=<?= $i ?><?= $busca ? '&busca='.urlencode($busca) : '' ?><?= $status ? '&status='.urlencode($status) : '' ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="text-center">
                <small class="text-white-50">&copy; 2026 Loja Online. Todos os direitos reservados.</small>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>