<?php

declare(strict_types=1);

use App\Helpers\View;

$tituloPagina = $tituloPagina ?? 'Meus Endereços - Loja Online';
$quantidadeCarrinho = $quantidadeCarrinho ?? 0;
$categorias = $categorias ?? [];
$baseUrl = defined('BASE_URL') ? BASE_URL : ''; 
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($tituloPagina, ENT_QUOTES, 'UTF-8') ?></title>
    <base href="/loja-online/public/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>

<body>

    <?php View::componenteCliente('nav'); ?>

    <main class="py-5 bg-light">
        <div class="container">
            <h1 class="h3 mb-4">Meus Endereços</h1>

            <div class="row g-4">
                <!-- Formulário de Novo Endereço -->
                <div class="col-lg-5">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-white py-3">
                            <h2 class="h5 card-title mb-0">Cadastrar Novo Endereço</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <input type="hidden" name="acao" value="salvar">

                                <div class="mb-3">
                                    <label for="identificacao" class="form-label">Identificação (ex: Casa, Trabalho)</label>
                                    <input type="text" class="form-control" id="identificacao" name="identificacao" required>
                                </div>

                                <div class="mb-3">
                                    <label for="destinatario" class="form-label">Nome do Destinatário</label>
                                    <input type="text" class="form-control" id="destinatario" name="destinatario" required>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-md-5">
                                        <label for="cep" class="form-label">CEP</label>
                                        <input type="text" class="form-control" id="cep" name="cep" required>
                                    </div>
                                    <div class="col-md-7">
                                        <label for="logradouro" class="form-label">Logradouro / Rua</label>
                                        <input type="text" class="form-control" id="logradouro" name="logradouro" required>
                                    </div>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-md-4">
                                        <label for="numero" class="form-label">Número</label>
                                        <input type="text" class="form-control" id="numero" name="numero" required>
                                    </div>
                                    <div class="col-md-8">
                                        <label for="complemento" class="form-label">Complemento</label>
                                        <input type="text" class="form-control" id="complemento" name="complemento">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                                </div>

                                <div class="row g-2 mb-3">
                                    <div class="col-md-8">
                                        <label for="cidade" class="form-label">Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="estado" class="form-label">UF</label>
                                        <input type="text" class="form-control" id="estado" name="estado" maxlength="2" required>
                                    </div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" name="principal" value="1" id="principal">
                                    <label class="form-check-label" for="principal">
                                        Definir como endereço principal
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Cadastrar Endereço</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Lista de Endereços Cadastrados -->
                <div class="col-lg-7">
                    <h2 class="h5 mb-3">Endereços Cadastrados</h2>

                    <?php if (empty($enderecos)): ?>
                        <div class="alert alert-info">Nenhum endereço cadastrado até o momento.</div>
                    <?php else: ?>
                        <div class="d-flex flex-column gap-3">
                            <?php foreach ($enderecos as $endereco): ?>
                                <div class="card shadow-sm border-0 <?= $endereco['principal'] ? 'border-start border-success border-4' : '' ?>">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h3 class="h6 card-title mb-0 fw-bold">
                                                <?= htmlspecialchars($endereco['identificacao']) ?>
                                            </h3>
                                            <?php if ($endereco['principal']): ?>
                                                <span class="badge bg-success">Principal</span>
                                            <?php endif; ?>
                                        </div>

                                        <p class="card-text small text-muted mb-3">
                                            <strong>Destinatário:</strong> <?= htmlspecialchars($endereco['destinatario']) ?><br>
                                            <strong>Endereço:</strong> <?= htmlspecialchars($endereco['logradouro']) ?>, <?= htmlspecialchars($endereco['numero']) ?>
                                            <?= $endereco['complemento'] ? ' - ' . htmlspecialchars($endereco['complemento']) : '' ?><br>
                                            <strong>Bairro:</strong> <?= htmlspecialchars($endereco['bairro']) ?> | 
                                            <strong>Cidade:</strong> <?= htmlspecialchars($endereco['cidade']) ?>-<?= htmlspecialchars($endereco['estado']) ?><br>
                                            <strong>CEP:</strong> <?= htmlspecialchars($endereco['cep']) ?>
                                        </p>

                                        <div class="d-flex gap-2 pt-2 border-top">
                                            <!-- Botão Editar -->
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-primary"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalEditarEndereco"
                                                    data-id="<?= $endereco['id'] ?>"
                                                    data-identificacao="<?= htmlspecialchars($endereco['identificacao']) ?>"
                                                    data-destinatario="<?= htmlspecialchars($endereco['destinatario']) ?>"
                                                    data-cep="<?= htmlspecialchars($endereco['cep']) ?>"
                                                    data-logradouro="<?= htmlspecialchars($endereco['logradouro']) ?>"
                                                    data-numero="<?= htmlspecialchars($endereco['numero']) ?>"
                                                    data-complemento="<?= htmlspecialchars($endereco['complemento'] ?? '') ?>"
                                                    data-bairro="<?= htmlspecialchars($endereco['bairro']) ?>"
                                                    data-cidade="<?= htmlspecialchars($endereco['cidade']) ?>"
                                                    data-estado="<?= htmlspecialchars($endereco['estado']) ?>"
                                                    data-principal="<?= $endereco['principal'] ?>">
                                                Editar
                                            </button>

                                            <?php if (!$endereco['principal']): ?>
                                                <form method="POST" action="<?= $baseUrl ?>/cliente/enderecos" class="d-inline">
                                                    <input type="hidden" name="acao" value="definir_principal">
                                                    <input type="hidden" name="id" value="<?= $endereco['id'] ?>">
                                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                                        Tornar Principal
                                                    </button>
                                                </form>
                                            <?php endif; ?>

                                            <!-- Botão Excluir -->
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-danger ms-auto"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalExcluirEndereco"
                                                    data-id="<?= $endereco['id'] ?>"
                                                    data-identificacao="<?= htmlspecialchars($endereco['identificacao']) ?>">
                                                Excluir
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL EDITAR ENDEREÇO -->
    <div class="modal fade" id="modalEditarEndereco" tabindex="-1" aria-labelledby="modalEditarEnderecoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarEnderecoLabel">Editar Endereço</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="acao" value="salvar">
                        <input type="hidden" name="id" id="edit-id">

                        <div class="mb-3">
                            <label for="edit-identificacao" class="form-label">Identificação</label>
                            <input type="text" class="form-control" id="edit-identificacao" name="identificacao" required>
                        </div>

                        <div class="mb-3">
                            <label for="edit-destinatario" class="form-label">Nome do Destinatário</label>
                            <input type="text" class="form-control" id="edit-destinatario" name="destinatario" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-5">
                                <label for="edit-cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="edit-cep" name="cep" required>
                            </div>
                            <div class="col-md-7">
                                <label for="edit-logradouro" class="form-label">Logradouro / Rua</label>
                                <input type="text" class="form-control" id="edit-logradouro" name="logradouro" required>
                            </div>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <label for="edit-numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="edit-numero" name="numero" required>
                            </div>
                            <div class="col-md-8">
                                <label for="edit-complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" id="edit-complemento" name="complemento">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="edit-bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="edit-bairro" name="bairro" required>
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-md-8">
                                <label for="edit-cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="edit-cidade" name="cidade" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit-estado" class="form-label">UF</label>
                                <input type="text" class="form-control" id="edit-estado" name="estado" maxlength="2" required>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="principal" value="1" id="edit-principal">
                            <label class="form-check-label" for="edit-principal">
                                Definir como endereço principal
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL EXCLUIR ENDEREÇO -->
    <div class="modal fade" id="modalExcluirEndereco" tabindex="-1" aria-labelledby="modalExcluirEnderecoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalExcluirEnderecoLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="id" id="delete-id">
                        <p class="mb-0">Tem certeza que deseja excluir o endereço <strong id="delete-identificacao"></strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php View::componente('footer'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalEditar = document.getElementById('modalEditarEndereco');
            if (modalEditar) {
                modalEditar.addEventListener('show.bs.modal', function (event) {
                    const btn = event.relatedTarget;

                    document.getElementById('edit-id').value = btn.getAttribute('data-id');
                    document.getElementById('edit-identificacao').value = btn.getAttribute('data-identificacao');
                    document.getElementById('edit-destinatario').value = btn.getAttribute('data-destinatario');
                    document.getElementById('edit-cep').value = btn.getAttribute('data-cep');
                    document.getElementById('edit-logradouro').value = btn.getAttribute('data-logradouro');
                    document.getElementById('edit-numero').value = btn.getAttribute('data-numero');
                    document.getElementById('edit-complemento').value = btn.getAttribute('data-complemento');
                    document.getElementById('edit-bairro').value = btn.getAttribute('data-bairro');
                    document.getElementById('edit-cidade').value = btn.getAttribute('data-cidade');
                    document.getElementById('edit-estado').value = btn.getAttribute('data-estado');
                    document.getElementById('edit-principal').checked = btn.getAttribute('data-principal') === '1';
                });
            }

            const modalExcluir = document.getElementById('modalExcluirEndereco');
            if (modalExcluir) {
                modalExcluir.addEventListener('show.bs.modal', function (event) {
                    const btn = event.relatedTarget;
                    document.getElementById('delete-id').value = btn.getAttribute('data-id');
                    document.getElementById('delete-identificacao').textContent = btn.getAttribute('data-identificacao');
                });
            }
        });
    </script>
</body>

</html>