<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

final class EnderecoRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarPorCliente(int $clienteId): array
    {
        $sql = 'SELECT * FROM enderecos WHERE cliente_id = :cliente_id ORDER BY principal DESC, id DESC';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $clienteId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorIdECliente(int $id, int $clienteId): ?array
    {
        $sql = 'SELECT * FROM enderecos WHERE id = :id AND cliente_id = :cliente_id LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':cliente_id', $clienteId, PDO::PARAM_INT);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return is_array($res) ? $res : null;
    }

    public function cadastrar(int $clienteId, array $dados): int
    {
        $principal = (!empty($dados['principal']) || $this->contarPorCliente($clienteId) === 0) ? 1 : 0;

        if ($principal === 1) {
            $this->removerPrincipalAnterior($clienteId);
        }

        $sql = '
            INSERT INTO enderecos (
                cliente_id, identificacao, destinatario, cep, logradouro,
                numero, complemento, bairro, cidade, estado, principal
            ) VALUES (
                :cliente_id, :identificacao, :destinatario, :cep, :logradouro,
                :numero, :complemento, :bairro, :cidade, :estado, :principal
            )
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':cliente_id' => $clienteId,
            ':identificacao' => !empty($dados['identificacao']) ? $dados['identificacao'] : 'Endereço principal',
            ':destinatario' => $dados['destinatario'],
            ':cep' => $dados['cep'],
            ':logradouro' => $dados['logradouro'],
            ':numero' => $dados['numero'],
            ':complemento' => !empty($dados['complemento']) ? $dados['complemento'] : null,
            ':bairro' => $dados['bairro'],
            ':cidade' => $dados['cidade'],
            ':estado' => strtoupper($dados['estado']),
            ':principal' => $principal
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function cadastrarPrincipal(int $clienteId, array $dados): int
    {
        return $this->cadastrar($clienteId, array_merge($dados, ['principal' => 1]));
    }

    public function atualizar(int $id, int $clienteId, array $dados): bool
    {
        $principal = !empty($dados['principal']) ? 1 : 0;

        if ($principal === 1) {
            $this->removerPrincipalAnterior($clienteId);
        }

        $sql = '
            UPDATE enderecos SET
                identificacao = :identificacao,
                destinatario = :destinatario,
                cep = :cep,
                logradouro = :logradouro,
                numero = :numero,
                complemento = :complemento,
                bairro = :bairro,
                cidade = :cidade,
                estado = :estado,
                principal = :principal
            WHERE id = :id AND cliente_id = :cliente_id
        ';

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':cliente_id' => $clienteId,
            ':identificacao' => !empty($dados['identificacao']) ? $dados['identificacao'] : 'Endereço principal',
            ':destinatario' => $dados['destinatario'],
            ':cep' => $dados['cep'],
            ':logradouro' => $dados['logradouro'],
            ':numero' => $dados['numero'],
            ':complemento' => !empty($dados['complemento']) ? $dados['complemento'] : null,
            ':bairro' => $dados['bairro'],
            ':cidade' => $dados['cidade'],
            ':estado' => strtoupper($dados['estado']),
            ':principal' => $principal
        ]);
    }

    public function definirPrincipal(int $id, int $clienteId): void
    {
        $this->removerPrincipalAnterior($clienteId);

        $sql = 'UPDATE enderecos SET principal = 1 WHERE id = :id AND cliente_id = :cliente_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':cliente_id' => $clienteId
        ]);
    }

    public function excluir(int $id, int $clienteId): bool
    {
        $endereco = $this->buscarPorIdECliente($id, $clienteId);
        if (!$endereco) {
            return false;
        }

        $sql = 'DELETE FROM enderecos WHERE id = :id AND cliente_id = :cliente_id';
        $stmt = $this->pdo->prepare($sql);
        $deleted = $stmt->execute([':id' => $id, ':cliente_id' => $clienteId]);

        if ($deleted && (int)$endereco['principal'] === 1) {
            $sqlNovoPrincipal = 'UPDATE enderecos SET principal = 1 WHERE cliente_id = :cliente_id ORDER BY id DESC LIMIT 1';
            $stmtNp = $this->pdo->prepare($sqlNovoPrincipal);
            $stmtNp->execute([':cliente_id' => $clienteId]);
        }

        return $deleted;
    }

    private function removerPrincipalAnterior(int $clienteId): void
    {
        $sql = 'UPDATE enderecos SET principal = 0 WHERE cliente_id = :cliente_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':cliente_id' => $clienteId]);
    }

    public function contarPorCliente(int $clienteId): int
    {
        $sql = 'SELECT COUNT(*) FROM enderecos WHERE cliente_id = :cliente_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $clienteId, PDO::PARAM_INT);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    public function buscarPrincipalPorCliente(int $clienteId): ?array
    {
        $sql = '
            SELECT id, identificacao, destinatario, cep, logradouro, numero, complemento, bairro, cidade, estado, principal
            FROM enderecos
            WHERE cliente_id = :cliente_id AND principal = 1
            ORDER BY id DESC
            LIMIT 1
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':cliente_id', $clienteId, PDO::PARAM_INT);
        $stmt->execute();

        $endereco = $stmt->fetch(PDO::FETCH_ASSOC);

        return is_array($endereco) ? $endereco : null;
    }
}