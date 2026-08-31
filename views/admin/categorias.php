<?php

declare(strict_types=1);

use App\Helpers\View;

$baseUrl = defined('BASE_URL') ? BASE_URL : '';

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categorias | Painel Administrativo</title>
    <meta name="description" content="Painel administrativo para gerenciamento de categorias da loja.">

    <base href="/loja-online/public/">

    <link rel="icon" href="assets/img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= htmlspecialchars($baseUrl . '/assets/css/admin.css', ENT_QUOTES, 'UTF-8') ?>">
</head>

<body>
    <?php View::componenteAdmin('aside'); ?>

    <div class="offcanvas offcanvas-start offcanvas-dashboard" tabindex="-1" id="menuMobile">
        <div class="offcanvas-header border-bottom border-secondary">
            <div>
                <h2 class="offcanvas-title h5 mb-0">Loja Online</h2>
                <small class="text-white-50">Painel administrativo</small>
            </div>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Fechar menu"></button>
        </div>

        <div class="offcanvas-body">
            <nav class="sidebar-nav p-0" aria-label="Menu móvel">
                <a class="sidebar-link" href="admin" data-route="admin"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
                <a class="sidebar-link" href="admin/produtos" data-route="admin/produtos"><i class="bi bi-box-seam-fill"></i> Produtos</a>
                <a class="sidebar-link active" href="admin/categorias" data-route="admin/categorias"><i class="bi bi-tags-fill"></i> Categorias</a>
                <a class="sidebar-link" href="admin/clientes" data-route="admin/clientes"><i class="bi bi-people-fill"></i> Clientes</a>
                <a class="sidebar-link" href="admin/pedidos" data-route="admin/pedidos"><i class="bi bi-bag-check-fill"></i> Pedidos</a>
                <a class="sidebar-link" href="admin/pagamentos" data-route="admin/pagamentos"><i class="bi bi-credit-card-fill"></i> Pagamentos</a>
                <a class="sidebar-link" href="admin/estoque" data-route="admin/estoque"><i class="bi bi-boxes"></i> Estoque</a>
                <a class="sidebar-link" href="admin/notificacoes" data-route="admin/notificacoes"><i class="bi bi-bell-fill"></i> Notificações</a>
                <a class="sidebar-link" href="admin/relatorios" data-route="admin/relatorios"><i class="bi bi-bar-chart-line-fill"></i> Relatórios</a>
                <a class="sidebar-link" href="admin/configuracoes" data-route="admin/configuracoes"><i class="bi bi-gear-fill"></i> Configurações</a>
            </nav>
        </div>
    </div>

    <div class="main-wrapper">
        <?php View::componenteAdmin('header'); ?>

        <main class="content-area">
            <div class="container-fluid p-0">
                
                <!-- Feedback Alertas -->
                <?php if (!empty($mensagemSucesso)): ?>
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($mensagemSucesso, ENT_QUOTES, 'UTF-8') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (!empty($mensagemErro)): ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i><?= htmlspecialchars($mensagemErro, ENT_QUOTES, 'UTF-8') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Cabeçalho da Página -->
                <section class="mb-4">
                    <div class="row g-3 align-items-center justify-content-between">
                        <div class="col-12 col-md-6">
                            <h1 class="h3 fw-bold mb-1">Categorias</h1>
                            <p class="text-muted mb-0">Gerencie as categorias de produtos da sua loja.</p>
                        </div>
                        <div class="col-12 col-md-6 text-md-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAdicionarCategoria">
                                <i class="bi bi-plus-lg me-1"></i> Nova Categoria
                            </button>
                        </div>
                    </div>
                </section>

                <!-- Tabela de Categorias -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <form method="GET" action="admin/categorias" class="row g-2 align-items-center">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-search"></i></span>
                                    <input type="text" name="q" class="form-control bg-light border-start-0" placeholder="Buscar categoria por nome ou descrição..." value="<?= htmlspecialchars($_GET['q'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-secondary">Buscar</button>
                                <?php if (!empty($_GET['q'])): ?>
                                    <a href="admin/categorias" class="btn btn-outline-secondary">Limpar</a>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 70px;">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-end" style="width: 130px;">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($categorias)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">Nenhuma categoria encontrada.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($categorias as $cat): ?>
                                        <tr>
                                            <td class="fw-bold">#<?= (int) $cat['id'] ?></td>
                                            <td class="fw-semibold"><?= htmlspecialchars((string) $cat['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                                            <td><code><?= htmlspecialchars((string) $cat['slug'], ENT_QUOTES, 'UTF-8') ?></code></td>
                                            <td>
                                                <small class="text-muted">
                                                    <?= htmlspecialchars((string) ($cat['descricao'] ?? '-'), ENT_QUOTES, 'UTF-8') ?>
                                                </small>
                                            </td>
                                            <td>
                                                <?php if ((int) $cat['ativo'] === 1): ?>
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle">Ativo</span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle">Inativo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <button type="button" 
                                                        class="btn btn-sm btn-outline-primary me-1 btn-editar" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#modalEditarCategoria"
                                                        data-id="<?= (int) $cat['id'] ?>"
                                                        data-nome="<?= htmlspecialchars((string) $cat['nome'], ENT_QUOTES, 'UTF-8') ?>"
                                                        data-descricao="<?= htmlspecialchars((string) ($cat['descricao'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                                                        data-ativo="<?= (int) $cat['ativo'] ?>">
                                                    <i class="bi bi-pencil"></i>
                                                </button>

                                                <form action="admin/categoria/excluir" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                                    <input type="hidden" name="id" value="<?= (int) $cat['id'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>

        <?php View::componenteAdmin('footer'); ?>
    </div>

    <!-- Modal Adicionar Categoria -->
    <div class="modal fade" id="modalAdicionarCategoria" tabindex="-1" aria-labelledby="modalAdicionarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="admin/categoria/salvar" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalAdicionarLabel">Nova Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="add-nome" class="form-label">Nome da Categoria <span class="text-danger">*</span></label>
                            <input type="text" name="nome" id="add-nome" class="form-control" required placeholder="Ex: Hardware">
                        </div>
                        <div class="mb-3">
                            <label for="add-descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" id="add-descricao" class="form-control" rows="3" placeholder="Descrição opcional..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="add-ativo" class="form-label">Status</label>
                            <select name="ativo" id="add-ativo" class="form-select">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar Categoria -->
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="admin/categoria/atualizar" method="POST">
                    <input type="hidden" name="id" id="edit-id">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="modalEditarLabel">Editar Categoria</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit-nome" class="form-label">Nome da Categoria <span class="text-danger">*</span></label>
                            <input type="text" name="nome" id="edit-nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit-descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" id="edit-descricao" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="edit-ativo" class="form-label">Status</label>
                            <select name="ativo" id="edit-ativo" class="form-select">
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elemAno = document.getElementById('anoAtual');
            if (elemAno) {
                elemAno.textContent = new Date().getFullYear();
            }

            // Preenche dinamicamente os inputs do Modal de Edição com os dados da linha clicada
            const botoesEditar = document.querySelectorAll('.btn-editar');
            botoesEditar.forEach(function(botao) {
                botao.addEventListener('click', function() {
                    document.getElementById('edit-id').value = this.dataset.id;
                    document.getElementById('edit-nome').value = this.dataset.nome;
                    document.getElementById('edit-descricao').value = this.dataset.descricao;
                    document.getElementById('edit-ativo').value = this.dataset.ativo;
                });
            });
        });
    </script>
</body>

</html>