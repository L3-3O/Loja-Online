<?php

declare(strict_types=1);

namespace App\Controllers\Site;

use App\Helpers\IdSeguro;
use App\Repositories\CategoriaRepository;
use App\Repositories\ProdutoRepository;
use Config;
use RuntimeException;

class CategoriasController
{
    public function index(): void
    {
        /*
 * 1. Recebe o token criptografado da URL
 *
 * Exemplo:
 * /categoria?cat=TOKEN_CRIPTOGRAFADO
 */
        $token = trim((string) ($_GET['cat'] ?? ''));


        /*
 * 2. Verifica se o parâmetro foi informado
 */
        if ($token === '') {
            $this->pagina404();
            return;
        }


        /*
 * 3. Descriptografa o ID da categoria
 */
        $categoriaId = IdSeguro::descriptografar($token);

        if ($categoriaId === null) {
            $this->pagina404();
            return;
        }


        /*
 * 4. Conecta ao banco de dados
 */
        require_once APP_ROOT . '/database/conexao.php';

        $pdo = Config::connect();


        /*
 * 5. Instancia os repositories
 */
        $categoriaRepository = new CategoriaRepository($pdo);
        $produtoRepository = new ProdutoRepository($pdo);


        /*
 * 6. Busca a categoria
 */
        $categoria = $categoriaRepository->buscarPorId($categoriaId);


        /*
 * Categoria não encontrada
 */
        if ($categoria === null) {
            $this->pagina404();
            return;
        }


        /*
 * 7. Busca os produtos da categoria
 */
        $produtos = $produtoRepository->listarPorCategoria($categoriaId);


        /*
 * 8. Carrega a página
 */
        $this->view(
            'site/categoria',
            [
                'categoria' => $categoria,
                'produtos' => $produtos,
            ]
        );

        $arquivoView = dirname(__DIR__, 3) . '/views/site/categorias.php';

        if (!is_file($arquivoView)) {
            throw new \RuntimeException(
                'A página inicial não foi encontrada.'
            );
        }

        require $arquivoView;
    }
}
