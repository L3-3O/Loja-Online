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
    <?php App\Helpers\View::componente('site/navbar', ['categorias' => $categorias]); ?>
    <main>
       Aqui o conteudo

    </main>

    <!-- Rodapé -->
    <?php require_once APP_ROOT . '/views/layouts/site/footer.php'; ?>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>