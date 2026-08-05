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
    <base href="/loja_online/public/">

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
            border: 1px solid rgba(0,0,0,.125);
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
    <?php require_once APP_ROOT . '/views/layouts/site/header.php';?>
    <!-- Navbar principal -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-primary" href="">Loja Online</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produtos">Produtos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="categorias" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="categoria/informatica">Informática</a></li>
                            <li><a class="dropdown-item" href="categoria/celulares">Celulares</a></li>
                            <li><a class="dropdown-item" href="categoria/acessorios">Acessórios</a></li>
                            <li><a class="dropdown-item" href="categoria/casa-decoracao">Casa e decoração</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item fw-bold" href="categorias">Ver todas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ofertas">Ofertas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="ajuda" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ajuda
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="ajuda">Central de ajuda</a></li>
                            <li><a class="dropdown-item" href="faq">Perguntas frequentes</a></li>
                            <li><a class="dropdown-item" href="rastrear-pedido">Rastrear pedido</a></li>
                            <li><a class="dropdown-item" href="trocas-devolucoes">Trocas e devoluções</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="contato">Fale conosco</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Formulário de pesquisa -->
                <form class="d-flex me-lg-3 mb-2 mb-lg-0" role="search" action="buscar" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" name="q" placeholder="Pesquisar produtos..." aria-label="Pesquisar produtos" required>
                        <button class="btn btn-outline-primary" type="submit" aria-label="Buscar">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Menu da conta e Carrinho -->
                <div class="d-flex align-items-center gap-3">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menu da conta">
                            <i class="bi bi-person-circle fs-5 me-1"></i>
                            <span class="d-none d-lg-inline">Conta</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="cliente/login">Entrar</a></li>
                            <li><a class="dropdown-item" href="cliente/cadastro">Criar conta</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cliente/pedidos">Meus pedidos</a></li>
                        </ul>
                    </div>

                    <a href="carrinho" class="btn btn-primary position-relative" aria-label="Carrinho de compras">
                        <i class="bi bi-cart3"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3
                            <span class="visually-hidden">itens no carrinho</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <!-- Banner principal -->
        <section class="hero-section">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-6 text-center text-lg-start">
                        <span class="badge bg-primary text-white mb-2 px-3 py-2 rounded-pill">Novidades Tecnológicas</span>
                        <h1 class="display-5 fw-bold text-dark mb-3">A melhor tecnologia ao alcance das suas mãos</h1>
                        <p class="lead text-muted mb-4">Descubra nossa seleção exclusiva de eletrônicos, informática, acessórios e muito mais com preços imperdíveis e entrega rápida.</p>
                        <div class="d-grid d-sm-flex justify-content-center justify-content-lg-start gap-3">
                            <a href="produtos" class="btn btn-primary btn-lg px-4">Comprar agora</a>
                            <a href="ofertas" class="btn btn-outline-dark btn-lg px-4">Ver ofertas</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-custom border-0 shadow-lg overflow-hidden rounded-4">
                            <div class="card-img-top-container" style="height: 350px;">
                                <img src="assets/img/produtos/notebook-essencial-15.jpg" class="w-100 h-100 object-fit-cover" alt="Notebook de última geração em destaque">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefícios da loja -->
        <section class="py-5 bg-light border-top border-bottom">
            <div class="container">
                <div class="row g-4 text-center">
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="text-primary display-5 mb-2"><i class="bi bi-truck"></i></div>
                            <h3 class="h6 fw-bold mb-1">Entrega rápida</h3>
                            <p class="text-muted small mb-0">Para todo o território nacional</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="text-primary display-5 mb-2"><i class="bi bi-shield-check"></i></div>
                            <h3 class="h6 fw-bold mb-1">Pagamento seguro</h3>
                            <p class="text-muted small mb-0">Ambiente 100% criptografado</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="text-primary display-5 mb-2"><i class="bi bi-arrow-repeat"></i></div>
                            <h3 class="h6 fw-bold mb-1">Troca facilitada</h3>
                            <p class="text-muted small mb-0">Até 30 dias para devoluções</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="p-3">
                            <div class="text-primary display-5 mb-2"><i class="bi bi-headset"></i></div>
                            <h3 class="h6 fw-bold mb-1">Atendimento ao cliente</h3>
                            <p class="text-muted small mb-0">Suporte especializado humanizado</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categorias em destaque -->
        <section class="py-5">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 fw-bold mb-0">Categorias em destaque</h2>
                    <a href="categorias" class="text-decoration-none fw-semibold">Ver todas <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="row g-4">
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card card-custom equal-height-card text-center">
                            <div class="category-img-container">
                                <img src="assets/img/categorias/informatica.jpg" alt="Categoria Informática">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="h6 card-title fw-bold mb-1">Informática</h3>
                                <p class="card-text small text-muted mb-3">PCs, laptops e peças</p>
                                <a href="categoria/informatica" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card card-custom equal-height-card text-center">
                            <div class="category-img-container">
                                <img src="assets/img/categorias/celulares.jpg" alt="Categoria Celulares">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="h6 card-title fw-bold mb-1">Celulares</h3>
                                <p class="card-text small text-muted mb-3">Smartphones e capas</p>
                                <a href="categoria/celulares" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card card-custom equal-height-card text-center">
                            <div class="category-img-container">
                                <img src="assets/img/categorias/acessorios.jpg" alt="Categoria Acessórios">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="h6 card-title fw-bold mb-1">Acessórios</h3>
                                <p class="card-text small text-muted mb-3">Cabos, mouses e mais</p>
                                <a href="categoria/acessorios" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card card-custom equal-height-card text-center">
                            <div class="category-img-container">
                                <img src="assets/img/categorias/audio.jpg" alt="Categoria Áudio">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="h6 card-title fw-bold mb-1">Áudio</h3>
                                <p class="card-text small text-muted mb-3">Fones e caixas de som</p>
                                <a href="categoria/audio" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card card-custom equal-height-card text-center">
                            <div class="category-img-container">
                                <img src="assets/img/categorias/casa.jpg" alt="Categoria Casa e decoração">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="h6 card-title fw-bold mb-1">Casa e decoração</h3>
                                <p class="card-text small text-muted mb-3">Smart home e iluminação</p>
                                <a href="categoria/casa-decoracao" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card card-custom equal-height-card text-center">
                            <div class="category-img-container">
                                <img src="assets/img/categorias/games.jpg" alt="Categoria Games">
                            </div>
                            <div class="card-body p-3">
                                <h3 class="h6 card-title fw-bold mb-1">Games</h3>
                                <p class="card-text small text-muted mb-3">Consoles e acessórios</p>
                                <a href="categoria/games" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Produtos em destaque -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 fw-bold mb-0">Produtos em destaque</h2>
                    <a href="produtos" class="text-decoration-none fw-semibold">Ver todos os produtos <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="row g-4">
                    <!-- Produto 1 -->
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
                    <div class="col-sm-6 col-lg-3">
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
            </div>
        </section>

        <!-- Banner de oferta -->
        <section class="py-5 bg-primary text-white">
            <div class="container">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span class="badge bg-white text-primary mb-2 px-3 py-2 rounded-pill fw-bold">Oferta Relâmpago</span>
                        <h2 class="display-6 fw-bold mb-3">Super Liquidação de Tecnologia</h2>
                        <p class="lead mb-4">Economize até 40% em produtos selecionados das linhas de informática e acessórios. Promoção válida por tempo limitado ou enquanto durarem os estoques.</p>
                        <a href="ofertas" class="btn btn-light btn-lg px-4 text-primary fw-bold">Aproveitar ofertas</a>
                    </div>
                    <div class="col-lg-5 text-center">
                        <div class="card bg-transparent border-0 text-white">
                            <div class="card-body p-0">
                                <div class="display-1 fw-bold mb-0">ATÉ 40%</div>
                                <div class="fs-4 text-uppercase tracking-wide">De desconto hoje</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Produtos mais vendidos -->
        <section class="py-5">
            <div class="container">
                <h2 class="h3 fw-bold mb-4">Mais vendidos</h2>
                <div class="row g-3">
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-custom h-100 flex-row align-items-center p-2">
                            <div class="flex-shrink-0" style="width: 80px; height: 80px;">
                                <img src="assets/img/produtos/smartphone-connect.jpg" class="w-100 h-100 object-fit-cover rounded" alt="Smartphone Connect">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <small class="text-muted">Celulares</small>
                                <h3 class="h6 fw-bold mb-1"><a href="produto/smartphone-connect" class="text-dark text-decoration-none stretched-link">Smartphone Connect</a></h3>
                                <span class="text-primary fw-bold small">R$ 1.899,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-custom h-100 flex-row align-items-center p-2">
                            <div class="flex-shrink-0" style="width: 80px; height: 80px;">
                                <img src="assets/img/produtos/notebook-essencial-15.jpg" class="w-100 h-100 object-fit-cover rounded" alt="Notebook Essencial 15">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <small class="text-muted">Informática</small>
                                <h3 class="h6 fw-bold mb-1"><a href="produto/notebook-essencial-15" class="text-dark text-decoration-none stretched-link">Notebook Essencial 15</a></h3>
                                <span class="text-primary fw-bold small">R$ 2.975,00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-custom h-100 flex-row align-items-center p-2">
                            <div class="flex-shrink-0" style="width: 80px; height: 80px;">
                                <img src="assets/img/produtos/fone-bluetooth-air.jpg" class="w-100 h-100 object-fit-cover rounded" alt="Fone Bluetooth Air">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <small class="text-muted">Áudio</small>
                                <h3 class="h6 fw-bold mb-1"><a href="produto/fone-bluetooth-air" class="text-dark text-decoration-none stretched-link">Fone Bluetooth Air</a></h3>
                                <span class="text-primary fw-bold small">R$ 199,90</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-custom h-100 flex-row align-items-center p-2">
                            <div class="flex-shrink-0" style="width: 80px; height: 80px;">
                                <img src="assets/img/produtos/headset-gamer.jpg" class="w-100 h-100 object-fit-cover rounded" alt="Headset Gamer">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <small class="text-muted">Games</small>
                                <h3 class="h6 fw-bold mb-1"><a href="produto/headset-gamer" class="text-dark text-decoration-none stretched-link">Headset Gamer</a></h3>
                                <span class="text-primary fw-bold small">R$ 299,90</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter -->
        <section class="py-5 bg-light border-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h2 class="h3 fw-bold mb-2">Receba ofertas exclusivas</h2>
                        <p class="text-muted mb-4">Cadastre seu e-mail para receber descontos especiais e novidades em primeira mão.</p>
                        
                        <form action="newsletter" method="POST">
                            <div class="input-group mb-3">
                                <label for="newsletter-email" class="visually-hidden">E-mail</label>
                                <input type="email" class="form-control form-control-lg" id="newsletter-email" name="email" placeholder="Seu melhor e-mail" required>
                                <button class="btn btn-primary px-4" type="submit">Cadastrar</button>
                            </div>
                            <div class="form-check text-start d-inline-block">
                                <input class="form-check-input" type="checkbox" id="privacy-check" required>
                                <label class="form-check-label small text-muted" for="privacy-check">
                                    Concordo com a <a href="politica-de-privacidade" class="text-decoration-underline">Política de Privacidade</a>.
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Rodapé -->
    <?php require_once APP_ROOT . '/views/layouts/site/footer.php';?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>