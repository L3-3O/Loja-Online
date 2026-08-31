<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

final class AdminCategoriasRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    /**
     * Retorna a lista de categorias filtrando por termo de busca se informado.
     *
     * @return array<int, array<string, mixed>>
     */
   /**
     * Retorna a lista de categorias filtrando por termo de busca se informado.
     *
     * @return array<int, array<string, mixed>>
     */
    public function listarTodas(string $busca = ''): array
    {
        $sql = "SELECT id, nome, imgcategoria, slug, descricao, ativo, criado_em, atualizado_em 
                FROM categorias";

        $params = [];

        if ($busca !== '') {
            $sql .= " WHERE nome LIKE :busca1 OR descricao LIKE :busca2";
            $params[':busca1'] = '%' . $busca . '%';
            $params[':busca2'] = '%' . $busca . '%';
        }

        $sql .= " ORDER BY nome ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * Cadastra uma nova categoria no banco de dados.
     */
    public function criar(string $nome, ?string $descricao = null, int $ativo = 1): bool
    {
        $slug = $this->gerarSlug($nome);

        $sql = "INSERT INTO categorias (nome, slug, descricao, ativo, criado_em, atualizado_em) 
                VALUES (:nome, :slug, :descricao, :ativo, NOW(), NOW())";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':slug' => $slug,
            ':descricao' => $descricao,
            ':ativo' => $ativo,
        ]);
    }

    /**
     * Atualiza os dados de uma categoria existente.
     */
    public function atualizar(int $id, string $nome, ?string $descricao = null, int $ativo = 1): bool
    {
        $slug = $this->gerarSlug($nome);

        $sql = "UPDATE categorias 
                SET nome = :nome, 
                    slug = :slug, 
                    descricao = :descricao, 
                    ativo = :ativo, 
                    atualizado_em = NOW() 
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':slug' => $slug,
            ':descricao' => $descricao,
            ':ativo' => $ativo,
        ]);
    }

    /**
     * Exclui uma categoria pelo ID.
     */
    public function excluir(int $id): bool
    {
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Helper para geração do slug limpo a partir do nome.
     */
    private function gerarSlug(string $texto): string
    {
        $slug = mb_strtolower($texto, 'UTF-8');
        $slug = preg_replace('/[áàãâä]/u', 'a', $slug);
        $slug = preg_replace('/[éèêë]/u', 'e', $slug);
        $slug = preg_replace('/[íìîï]/u', 'i', $slug);
        $slug = preg_replace('/[óòõôö]/u', 'o', $slug);
        $slug = preg_replace('/[úùûü]/u', 'u', $slug);
        $slug = preg_replace('/[ç]/u', 'c', $slug);
        $slug = preg_replace('/[^a-z0-9]/', '-', $slug);
        return trim((string) preg_replace('/-+/', '-', $slug), '-');
    }
}