<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

final class AdminPerfilRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    /**
     * Busca os dados do administrador pelo ID.
     */
    public function buscarPorId(int $id): ?array
    {
        $sql = "SELECT id, nome, email, senha_hash, status, ultimo_acesso, criado_em, atualizado_em 
                FROM usuarios_admin 
                WHERE id = :id 
                LIMIT 1";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        return $admin ?: null;
    }

    /**
     * Verifica se o e-mail já pertence a outro usuário admin.
     */
    public function emailExisteEmOutroAdmin(string $email, int $idAtual): bool
    {
        $sql = "SELECT COUNT(*) FROM usuarios_admin WHERE email = :email AND id != :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id', $idAtual, PDO::PARAM_INT);
        $stmt->execute();

        return ((int) $stmt->fetchColumn()) > 0;
    }

    /**
     * Atualiza o nome, e-mail e opcionalmente a senha.
     */
    public function atualizar(int $id, string $nome, string $email, ?string $novaSenhaHash = null): bool
    {
        if ($novaSenhaHash !== null) {
            $sql = "UPDATE usuarios_admin 
                    SET nome = :nome, email = :email, senha_hash = :senha_hash, atualizado_em = NOW() 
                    WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':senha_hash', $novaSenhaHash);
        } else {
            $sql = "UPDATE usuarios_admin 
                    SET nome = :nome, email = :email, atualizado_em = NOW() 
                    WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
        }

        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}