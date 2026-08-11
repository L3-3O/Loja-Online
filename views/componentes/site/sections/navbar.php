<?php

declare(strict_types=1);

$tituloNav = $tituloNav
    ?? 'Loja Online';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold fs-3 text-primary" href=""><?=htmlspecialchars($tituloNav,ENT_QUOTES,'UTF-8')?></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos">Produtos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categorias" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorias
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="categorias/?v=1">Informática</a></li>
                        <li><a class="dropdown-item" href="categorias/?v=2">Celulares</a></li>
                        <li><a class="dropdown-item" href="categorias/?v=3">Acessórios</a></li>
                        <li><a class="dropdown-item" href="categorias/?v=4">Casa e decoração</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
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
                        <li><a class="dropdown-item" href="ajuda/?a=1">Central de ajuda</a></li>
                        <li><a class="dropdown-item" href="ajuda/?a=2">Perguntas frequentes</a></li>
                        <li><a class="dropdown-item" href="ajuda/?a=3">Rastrear pedido</a></li>
                        <li><a class="dropdown-item" href="ajuda/?a=4">Trocas e devoluções</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
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
                        <li><a class="dropdown-item" href="user_entrar">Entrar</a></li>
                        <li><a class="dropdown-item" href="user_criar">Criar conta</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="user_pedido">Meus pedidos</a></li>
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