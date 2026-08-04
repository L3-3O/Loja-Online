<?php

declare(strict_types=1);

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>
        TecnhoPunk
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image:
                radial-gradient(circle at 20% 20%, rgba(0, 240, 255, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(255, 0, 85, 0.05) 0%, transparent 40%);
        }

        .login-card {
            background-color: var(--tp-card);
            border: 1px solid var(--tp-border);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 420px;
        }

        .form-control {
            background-color: #080a0e;
            border: 1px solid var(--tp-border);
            color: var(--tp-text);
        }

        .form-control:focus {
            background-color: #080a0e;
            border-color: var(--tp-cyan);
            color: var(--tp-text);
            box-shadow: 0 0 8px rgba(0, 240, 255, 0.25);
        }

        .input-group-text {
            background-color: #171b26;
            border: 1px solid var(--tp-border);
            color: #8a99ad;
        }

        .btn-cyber {
            background-color: transparent;
            border: 1px solid var(--tp-cyan);
            color: var(--tp-cyan);
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-cyber:hover {
            background-color: var(--tp-cyan);
            color: var(--tp-dark);
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.4);
        }

        .badge-cyber {
            border: 1px solid var(--tp-cyan);
            color: var(--tp-cyan);
            background: rgba(0, 240, 255, 0.1);
        }

        .text-cyan {
            color: var(--tp-cyan) !important;
        }

        .text-magenta {
            color: var(--tp-magenta) !important;
        }
    </style>
</head>

<body>

    <div class="container p-3">
        <div class="login-card mx-auto p-4 p-md-5">

            <!-- Header / Logo -->
            <div class="text-center mb-4">
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <i class="bi bi-cpu-fill text-cyan fs-2 me-2"></i>
                    <span class="fs-3 fw-bold tracking-wide">TECHNO<span class="text-magenta">PUNK</span></span>
                </div>
                <span class="badge badge-cyber mb-2">Restricted Access // Core System</span>
                <p class="text-muted small mb-0">Submundo Node Administrator Login</p>
            </div>

            <!-- Alerta de Erro -->
            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger bg-transparent border-danger text-danger text-center small py-2 mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-1"></i> <?= $erro ?>
                </div>
            <?php endif; ?>

            <!-- Formulário de Login -->
            <form action="<?=
                            BASE_URL
                            ?>/logadm" method="POST">

                <input
                    type="hidden"
                    name="_token"
                    value="<?=
                            htmlspecialchars(
                                $csrfToken,
                                ENT_QUOTES,
                                'UTF-8'
                            )
                            ?>">

                <!-- Campo Usuário/E-mail -->
                <div class="mb-3">
                    <label for="usuario" class="form-label small text-uppercase text-muted fw-bold">E-mail / Node ID</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-terminal"></i></span>
                        <input type="email" class="form-control" id="email"
                            name="email"
                            value="<?=
                                    htmlspecialchars(
                                        (string) $email,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    )
                                    ?>" placeholder="admin@technopunk.io" autocomplete="username"
                                required
                                autofocus>
                    </div>
                </div>

                <!-- Campo Senha -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <label for="senha" class="form-label small text-uppercase text-muted fw-bold mb-0">Chave Neural (Senha)</label>
                        <a href="#" class="small text-cyan text-decoration-none">Resetar?</a>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" class="form-control" id="senha" name="senha" autocomplete="current-password" placeholder="••••••••" required>
                    </div>
                </div>

                <!-- Manter Conectado -->
                <div class="form-check mb-4">
                    <input class="form-check-input bg-dark border-secondary" type="checkbox" id="remember">
                    <label class="form-check-label small text-muted" for="remember">
                        Manter sessão ativa na rede
                    </label>
                </div>

                <!-- Botão de Acesso -->
                <button type="submit" class="btn btn-cyber w-100 py-2 text-uppercase">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Inicializar Sessão
                </button>
            </form>

            <!-- Footer Card -->
            <div class="text-center mt-4 pt-3 border-top border-secondary">
                <small class="text-muted" style="font-size: 0.75rem;">
                    <i class="bi bi-lock-fill me-1 text-cyan"></i> Conexão Criptografada AES-256
                </small>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>