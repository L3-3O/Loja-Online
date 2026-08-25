<?php

declare(strict_types=1);

use App\Helpers\View;
/** @var array $enderecos */
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Gerenciamento de endereços do cliente da Loja Online.">
    <title>Meus Endereços | Loja Online</title>
    <base href="/loja-online/public/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="assets/css/site.css">
</head>

<body class="bg-light">
    <?php View::componenteCliente('nav'); ?>

    <main class="py-5">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h1 class="h3 fw-bold mb-1">
                        <i class="bi bi-geo-alt text-primary me-2"></i>
                        Meus Endereços
                    </h1>
                    <p class="text-muted mb-0">
                        Gerencie os endereços utilizados para entrega dos seus pedidos.
                    </p>
                </div>
                <button type="button" class="btn btn-primary" onclick="abrirModalNovo()">
                    <i class="bi bi-plus-lg me-1"></i>
                    Novo endereço
                </button>
            </div>

            <div class="row g-4">
                <?php foreach ($enderecos as $item): ?>
                    <div class="col-12 col-lg-6">
                        <div class="card <?= $item['principal'] ? 'border-primary' : 'border-0' ?> shadow-sm h-100">
                            <div class="card-header bg-white">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bi bi-house-door-fill text-primary me-1"></i>
                                        <strong><?= htmlspecialchars($item['identificacao']) ?></strong>
                                    </div>
                                    <?php if ($item['principal']): ?>
                                        <span class="badge text-bg-primary">Principal</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <h2 class="h6 fw-bold"><?= htmlspecialchars($item['destinatario']) ?></h2>
                                <p class="mb-1"><?= htmlspecialchars($item['logradouro']) ?>, <?= htmlspecialchars($item['numero']) ?></p>
                                <?php if (!empty($item['complemento'])): ?>
                                    <p class="mb-1"><?= htmlspecialchars($item['complemento']) ?></p>
                                <?php endif; ?>
                                <p class="mb-1"><?= htmlspecialchars($item['bairro']) ?></p>
                                <p class="mb-1"><?= htmlspecialchars($item['cidade']) ?> - <?= htmlspecialchars($item['estado']) ?></p>
                                <p class="mb-3">CEP: <?= htmlspecialchars($item['cep']) ?></p>
                            </div>
                            <div class="card-footer bg-white">
                                <div class="d-flex flex-wrap gap-2">
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick='abrirModalEditar(<?= json_encode($item) ?>)'>
                                        <i class="bi bi-pencil-square me-1"></i> Editar
                                    </button>

                                    <?php if (!$item['principal']): ?>
                                        <form method="post" class="d-inline">
                                            <input type="hidden" name="acao" value="definir_principal">
                                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                            <button type="submit" class="btn btn-outline-success btn-sm">
                                                <i class="bi bi-check-circle me-1"></i> Tornar principal
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                    <form method="post" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este endereço?');">
                                        <input type="hidden" name="acao" value="excluir">
                                        <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash me-1"></i> Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- CARD ADICIONAR ENDEREÇO -->
                <div class="col-12 col-lg-6">
                    <div class="card border border-2 border-dashed h-100">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center text-center py-5">
                            <i class="bi bi-plus-circle text-primary mb-3" style="font-size: 3rem;"></i>
                            <h2 class="h5 fw-bold">Adicionar outro endereço</h2>
                            <p class="text-muted">Cadastre um novo endereço para receber suas compras.</p>
                            <button type="button" class="btn btn-outline-primary" onclick="abrirModalNovo()">
                                <i class="bi bi-plus-lg me-1"></i> Cadastrar endereço
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- MODAL - NOVO / EDITAR ENDEREÇO -->
    <div class="modal fade" id="modalEndereco" tabindex="-1" aria-labelledby="modalEnderecoLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="modalEnderecoLabel">
                        <i class="bi bi-geo-alt text-primary me-2"></i> <span id="modalTitulo">Novo Endereço</span>
                    </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="acao" value="salvar">
                    <input type="hidden" name="id" id="form_id" value="">

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="identificacao" class="form-label">Identificação do endereço</label>
                                <input type="text" class="form-control" id="identificacao" name="identificacao" placeholder="Ex.: Minha Casa, Trabalho">
                            </div>
                            <div class="col-12">
                                <label for="destinatario" class="form-label">Nome do destinatário</label>
                                <input type="text" class="form-control" id="destinatario" name="destinatario" placeholder="Nome completo" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000" required>
                            </div>
                            <div class="col-12 col-md-8">
                                <label for="logradouro" class="form-label">Rua / Avenida</label>
                                <input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Nome da rua ou avenida" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" required>
                            </div>
                            <div class="col-12 col-md-8">
                                <label for="complemento" class="form-label">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Apartamento, bloco, sala...">
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="estado" class="form-label">Estado</label>
                                <select class="form-select" id="estado" name="estado" required>
                                    <option value="">Selecione</option>
                                    <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option>
                                    <option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option>
                                    <option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option>
                                    <option value="MA">MA</option><option value="MT">MT</option><option value="MS">MS</option>
                                    <option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option>
                                    <option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option>
                                    <option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option>
                                    <option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option>
                                    <option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="principal" name="principal" value="1">
                                    <label class="form-check-label" for="principal">
                                        Definir como meu endereço principal
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Salvar endereço
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let modalBs = null;

        document.addEventListener('DOMContentLoaded', function () {
            modalBs = new bootstrap.Modal(document.getElementById('modalEndereco'));
        });

        function abrirModalNovo() {
            document.getElementById('modalTitulo').innerText = 'Novo Endereço';
            document.getElementById('form_id').value = '';
            document.getElementById('identificacao').value = '';
            document.getElementById('destinatario').value = '';
            document.getElementById('cep').value = '';
            document.getElementById('logradouro').value = '';
            document.getElementById('numero').value = '';
            document.getElementById('complemento').value = '';
            document.getElementById('bairro').value = '';
            document.getElementById('cidade').value = '';
            document.getElementById('estado').value = '';
            document.getElementById('principal').checked = false;
            modalBs.show();
        }

        function abrirModalEditar(dados) {
            document.getElementById('modalTitulo').innerText = 'Editar Endereço';
            document.getElementById('form_id').value = dados.id;
            document.getElementById('identificacao').value = dados.identificacao || '';
            document.getElementById('destinatario').value = dados.destinatario || '';
            document.getElementById('cep').value = dados.cep || '';
            document.getElementById('logradouro').value = dados.logradouro || '';
            document.getElementById('numero').value = dados.numero || '';
            document.getElementById('complemento').value = dados.complemento || '';
            document.getElementById('bairro').value = dados.bairro || '';
            document.getElementById('cidade').value = dados.cidade || '';
            document.getElementById('estado').value = dados.estado || '';
            document.getElementById('principal').checked = parseInt(dados.principal) === 1;
            modalBs.show();
        }
    </script>
</body>
</html>