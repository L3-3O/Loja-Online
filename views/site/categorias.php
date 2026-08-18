<?php
declare(strict_types=1);
use App\Helpers\View; ?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Loja Online | Produtos, ofertas e tecnologia</title>
    <meta name="description" content="Encontre produtos de informática, celulares, acessórios, games e ofertas especiais em nossa loja online.">
    <meta name="keywords" content="loja online, tecnologia, informática, celulares, acessórios, games, ofertas">
    <meta name="author" content="Loja Online">

    <!-- Open Graph Básico -->
    <meta property="og:title" content="Loja Online | Produtos, ofertas e tecnologia">
    <meta property="og:description" content="Encontre produtos de informática, celulares, acessórios, games e ofertas especiais em nossa loja online.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Base URL para Rotas -->
    <base href="/loja-online/public/">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS Personalizado -->
    <style>
        :root {
            --primary-color: #0d6efd;
            --primary-dark: #0b5ed7;
            --secondary-bg: #f8f9fa;
            --dark-bg: #212529;   
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #333;
            background-color: #fff;
        }

        /* Estilização Geral de Imagens e Cards */
        .card-img-top-container {
            height: 200px;
            overflow: hidden;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-img-top-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top-container img {
            transform: scale(1.05);
        }

        .category-img-container {
            height: 160px;
            overflow: hidden;
            background-color: #e9ecef;
            border-top-left-radius: calc(0.375rem - 1px);
            border-top-right-radius: calc(0.375rem - 1px);
        }

        .category-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover .category-img-container img {
            transform: scale(1.05);
        }

        /* Utilidades de Transição e Sombra */
        .card-custom {
            border: 1px solid rgba(0, 0, 0, .125);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }

        .card-custom:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e2e8f0 100%);
            padding: 4rem 0;
        }

        /* Ajustes de Altura Uniforme para Cards */
        .equal-height-card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .equal-height-card .card-body {
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
        }

        .equal-height-card .card-body .mt-auto {
            margin-top: auto;
        }

        /* Correção para o texto do rodapé ficar branco */
        footer, 
        .footer {
            color: #ffffff !important;
        }
        
        /* Garantir que links dentro do footer também fiquem legíveis (opcional) */
        footer a, 
        .footer a {
            color: #f8f9fa;
        }
        
        footer a:hover, 
        .footer a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

      
    </style>
</head>

<body>

    <!-- Cabeçalho superior -->
    <?php require_once APP_ROOT . '/views/layouts/site/header.php'; ?>
    <!-- Navbar principal -->
    <?php App\Helpers\View::componente('navbar', ['categorias' => $categorias]); ?>
    <main>
       
   <main class="py-4">
    <div class="container">
        
        <!-- Cabeçalho da Categoria Selecionada -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="display-6 fw-bold"><?= htmlspecialchars($categoria['nome'], ENT_QUOTES, 'UTF-8') ?></h1>
                <?php if (!empty($categoria['descricao'])): ?>
                    <p class="text-muted"><?= htmlspecialchars($categoria['descricao'], ENT_QUOTES, 'UTF-8') ?></p>
                <?php endif; ?>
                <hr>
            </div>
        </div>

        <!-- Listagem de Produtos Relacionados -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php if (!empty($produtos)): ?>
                <?php foreach ($produtos as $produto): ?>
                    <div class="col">
                        <div class="card h-100 card-custom equal-height-card shadow-sm">
                            <!-- Imagem do Produto -->
                            <div class="card-img-top-container">
                                <img 
                                    src="<?= htmlspecialchars($produto['imagem'] ?? 'assets/img/sem-foto.jpg', ENT_QUOTES, 'UTF-8') ?>" 
                                    alt="<?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?>"
                                >
                            </div>

                            <!-- Informações do Produto -->
                            <div class="card-body">
                                <h5 class="card-title h6"><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></h5>
                                
                                <!-- Exibição do Preço (se existir no banco) -->
                                <?php if (isset($produto['preco'])): ?>
                                    <p class="card-text fw-bold text-primary mb-3">
                                        R$ <?= number_format((float) $produto['preco'], 2, ',', '.') ?>
                                    </p>
                                <?php endif; ?>

                                <!-- Ações do Produto -->
                                <div class="mt-auto pt-2 d-flex flex-column gap-2">
                                    
                                    <!-- Botão Comprar (Direciona para a compra direta ou abre o carrinho) -->
                                    <a 
                                        href="<?= htmlspecialchars(BASE_URL . '/carrinho/adicionar?id=' . urlencode($produto['id_seguro']) . '&comprar=1', ENT_QUOTES, 'UTF-8') ?>" 
                                        class="btn btn-success btn-sm w-100 fw-semibold"
                                    >
                                        <i class="bi bi-credit-card me-1"></i> Comprar
                                    </a>

                                    <div class="d-flex gap-2">
                                        <!-- Form para Adicionar ao Carrinho -->
                                        <form action="<?= htmlspecialchars(BASE_URL . '/carrinho/adicionar', ENT_QUOTES, 'UTF-8') ?>" method="POST" class="w-100">
                                            <input type="hidden" name="produto_id" value="<?= htmlspecialchars($produto['id_seguro'], ENT_QUOTES, 'UTF-8') ?>">
                                            <button type="submit" class="btn btn-outline-primary btn-sm w-100" title="Adicionar ao Carrinho">
                                                <i class="bi bi-cart-plus me-1"></i> Carrinho
                                            </button>
                                        </form>

                                        <!-- Botão Ver Detalhes -->
                                        <a 
                                            href="<?= htmlspecialchars(BASE_URL . '/produto?id=' . urlencode($produto['id_seguro']), ENT_QUOTES, 'UTF-8') ?>" 
                                            class="btn btn-outline-secondary btn-sm"
                                            title="Ver detalhes do produto"
                                        >
                                            <i class="bi bi-eye"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info">
                        Nenhum produto cadastrado para esta categoria até o momento.
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</main>

    </main>

    <!-- Rodapé -->
    <?php require_once APP_ROOT . '/views/layouts/site/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>