<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Letterbooks</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&family=DM+Sans:wght@300;400&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: #0d0d0a;
                color: #d4cdc5;
                font-family: 'DM Sans', sans-serif;
                font-weight: 300;
                min-height: 100vh;
            }

            .lb-bg {
                position: fixed;
                inset: 0;
                background-image: url('https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=2000&auto=format&fit=crop');
                background-size: cover;
                background-position: center;
                filter: grayscale(40%) brightness(0.18);
                z-index: 0;
                transform: scale(1.04);
                animation: lb-slowZoom 20s ease-in-out infinite alternate;
            }

            @keyframes lb-slowZoom {
                from { transform: scale(1.04); }
                to   { transform: scale(1.10); }
            }

            .lb-wrapper {
                position: relative;
                z-index: 10;
                animation: lb-fadeUp 0.9s cubic-bezier(0.22, 1, 0.36, 1) both;
            }

            @keyframes lb-fadeUp {
                from { opacity: 0; transform: translateY(24px); }
                to   { opacity: 1; transform: translateY(0); }
            }

            .lb-brand {
                font-family: 'Cormorant Garamond', serif;
                font-weight: 300;
                font-size: 3.2rem;
                letter-spacing: 0.25em;
                color: #f0ebe3;
                text-transform: uppercase;
                text-decoration: none;
            }

            .lb-brand:hover { color: #f0ebe3; }

            .lb-divider {
                width: 40px;
                height: 1px;
                background: #4a4035;
                margin: 0.6rem auto;
            }

            .lb-tagline {
                font-size: 0.68rem;
                letter-spacing: 0.35em;
                color: #8a8070;
                text-transform: uppercase;
            }

            .lb-nav-link {
                font-size: 0.72rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                color: #6b6257;
                text-decoration: none;
                border: 1px solid rgba(255,255,255,0.08);
                padding: 0.45rem 1.2rem;
                border-radius: 2px;
                transition: color 0.2s, border-color 0.2s;
            }

            .lb-nav-link:hover {
                color: #c9b99a;
                border-color: rgba(201,185,154,0.3);
            }

            .lb-nav-link.primary {
                background: #c9b99a;
                color: #0d0c0a;
                border-color: #c9b99a;
            }

            .lb-nav-link.primary:hover {
                background: #d9c9aa;
                border-color: #d9c9aa;
                color: #0d0c0a;
            }

            .lb-card {
                background: rgba(14, 12, 10, 0.75);
                border: 1px solid rgba(255,255,255,0.07);
                border-radius: 4px;
                padding: 2.4rem 2.2rem;
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
            }

            .lb-card-title {
                font-family: 'Cormorant Garamond', serif;
                font-weight: 300;
                font-size: 1.1rem;
                letter-spacing: 0.12em;
                color: #8a8070;
                text-transform: uppercase;
                margin-bottom: 1.2rem;
            }

            .lb-feature {
                display: flex;
                align-items: flex-start;
                gap: 1rem;
                padding: 0.9rem 0;
                border-bottom: 1px solid rgba(255,255,255,0.04);
            }

            .lb-feature:last-child { border-bottom: none; }

            .lb-feature-dot {
                width: 5px;
                height: 5px;
                border-radius: 50%;
                background: #4a4035;
                margin-top: 0.45rem;
                flex-shrink: 0;
            }

            .lb-feature-text {
                font-size: 0.85rem;
                color: #8a8070;
                line-height: 1.6;
            }

            .lb-feature-text strong {
                display: block;
                color: #c9b99a;
                font-weight: 400;
                font-size: 0.78rem;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                margin-bottom: 0.15rem;
            }

            .lb-version {
                font-size: 0.68rem;
                letter-spacing: 0.12em;
                color: #3a3530;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div class="lb-bg"></div>

        <div class="lb-wrapper d-flex flex-column min-vh-100 px-3 py-5">

            <header class="text-center mb-5">
                <a href="/" class="lb-brand">Letterbooks</a>
                <div class="lb-divider"></div>
                <p class="lb-tagline">O que você tem lido?</p>
            </header>

            @if (Route::has('login'))
                <nav class="d-flex justify-content-center gap-2 mb-5">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="lb-nav-link primary">Painel</a>
                    @else
                        <a href="{{ route('login') }}" class="lb-nav-link">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="lb-nav-link primary">Criar conta</a>
                        @endif
                    @endauth
                </nav>
            @endif

            <main class="d-flex justify-content-center align-items-start flex-grow-1">
                <div style="width:100%; max-width:480px;">
                    <div class="lb-card">
                        <p class="lb-card-title">Comece por aqui</p>

                        <div class="lb-feature">
                            <div class="lb-feature-dot"></div>
                            <div class="lb-feature-text">
                                <strong>Registre seus livros</strong>
                                Marque o que está lendo, já leu ou quer ler.
                            </div>
                        </div>

                        <div class="lb-feature">
                            <div class="lb-feature-dot"></div>
                            <div class="lb-feature-text">
                                <strong>Avalie e anote</strong>
                                Deixe sua impressão e guarde citações favoritas.
                            </div>
                        </div>

                        <div class="lb-feature">
                            <div class="lb-feature-dot"></div>
                            <div class="lb-feature-text">
                                <strong>Acompanhe seu progresso</strong>
                                Veja sua evolução como leitor ao longo do tempo.
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="text-center mt-5">
                <span class="lb-version">v{{ app()->version() }}</span>
            </footer>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>