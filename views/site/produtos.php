<?php

declare(strict_types=1);

$tituloProdutos = $tituloProdutos
    ?? 'Loja Online | Produtos, ofertas e tecnologia';

$textoHero = $textoHero
    ?? 'Produtos selecionados para você.';

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> <?=htmlspecialchars($tituloProdutos,ENT_QUOTES,'UTF-8')?></title>
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
            --text-muted-custom: #6c757d;
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
    </style>
</head>

<body>

    <!-- Cabeçalho superior -->
    <?php require_once APP_ROOT . '/views/layouts/site/header.php'; ?>
    <!-- Navbar principal -->
    <?php require_once APP_ROOT . '/views/componentes/site/sections/navbar.php'; ?>
    <main>
    <?php

$tituloProduto = $tituloProduto
    ?? 'Encontre tudo o que precisa';

$textoHero = $textoHero
    ?? 'Produtos selecionados para você.';

?>

<!-- Início da linha (row) que agrupa os produtos -->
<div class="row g-4">

    <!-- Produto 1 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <span class="position-absolute top-0 start-0 translate-middle-y badge bg-danger m-3 z-1">-15%</span>
            <div class="card-img-top-container">
                <img src="assets/img/produtos/notebook-essencial-15.jpg" alt="Notebook Essencial 15">
            </div>
            <div class="card-body">
                <small class="text-muted">Informática</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Notebook Essencial 15</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.8 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    <span class="text-muted ms-1">(42)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">R$ 3.500,00</span>
                    <span class="fs-5 fw-bold text-primary">R$ 2.975,00</span>
                    <small class="text-muted d-block">10x de R$ 297,50 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/notebook-essencial-15" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Notebook Essencial 15 ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 2 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <div class="card-img-top-container">
                <img src="assets/img/produtos/smartphone-connect.jpg" alt="Smartphone Connect">
            </div>
            <div class="card-body">
                <small class="text-muted">Celulares</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Smartphone Connect</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 5.0 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    <span class="text-muted ms-1">(128)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">&nbsp;</span>
                    <span class="fs-5 fw-bold text-primary">R$ 1.899,00</span>
                    <small class="text-muted d-block">12x de R$ 158,25 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/smartphone-connect" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Smartphone Connect ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 3 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <span class="position-absolute top-0 start-0 translate-middle-y badge bg-danger m-3 z-1">-20%</span>
            <div class="card-img-top-container">
                <img src="assets/img/produtos/fone-bluetooth-air.jpg" alt="Fone Bluetooth Air">
            </div>
            <div class="card-body">
                <small class="text-muted">Áudio</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Fone Bluetooth Air</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.6 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    <span class="text-muted ms-1">(95)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">R$ 250,00</span>
                    <span class="fs-5 fw-bold text-primary">R$ 199,90</span>
                    <small class="text-muted d-block">5x de R$ 39,98 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/fone-bluetooth-air" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Fone Bluetooth Air ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 4 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <div class="card-img-top-container">
                <img src="assets/img/produtos/teclado-confort-plus.jpg" alt="Teclado Confort Plus">
            </div>
            <div class="card-body">
                <small class="text-muted">Acessórios</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Teclado Confort Plus</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.7 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    <span class="text-muted ms-1">(64)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">&nbsp;</span>
                    <span class="fs-5 fw-bold text-primary">R$ 229,90</span>
                    <small class="text-muted d-block">4x de R$ 57,47 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/teclado-confort-plus" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Teclado Confort Plus ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 5 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <div class="card-img-top-container">
                <img src="assets/img/produtos/mouse-sem-fio.jpg" alt="Mouse Sem Fio Ergonomico">
            </div>
            <div class="card-body">
                <small class="text-muted">Acessórios</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Mouse Sem Fio</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.5 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    <span class="text-muted ms-1">(31)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">&nbsp;</span>
                    <span class="fs-5 fw-bold text-primary">R$ 89,90</span>
                    <small class="text-muted d-block">2x de R$ 44,95 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/mouse-sem-fio" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Mouse Sem Fio ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 6 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <span class="position-absolute top-0 start-0 translate-middle-y badge bg-danger m-3 z-1">-10%</span>
            <div class="card-img-top-container">
                <img src="assets/img/produtos/monitor-full-hd.jpg" alt="Monitor Full HD 24 polegadas">
            </div>
            <div class="card-body">
                <small class="text-muted">Informática</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Monitor Full HD 24"</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.9 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    <span class="text-muted ms-1">(78)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">R$ 999,00</span>
                    <span class="fs-5 fw-bold text-primary">R$ 899,00</span>
                    <small class="text-muted d-block">9x de R$ 99,89 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/monitor-full-hd" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Monitor Full HD ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 7 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <div class="card-img-top-container">
                <img src="assets/img/produtos/caixa-de-som-portatil.jpg" alt="Caixa de Som Portátil Bluetooth">
            </div>
            <div class="card-body">
                <small class="text-muted">Áudio</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Caixa de Som Portátil</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.4 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                    <span class="text-muted ms-1">(52)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">&nbsp;</span>
                    <span class="fs-5 fw-bold text-primary">R$ 349,90</span>
                    <small class="text-muted d-block">6x de R$ 58,31 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/caixa-de-som-portatil" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Caixa de Som Portátil ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Produto 8 -->
    <div class="col-sm-6 col-lg-4">
        <div class="card card-custom equal-height-card position-relative">
            <span class="position-absolute top-0 start-0 translate-middle-y badge bg-danger m-3 z-1">-25%</span>
            <div class="card-img-top-container">
                <img src="assets/img/produtos/headset-gamer.jpg" alt="Headset Gamer RGB Surround">
            </div>
            <div class="card-body">
                <small class="text-muted">Games</small>
                <h3 class="h6 card-title fw-bold mt-1 mb-2">Headset Gamer</h3>
                <div class="text-warning small mb-2" aria-label="Avaliação 4.8 de 5 estrelas">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                    <span class="text-muted ms-1">(110)</span>
                </div>
                <div class="mb-2">
                    <span class="text-muted text-decoration-line-through small d-block">R$ 399,90</span>
                    <span class="fs-5 fw-bold text-primary">R$ 299,90</span>
                    <small class="text-muted d-block">5x de R$ 59,98 sem juros</small>
                </div>
                <div class="mt-auto pt-3 d-flex gap-2">
                    <a href="produto/headset-gamer" class="btn btn-outline-primary btn-sm flex-grow-1">Ver produto</a>
                    <button type="button" class="btn btn-primary btn-sm px-3" aria-label="Adicionar Headset Gamer ao carrinho">
                        <i class="bi bi-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
    </main>

    <!-- Rodapé -->
    <?php require_once APP_ROOT . '/views/layouts/site/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>