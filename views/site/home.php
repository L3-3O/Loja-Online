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
        <!-- Banner principal -->
        <?php require_once APP_ROOT . '/views/componentes/site/sections/banner.php'; ?>
        
        <!-- Benefícios da loja -->
        <?php require_once APP_ROOT . '/views/componentes/site/sections/beneficios_loja.php'; ?>
        
        <!-- Categorias em destaque -->
        <?php require_once APP_ROOT . '/views/componentes/site/sections/categorias_em_destaque.php'; ?>    
        
        
        <!-- Produtos em destaque -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h3 fw-bold mb-0">Produtos em destaque</h2>
                    <a href="produtos" class="text-decoration-none fw-semibold">Ver todos os produtos <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="row g-4">
                    <!-- Produto 1 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto1.php'; ?>
                    
                    <!-- Produto 2 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto2.php'; ?>
                    
                    <!-- Produto 3 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto3.php'; ?>
                    
                    <!-- Produto 4 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto4.php'; ?>
                    
                    <!-- Produto 5 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto5.php'; ?>
                    
                    <!-- Produto 6 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto6.php'; ?>
                    
                    <!-- Produto 7 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto7.php'; ?>
                    
                    <!-- Produto 8 -->
                    <?php require_once APP_ROOT . '/views/componentes/site/sections/produto8.php'; ?>
                    
                </div>
            </div>
        </section>

        <!-- Banner de oferta -->
        <?php require_once APP_ROOT . '/views/componentes/site/sections/banner_oferta.php'; ?>
        
        
        <!-- Produtos mais vendidos -->
        <?php require_once APP_ROOT . '/views/componentes/site/sections/produto_mais_vendido.php'; ?>
        

        <!-- Newsletter -->
        <?php require_once APP_ROOT . '/views/componentes/site/sections/news.php'; ?>

    </main>

    <!-- Rodapé -->
    <?php require_once APP_ROOT . '/views/layouts/site/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>