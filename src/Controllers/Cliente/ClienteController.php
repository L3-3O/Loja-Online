<?php

declare(strict_types=1);

namespace App\Controllers\Cliente;

use App\Helpers\ClienteAuth;
use App\Helpers\Cpf;
use App\Helpers\CsrfCliente;
use App\Helpers\IdSeguro;
use App\Repositories\ClienteRepository;
use App\Repositories\EnderecoRepository;
use App\Repositories\PedidoRepository;

final class ClienteController
{
    public function painel(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Proteção
        |--------------------------------------------------------------------------
        */
        ClienteAuth::exigirLogin();

        /*
        |--------------------------------------------------------------------------
        | Banco & Repositories
        |--------------------------------------------------------------------------
        */
        require_once APP_ROOT . '/database/conexao.php';
        $pdo = \Config::connect();

        $clienteRepository = new ClienteRepository($pdo);
        $pedidoRepository = new PedidoRepository($pdo);
        $enderecoRepository = new EnderecoRepository($pdo);

        /*
        |--------------------------------------------------------------------------
        | Cliente autenticado
        |--------------------------------------------------------------------------
        */
        $clienteId = ClienteAuth::id();
        if ($clienteId === null) {
            ClienteAuth::exigirLogin();
            return;
        }

        $cliente = $clienteRepository->buscarPorId((int) $clienteId);
        if ($cliente === null) {
            ClienteAuth::sair();
            header('Location: ' . BASE_URL . '/cliente/login');
            exit;
        }

        /*
        |--------------------------------------------------------------------------
        | Dados do Painel
        |--------------------------------------------------------------------------
        */
        // Chama o método no PedidoRepository
        $resumoPedidos = $pedidoRepository->resumoPainel((int) $clienteId);
        $totalPedidos = $resumoPedidos['total_pedidos'];
        $pedidosEmAndamento = $resumoPedidos['em_andamento'];
        $pedidosEntregues = $resumoPedidos['entregues'];

        $ultimosPedidos = $pedidoRepository->listarUltimosDoCliente((int) $clienteId, 3);
        foreach ($ultimosPedidos as &$pedido) {
            $pedido['id_seguro'] = IdSeguro::criptografar((int) $pedido['id']);
        }
        unset($pedido);

        $quantidadeEnderecos = $enderecoRepository->contarPorCliente((int) $clienteId);
        $enderecoPrincipal = $enderecoRepository->buscarPrincipalPorCliente((int) $clienteId);

        $nomeCompleto = trim((string) $cliente['nome']);
        $primeiroNome = $nomeCompleto;
        $partesNome = preg_split('/\s+/', $nomeCompleto);

        if (is_array($partesNome) && isset($partesNome[0])) {
            $primeiroNome = $partesNome[0];
        }

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */
        $arquivoView = APP_ROOT . '/views/cliente/painel.php';
        if (!is_file($arquivoView)) {
            throw new \RuntimeException('A página do painel do cliente não foi encontrada: ' . $arquivoView);
        }
        require $arquivoView;
    }

    public function pedidos(): void
    {
        ClienteAuth::exigirLogin();
        $clienteId = ClienteAuth::id();

        require_once APP_ROOT . '/database/conexao.php';
        $pdo = \Config::connect();

        $pedidoRepository = new PedidoRepository($pdo);

        $pagina = isset($_GET['pagina']) ? max(1, (int) $_GET['pagina']) : 1;
        $busca = isset($_GET['busca']) ? trim((string) $_GET['busca']) : null;
        $status = isset($_GET['status']) ? trim((string) $_GET['status']) : null;

        $resultado = $pedidoRepository->listarPaginadoPorCliente((int) $clienteId, $pagina, 10, $busca, $status);

        foreach ($resultado['itens'] as &$pedido) {
            $pedido['id_seguro'] = IdSeguro::criptografar((int) $pedido['id']);
        }
        unset($pedido);

        $arquivoView = APP_ROOT . '/views/cliente/pedidos.php';
        if (!is_file($arquivoView)) {
            throw new \RuntimeException('A página de meus pedidos não foi encontrada.');
        }
        require $arquivoView;
    }

    public function detalhesPedido(): void
    {
        ClienteAuth::exigirLogin();
        $clienteId = ClienteAuth::id();

        $idCriptografado = $_GET['id'] ?? null;
        if (!$idCriptografado) {
            header('Location: ' . BASE_URL . '/cliente/pedidos');
            exit;
        }

        $pedidoId = IdSeguro::descriptografar((string) $idCriptografado);
        if (!$pedidoId) {
            header('Location: ' . BASE_URL . '/cliente/pedidos');
            exit;
        }

        require_once APP_ROOT . '/database/conexao.php';
        $pdo = \Config::connect();

        $pedidoRepository = new PedidoRepository($pdo);
        $pedido = $pedidoRepository->buscarDetalhesPorId((int) $pedidoId, (int) $clienteId);

        if ($pedido === null) {
            header('Location: ' . BASE_URL . '/cliente/pedidos');
            exit;
        }

        $arquivoView = APP_ROOT . '/views/cliente/pedido.php';
        if (!is_file($arquivoView)) {
            throw new \RuntimeException('A página de detalhes do pedido não foi encontrada: ' . $arquivoView);
        }
        require $arquivoView;
    }

