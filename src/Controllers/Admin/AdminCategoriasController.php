<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Repositories\AdminCategoriaRepository;
use Config;
use RuntimeException;

final class AdminCategoriasController
{
    /**
     * Exibe a listagem de categorias.
     */
    public function index(): void
    {
        $raizProjeto = dirname(__DIR__, 3);

        require_once $raizProjeto . '/database/conexao.php';
        $pdo = Config::connect();

        $repository = new AdminCategoriaRepository($pdo);
        $categorias = $repository->listarTodas();

        // Leitura de mensagens de sessão para feedback de ações (sucesso/erro)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $mensagemSucesso = $_SESSION['sucesso'] ?? null;
        $mensagemErro = $_SESSION['erro'] ?? null;
        unset($_SESSION['sucesso'], $_SESSION['erro']);

        $arquivoView = $raizProjeto . '/views/admin/categorias.php';

        if (!is_file($arquivoView)) {
            throw new RuntimeException('A página de categorias não foi encontrada.');
        }

        require $arquivoView;
    }

    /**
     * Processa a inclusão de uma nova categoria via POST.
     */
    public function salvar(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $nome = trim($_POST['nome'] ?? '');
        $status = trim($_POST['status'] ?? 'ativo');

        if ($nome === '') {
            $_SESSION['erro'] = 'O nome da categoria é obrigatório.';
            header('Location: /loja-online/public/admin/categorias');
            exit;
        }

        $raizProjeto = dirname(__DIR__, 3);
        require_once $raizProjeto . '/database/conexao.php';
        $pdo = Config::connect();

        $repository = new AdminCategoriaRepository($pdo);

        if ($repository->criar($nome, $status)) {
            $_SESSION['sucesso'] = 'Categoria cadastrada com sucesso!';
        } else {
            $_SESSION['erro'] = 'Não foi possível cadastrar a categoria.';
        }

        header('Location: /loja-online/public/admin/categorias');
        exit;
    }

    /**
     * Processa a atualização de uma categoria existente via POST.
     */
    public function atualizar(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = (int) ($_POST['id'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $status = trim($_POST['status'] ?? 'ativo');

        if ($id <= 0 || $nome === '') {
            $_SESSION['erro'] = 'Dados inválidos para atualizar a categoria.';
            header('Location: /loja-online/public/admin/categorias');
            exit;
        }

        $raizProjeto = dirname(__DIR__, 3);
        require_once $raizProjeto . '/database/conexao.php';
        $pdo = Config::connect();

        $repository = new AdminCategoriaRepository($pdo);

        if ($repository->atualizar($id, $nome, $status)) {
            $_SESSION['sucesso'] = 'Categoria atualizada com sucesso!';
        } else {
            $_SESSION['erro'] = 'Erro ao tentar atualizar a categoria.';
        }

        header('Location: /loja-online/public/admin/categorias');
        exit;
    }

    /**
     * Processa a exclusão de uma categoria via POST.
     */
    public function excluir(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $id = (int) ($_POST['id'] ?? 0);

        if ($id <= 0) {
            $_SESSION['erro'] = 'ID de categoria inválido para exclusão.';
            header('Location: /loja-online/public/admin/categorias');
            exit;
        }

        $raizProjeto = dirname(__DIR__, 3);
        require_once $raizProjeto . '/database/conexao.php';
        $pdo = Config::connect();

        $repository = new AdminCategoriaRepository($pdo);

        if ($repository->excluir($id)) {
            $_SESSION['sucesso'] = 'Categoria excluída com sucesso!';
        } else {
            $_SESSION['erro'] = 'Não foi possível excluir a categoria.';
        }

        header('Location: /loja-online/public/admin/categorias');
        exit;
    }
}