<?php
// Simulação de dados para o painel de controle TechnoPunk

$stats = [
    'produtos'   => 128,
    'pedidos'    => 42,
    'clientes'   => 1050,
    'faturamento' => 'R$ 84.920,00'
];

$ultimos_pedidos = [
    ['id' => '#TK-9081', 'cliente' => 'Kaelen Vance', 'data' => '28/07/2026', 'total' => 'R$ 1.250,00', 'status' => 'Pago', 'badge' => 'bg-success'],
    ['id' => '#TK-9080', 'cliente' => 'Nyx Ulric', 'data' => '28/07/2026', 'total' => 'R$ 450,00', 'status' => 'Pendente', 'badge' => 'bg-warning text-dark'],
    ['id' => '#TK-9079', 'cliente' => 'Sora Kuro', 'data' => '27/07/2026', 'total' => 'R$ 3.890,00', 'status' => 'Em Processamento', 'badge' => 'bg-info text-dark'],
    ['id' => '#TK-9078', 'cliente' => 'Jax Mercer', 'data' => '27/07/2026', 'total' => 'R$ 890,00', 'status' => 'Cancelado', 'badge' => 'bg-danger'],
];

$produtos_destaque = [
    ['nome' => 'Jaqueta Techwear Cyber-V', 'categoria' => 'Vestuário', 'estoque' => 12, 'preco' => 'R$ 890,00'],
    ['nome' => 'Óculos AR Neural-Goggles', 'categoria' => 'Acessórios', 'estoque' => 5, 'preco' => 'R$ 2.450,00'],
    ['nome' => 'Deck Terminal Portátil v2', 'categoria' => 'Gadgets', 'estoque' => 8, 'preco' => 'R$ 4.100,00'],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoPunk // Core Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --tp-dark: #0a0c10;
            --tp-card: #12151e;
            --tp-border: #212635;
            --tp-cyan: #00f0ff;
            --tp-magenta: #ff0055;
            --tp-text: #e1e7ec;
        }

        body {
            background-color: var(--tp-dark);
            color: var(--tp-text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #06070a;
            border-right: 1px solid var(--tp-border);
            min-height: 100vh;
        }

        .sidebar .nav-link {
            color: #8a99ad;
            border-radius: 6px;
            margin-bottom: 4px;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link:hover, 
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #171b26;
            border-left: 3px solid var(--tp-cyan);
        }

        /* Card Customization */
        .card-custom {
            background-color: var(--tp-card);
            border: 1px solid var(--tp-border);
            border-radius: 8px;
        }

        .card-stat {
            transition: transform 0.2s;
        }

        .card-stat:hover {
            transform: translateY(-3px);
        }

        .stat-icon {
            font-size: 2rem;
            color: var(--tp-cyan);
        }

        /* Table Styling */
        .table-dark-custom {
            --bs-table-bg: transparent;
            --bs-table-color: var(--tp-text);
            border-color: var(--tp-border);
        }

        /* Accent Elements */
        .text-cyan { color: var(--tp-cyan) !important; }
        .text-magenta { color: var(--tp-magenta) !important; }
        .badge-cyber {
            border: 1px solid var(--tp-cyan);
            color: var(--tp-cyan);
            background: rgba(0, 240, 255, 0.1);
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar NAVEGAÇÃO -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse p-3">
            <div class="d-flex align-items-center mb-4 text-white text-decoration-none">
                <i class="bi bi-cpu-fill text-cyan fs-3 me-2"></i>
                <span class="fs-4 fw-bold tracking-wide">TECHNO<span class="text-magenta">PUNK</span></span>
            </div>
            
            <p class="text-uppercase text-muted px-2 fs-7 fw-bold mb-2">Painel de Controle</p>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#dashboard" class="nav-link active">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#produtos" class="nav-link">
                        <i class="bi bi-box-seam me-2"></i> Produtos
                    </a>
                </li>
                <li>
                    <a href="#categorias" class="nav-link">
                        <i class="bi bi-grid-3x3-gap me-2"></i> Categorias
                    </a>
                </li>
                <li>
                    <a href="#pedidos" class="nav-link">
                        <i class="bi bi-receipt me-2"></i> Pedidos
                    </a>
                </li>
                <li>
                    <a href="#carrinhos" class="nav-link">
                        <i class="bi bi-cart3 me-2"></i> Carrinhos
                    </a>
                </li>
                <li>
                    <a href="#clientes" class="nav-link">
                        <i class="bi bi-people me-2"></i> Clientes
                    </a>
                </li>
                <li>
                    <a href="#pagamentos" class="nav-link">
                        <i class="bi bi-credit-card me-2"></i> Pagamentos
                    </a>
                </li>
                <li>
                    <a href="#admin" class="nav-link">
                        <i class="bi bi-shield-lock me-2"></i> Administradores
                    </a>
                </li>
            </ul>
            
            <hr class="border-secondary my-4">
            
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4 me-2 text-cyan"></i>
                    <strong>Admin Node_01</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                    <li><a class="dropdown-item" href="#">Configurações da Rede</a></li>
                    <li><a class="dropdown-item" href="#">Logs do Sistema</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#">Desconectar</a></li>
                </ul>
            </div>
        </nav>

        <!-- MAIN CONTENT -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            
            <!-- Banner de Aviso de Lançamento -->
            <div class="alert card-custom border-start border-cyan border-4 text-light mb-4 p-3 d-flex justify-content-between align-items-center">
                <div>
                    <span class="badge badge-cyber mb-1">Status da Infraestrutura</span>
                    <p class="mb-0 small text-secondary">
                        Nossa infraestrutura digital está sendo reescrita no submundo da rede. Prepare-se para o lançamento de uma nova experiência em vestuário, acessórios e gadgets de vanguarda.
                    </p>
                </div>
                <button type="button" class="btn btn-sm btn-outline-info" data-bs-dismiss="alert">Ocultar</button>
            </div>

            <!-- Header do Topo -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom border-secondary">
                <h1 class="h2 font-monospace">TechnoPunk</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-cyan me-2">
                        <i class="bi bi-download me-1"></i> Exportar Dados
                    </button>
                    <button type="button" class="btn btn-sm btn-danger">
                        <i class="bi bi-plus-lg me-1"></i> Novo Produto
                    </button>
                </div>
            </div>

            <!-- Métricas Principais (Cards) -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-custom card-stat p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small text-uppercase">Faturamento Total</span>
                                <h3 class="fw-bold mb-0 mt-1"><?= $stats['faturamento'] ?></h3>
                            </div>
                            <i class="bi bi-currency-bitcoin stat-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-custom card-stat p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small text-uppercase">Pedidos Ativos</span>
                                <h3 class="fw-bold mb-0 mt-1"><?= $stats['pedidos'] ?></h3>
                            </div>
                            <i class="bi bi-bag-check stat-icon text-magenta"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-custom card-stat p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small text-uppercase">Itens no Catálogo</span>
                                <h3 class="fw-bold mb-0 mt-1"><?= $stats['produtos'] ?></h3>
                            </div>
                            <i class="bi bi-boxes stat-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="card card-custom card-stat p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted small text-uppercase">Nós Conectados (Clientes)</span>
                                <h3 class="fw-bold mb-0 mt-1"><?= $stats['clientes'] ?></h3>
                            </div>
                            <i class="bi bi-person-lines-fill stat-icon text-magenta"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seção de Tabelas Principal -->
            <div class="row g-4">
                <!-- Tabela de Pedidos Recentes -->
                <div class="col-12 col-lg-8">
                    <div class="card card-custom p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0"><i class="bi bi-clock-history me-2 text-cyan"></i>Últimas Transações</h5>
                            <a href="#pedidos" class="btn btn-sm btn-link text-cyan text-decoration-none">Ver Todos</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark-custom align-middle">
                                <thead>
                                    <tr>
                                        <th>ID Pedido</th>
                                        <th>Cliente</th>
                                        <th>Data</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ultimos_pedidos as $pedido): ?>
                                    <tr>
                                        <td class="font-monospace text-cyan"><?= $pedido['id'] ?></td>
                                        <td><?= $pedido['cliente'] ?></td>
                                        <td><?= $pedido['data'] ?></td>
                                        <td><?= $pedido['total'] ?></td>
                                        <td><span class="badge <?= $pedido['badge'] ?>"><?= $pedido['status'] ?></span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Estoque Crítico de Produtos -->
                <div class="col-12 col-lg-4">
                    <div class="card card-custom p-3">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0"><i class="bi bi-cpu me-2 text-magenta"></i>Produtos em Alta</h5>
                        </div>
                        <ul class="list-group list-group-flush bg-transparent">
                            <?php foreach ($produtos_destaque as $item): ?>
                            <li class="list-group-item bg-transparent text-light border-secondary d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h6 class="mb-0"><?= $item['nome'] ?></h6>
                                    <small class="text-muted"><?= $item['categoria'] ?> | Estoque: <?= $item['estoque'] ?></small>
                                </div>
                                <span class="badge bg-dark border border-secondary"><?= $item['preco'] ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<!-- Bootstrap 5 JS Bundle -->
<script href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>