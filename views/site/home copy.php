<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechnoPunk | Em Construção</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #050508;
            --neon-pink: #ff0055;
            --neon-cyan: #00f0ff;
            --neon-yellow: #f4ee01;
            --text-color: #f0f0f5;
            --panel-bg: rgba(10, 10, 20, 0.85);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Share Tech Mono', monospace;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Efeito de grade cyberpunk de fundo */
        .cyber-grid {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 240, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 0, 85, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: 1;
        }

        /* Linhas de scanline estilo CRT */
        .scanlines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                rgba(18, 16, 16, 0) 50%, 
                rgba(0, 0, 0, 0.25) 50%
            );
            background-size: 100% 4px;
            z-index: 2;
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 3;
            text-align: center;
            padding: 2rem;
            max-width: 800px;
            border: 2px solid var(--neon-cyan);
            background: var(--panel-bg);
            box-shadow: 0 0 20px rgba(0, 240, 255, 0.3), inset 0 0 15px rgba(255, 0, 85, 0.2);
            clip-path: polygon(
                0 0, 
                calc(100% - 20px) 0, 
                100% 20px, 
                100% 100%, 
                20px 100%, 
                0 calc(100% - 20px)
            );
        }

        .status-badge {
            display: inline-block;
            background-color: var(--neon-yellow);
            color: #000;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 0.4rem 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 10px var(--neon-yellow);
            animation: pulse 1.5s infinite;
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: #fff;
            margin-bottom: 0.5rem;
            text-shadow: 
                3px 3px 0px var(--neon-pink),
                -3px -3px 0px var(--neon-cyan);
        }

        .subtitle {
            font-size: 1.2rem;
            color: var(--neon-cyan);
            margin-bottom: 2rem;
            letter-spacing: 1px;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            color: #b3b3cc;
        }

        /* Formulário de Newsletter / Aviso */
        .notify-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-width: 450px;
            margin: 0 auto 2rem auto;
        }

        @media (min-width: 600px) {
            .notify-form {
                flex-direction: row;
                gap: 0;
            }
        }

        .notify-input {
            flex: 1;
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--neon-cyan);
            padding: 0.9rem 1rem;
            color: var(--text-color);
            font-family: 'Share Tech Mono', monospace;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .notify-input:focus {
            border-color: var(--neon-pink);
            box-shadow: 0 0 10px rgba(255, 0, 85, 0.4);
        }

        .notify-btn {
            background-color: var(--neon-pink);
            color: #fff;
            border: none;
            padding: 0.9rem 1.5rem;
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .notify-btn:hover {
            background-color: var(--neon-cyan);
            color: #000;
            box-shadow: 0 0 15px var(--neon-cyan);
        }

        /* Links Sociais / Rodapé */
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .social-link {
            color: var(--text-color);
            text-decoration: none;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 1px;
            transition: color 0.3s ease;
            border-bottom: 1px dashed transparent;
        }

        .social-link:hover {
            color: var(--neon-yellow);
            border-bottom-color: var(--neon-yellow);
        }

        .footer-note {
            margin-top: 2rem;
            font-size: 0.85rem;
            color: #666688;
            letter-spacing: 1px;
        }

        @keyframes pulse {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="cyber-grid"></div>
    <div class="scanlines"></div>

    <div class="container">
        <div class="status-badge">SISTEMA EM STAND-BY // 0% COMPLETO</div>
        
        <h1>TechnoPunk</h1>
        <div class="subtitle">&lt; HARDWARE, ESTILO & FUTURO /&gt;</div>

        <p>
            Nossa infraestrutura digital está sendo reescrita no submundo da rede. 
            Prepare-se para o lançamento de uma nova experiência em vestuário, acessórios e gadgets de vanguarda.
        </p>

        <form class="notify-form" onsubmit="event.preventDefault(); alert('Conexão estabelecida! Você será avisado no lançamento.');">
            <input type="email" class="notify-input" placeholder="DIGITE SEU E-MAIL_">
            <button type="submit" class="notify-btn">ACESSAR VIP</button>
        </form>

        <div class="social-links">
            <a href="#" class="social-link">[ INSTAGRAM ]</a>
            <a href="#" class="social-link">[ DISCORD ]</a>
            <a href="#" class="social-link">[ TWITTER ]</a>
        </div>

        <div class="footer-note">
            // TECHNOPUNK INC. TODOS OS DIREITOS RESERVADOS.
        </div>
    </div>

</body>
</html>