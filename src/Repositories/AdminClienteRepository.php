<?php

declare(strict_types=1);

namespace App\Repositories;

use PDO;

final class AdminClienteRepository
{
    public function __construct(private readonly PDO $pdo)
    {
    }

    /**
     * Busca os clientes cadastrados na tabela `clientes` do banco loja_virtual_db.
     *
     * @return array{itens: array<int, array<string, mixed>>, total: int, paginas: int, pagina_atual: int}
     */
    public function listarFormatado(string $termo = '', string $status = '', int $pagina = 1, int $porPagina = 10): array
    {
        $condicoes = [];
        $parametros = [];

        // Filtro por nome, e-mail ou CPF
        if ($termo !== '') {
            $condicoes[] = '(nome LIKE :termo OR email LIKE :termo OR cpf LIKE :termo)';
            $parametros[':termo'] = '%' . $termo . '%';
        }

        // Filtro por status (ativo, inativo, bloqueado)
        if ($status !== '') {
            $condicoes[] = 'status = :status';
            $parametros[':status'] = $status;
        }

        $where = !empty($condicoes) ? ' WHERE ' . implode(' AND ', $condicoes) : '';

        // Contagem total
        $sqlCount = "SELECT COUNT(*) FROM clientes{$where}";
        $stmtCount = $this->pdo->prepare($sqlCount);
        $stmtCount->execute($parametros);
        $total = (int) $stmtCount->fetchColumn();

        // Paginação
        $paginas = $total > 0 ? (int) ceil($total / $porPagina) : 1;
        $paginaAtual = max(1, min($pagina, $paginas));
        $offset = ($paginaAtual - 1) * $porPagina;

        // Consulta dos dados
        $sql = "SELECT id, google_sub, nome, cpf, data_nascimento, telefone, email, foto_url, 
                       email_verificado, status, newsletter, aceitou_termos_em, ultimo_acesso, criado_em, atualizado_em
                FROM clientes{$where}
                ORDER BY id DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($sql);

        foreach ($parametros as $chave => $valor) {
            $stmt->bindValue($chave, $valor);
        }
        $stmt->bindValue(':limit', $porPagina, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();

        return [
            'itens' => $stmt->fetchAll(PDO::FETCH_ASSOC),
            'total' => $total,
            'paginas' => $paginas,
            'pagina_atual' => $paginaAtual,
        ];
    }
}