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

    <meta property="og:title" content="Loja Online | Produtos, ofertas e tecnologia">
    <meta property="og:description" content="Encontre produtos de informática, celulares, acessórios, games e ofertas especiais em nossa loja online.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">

    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    <base href="/loja-online/public/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
            background-image:
                radial-gradient(circle at 20% 20%, rgba(0, 240, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(255, 0, 85, 0.05) 0%, transparent 40%);
        }

        /* Estilização para os Cards de Produto */
        .card {
            background-color: var(--tp-card);
            border: 1px solid var(--tp-border);
            color: var(--tp-text);
        }

        .btn-cyber {
            background-color: transparent;
            border: 1px solid var(--tp-cyan);
            color: var(--tp-cyan);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-cyber:hover {
            background-color: var(--tp-cyan);
            color: var(--tp-dark);
        }
    </style>
</head>

<body>

    <!-- Cabeçalho superior -->
    <?php require_once APP_ROOT . '/views/layouts/site/header.php'; ?>
    <!-- Navbar principal -->
    <?php View::componente('navbar', ['categorias' => $categorias,]);?>

    <main class="container py-5">
        <h2 class="text-center mb-5 text-white">Nossos Produtos</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Exemplo de Produto 1 -->
            <?php foreach ($produtos as $produto): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Produto">
                        <div class="card-body">
                            <h5 class="card-title"> <?=htmlspecialchars( $produto['nome'], ENT_QUOTES, 'UTF-8')?></h5>
                            <p class="card-text"><?=htmlspecialchars( $produto['descricao'], ENT_QUOTES, 'UTF-8')?></p>
                            <p class="h4 text-info"><?=htmlspecialchars( $produto['preco'], ENT_QUOTES, 'UTF-8')?></p>
                        </div>
                        <div class="card-footer border-0 bg-transparent">
                            <button class="btn btn-cyber w-100">Comprar Agora</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </main>

    <!-- Rodapé -->
    <?php require_once APP_ROOT . '/views/layouts/site/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>