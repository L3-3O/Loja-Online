<?php

declare(strict_types=1);

namespace App\Controllers\Cliente;

use App\Helpers\ClienteAuth;
use App\Repositories\EnderecoRepository;
use PDO;
use RuntimeException;

final class EnderecoController
{
    private EnderecoRepository $repository;

    public function __construct()
    {
        $pdo = new PDO(
            'mysql:host=127.0.0.1;dbname=loja_virtual_db;charset=utf8mb4',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

        $this->repository = new EnderecoRepository($pdo);
    }

    public function index(): void
    {
        ClienteAuth::exigirLogin();
        $clienteId = ClienteAuth::id();

        // Processamento dos formulários POST (Salvar/Editar, Definir Principal, Excluir)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $acao = $_POST['acao'] ?? '';

            if ($acao === 'salvar') {
                $id = !empty($_POST['id']) ? (int) $_POST['id'] : null;
                $dados = [
                    'identificacao' => trim($_POST['identificacao'] ?? ''),
                    'destinatario'  => trim($_POST['destinatario'] ?? ''),
                    'cep'           => trim($_POST['cep'] ?? ''),
                    'logradouro'    => trim($_POST['logradouro'] ?? ''),
                    'numero'        => trim($_POST['numero'] ?? ''),
                    'complemento'   => trim($_POST['complemento'] ?? ''),
                    'bairro'        => trim($_POST['bairro'] ?? ''),
                    'cidade'        => trim($_POST['cidade'] ?? ''),
                    'estado'        => trim($_POST['estado'] ?? ''),
                    'principal'     => isset($_POST['principal']) ? 1 : 0,
                ];

                if ($id) {
                    $this->repository->atualizar($id, $clienteId, $dados);
                } else {
                    $this->repository->cadastrar($clienteId, $dados);
                }
            } elseif ($acao === 'definir_principal') {
                $id = (int) ($_POST['id'] ?? 0);
                if ($id > 0) {
                    $this->repository->definirPrincipal($id, $clienteId);
                }
            } elseif ($acao === 'excluir') {
                $id = (int) ($_POST['id'] ?? 0);
                if ($id > 0) {
                    $this->repository->excluir($id, $clienteId);
                }
            }

            // Redireciona para evitar reenvio de formulário ao atualizar a página
            header('Location: /cliente/enderecos');
            exit;
        }

        // Verifica se há pedido de edição via GET (?editar=ID)
        $enderecoEdicao = null;
        if (isset($_GET['editar'])) {
            $idEditar = (int) $_GET['editar'];
            $enderecoEdicao = $this->repository->buscarPorIdECliente($idEditar, $clienteId);
        }

        $enderecos = $this->repository->listarPorCliente($clienteId);

        $arquivoView = APP_ROOT . '/views/cliente/enderecos.php';

        if (!is_file($arquivoView)) {
            throw new RuntimeException('A página de endereços não foi encontrada.');
        }

        require $arquivoView;
    }
}