    public function perfil(): void
    {
        ClienteAuth::exigirLogin();

        require_once APP_ROOT . '/database/conexao.php';
        $pdo = \Config::connect();

        $clienteRepository = new ClienteRepository($pdo);

        $clienteId = ClienteAuth::id();
        if ($clienteId === null) {
            ClienteAuth::exigirLogin();
            return;
        }

        $cliente = $clienteRepository->buscarPorId((int) $clienteId);
        if ($cliente === null) {
            ClienteAuth::sair();
            header('Location: ' . BASE_URL . '/cliente/login');
            exit;
        }

        $mensagemSucesso = $_SESSION['perfil_sucesso'] ?? null;
        unset($_SESSION['perfil_sucesso']);

        $arquivoView = APP_ROOT . '/views/cliente/perfil.php';
        if (!is_file($arquivoView)) {
            throw new \RuntimeException('A página de perfil não foi encontrada.');
        }
        require $arquivoView;
    }

    public function editarPerfil(): void
    {
        ClienteAuth::exigirLogin();

        require_once APP_ROOT . '/database/conexao.php';
        $pdo = \Config::connect();

        $clienteRepository = new ClienteRepository($pdo);

        $clienteId = ClienteAuth::id();
        if ($clienteId === null) {
            ClienteAuth::exigirLogin();
            return;
        }

        $cliente = $clienteRepository->buscarPorId((int) $clienteId);
        if ($cliente === null) {
            ClienteAuth::sair();
            header('Location: ' . BASE_URL . '/cliente/login');
            exit;
        }

        $dadosFormulario = $_SESSION['perfil_dados'] ?? [
            'nome'            => $cliente['nome'],
            'data_nascimento' => $cliente['data_nascimento'],
            'telefone'        => $cliente['telefone'],
            'email'           => $cliente['email'],
            'newsletter'      => $cliente['newsletter'],
        ];

        $erros = $_SESSION['perfil_erros'] ?? [];
        unset($_SESSION['perfil_dados'], $_SESSION['perfil_erros']);

        $csrfToken = CsrfCliente::gerar();

        $arquivoView = APP_ROOT . '/views/cliente/perfil_editar.php';
        if (!is_file($arquivoView)) {
            throw new \RuntimeException('A página de edição do perfil não foi encontrada.');
        }
        require $arquivoView;
    }

    public function atualizarPerfil(): void
    {
        ClienteAuth::exigirLogin();

        $clienteId = ClienteAuth::id();
        if ($clienteId === null) {
            ClienteAuth::exigirLogin();
            return;
        }

        $token = isset($_POST['csrf_token']) ? (string) $_POST['csrf_token'] : null;
        if (!CsrfCliente::validar($token)) {
            $_SESSION['perfil_erros'] = ['O formulário expirou. Atualize a página e tente novamente.'];
            header('Location: ' . BASE_URL . '/cliente/perfil/editar');
            exit;
        }

        $nome = trim((string) ($_POST['nome'] ?? ''));
        $cpf = trim((string) ($_POST['cpf'] ?? ''));
        $dataNascimento = trim((string) ($_POST['data_nascimento'] ?? ''));
        $telefone = trim((string) ($_POST['telefone'] ?? ''));
        $email = strtolower(trim((string) ($_POST['email'] ?? '')));

        $dados = [
            'nome'            => $nome,
            'cpf'             => $cpf,
            'data_nascimento' => $dataNascimento,
            'telefone'        => $telefone,
            'email'           => $email,
        ];

        $_SESSION['perfil_dados'] = $dados;

        $erros = [];

        if (mb_strlen($nome) < 3) {
            $erros[] = 'Informe o nome completo.';
        }

        if (!Cpf::validar($cpf)) {
            $erros[] = 'Informe um CPF válido.';
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $erros[] = 'Informe um e-mail válido.';
        }

        $cpf = Cpf::somenteNumeros($cpf);
        $dados['cpf'] = $cpf;

        if ($dataNascimento === '') {
            $dados['data_nascimento'] = null;
        }

        if ($erros !== []) {
            $_SESSION['perfil_erros'] = $erros;
            $_SESSION['perfil_dados'] = $dados;
            header('Location: ' . BASE_URL . '/cliente/perfil/editar');
            exit;
        }

        require_once APP_ROOT . '/database/conexao.php';
        $pdo = \Config::connect();

        $clienteRepository = new ClienteRepository($pdo);

        $cliente = $clienteRepository->buscarPorId((int) $clienteId);
        if ($cliente === null) {
            ClienteAuth::sair();
            header('Location: ' . BASE_URL . '/cliente/login');
            exit;
        }

        if ($clienteRepository->emailExisteParaOutroCliente($email, (int) $clienteId)) {
            $erros[] = 'Este e-mail já está sendo utilizado por outro cliente.';
        }

        if ($clienteRepository->cpfExisteParaOutroCliente($cpf, (int) $clienteId)) {
            $erros[] = 'Este CPF já está cadastrado para outro cliente.';
        }

        if ($erros !== []) {
            $_SESSION['perfil_erros'] = $erros;
            $_SESSION['perfil_dados'] = $dados;
            header('Location: ' . BASE_URL . '/cliente/perfil/editar');
            exit;
        }

        $clienteRepository->atualizarPerfil((int) $clienteId, $dados);

        CsrfCliente::renovar();

        unset($_SESSION['perfil_dados'], $_SESSION['perfil_erros']);

        $_SESSION['perfil_sucesso'] = 'Perfil atualizado com sucesso.';

        header('Location: ' . BASE_URL . '/cliente/perfil');
        exit;
    }
}