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
                white-space: nowrap;
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

            .lb-dropdown-item {
                color: #8a8070;
                font-size: 0.72rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                padding: 0.5rem 1.2rem;
                transition: background 0.2s, color 0.2s;
            }

            .lb-dropdown-item:hover {
                background: rgba(201,185,154,0.08);
                color: #c9b99a;
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }

            .form-control {
                background: rgba(20, 19, 17, 0.45);
                border: 1px solid rgba(255, 255, 255, 0.08);
                color: #d4cdc5;
                border-radius: 2px;
                font-size: 0.85rem;
                padding: 0.55rem 0.9rem;
            }

            .form-control:focus {
                background: rgba(20, 19, 17, 0.55);
                border-color: #c9b99a;
                box-shadow: 0 0 0 0.15rem rgba(201, 185, 154, 0.15);
                color: #f0ebe3;
            }

            .form-label {
                font-size: 0.68rem;
                letter-spacing: 0.15em;
                text-transform: uppercase;
                color: #6b6257;
                margin-bottom: 0.25rem;
            }

            .btn-letterbooks {
                background: #c9b99a;
                color: #0d0c0a;
                border: none;
                font-size: 0.72rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                padding: 0.5rem 1.8rem;
                border-radius: 2px;
                transition: background 0.2s;
            }

            .btn-letterbooks:hover {
                background: #d9c9aa;
                color: #000;
            }

            .btn-letterbooks-outline {
                background: transparent;
                border: 1px solid rgba(255, 255, 255, 0.08);
                color: #6b6257;
                font-size: 0.72rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                padding: 0.45rem 1.2rem;
                border-radius: 2px;
                transition: color 0.2s, border-color 0.2s;
                white-space: nowrap;
            }

            .btn-letterbooks-outline:hover {
                color: #c9b99a;
                border-color: rgba(201,185,154,0.3);
            }

            .stat-box {
                background: rgba(255,255,255,0.02);
                border-radius: 2px;
                padding: 1.2rem;
            }

            .stat-label {
                font-size: 0.65rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: #6b6257;
            }

            .stat-value {
                color: #c9b99a;
                margin: 0.3rem 0 0 0;
                font-family: 'Cormorant Garamond', serif;
                font-weight: 300;
                font-size: 1.8rem;
            }

            .lb-book-card {
                background: rgba(14, 12, 10, 0.55);
                border: 1px solid rgba(255,255,255,0.05);
                border-radius: 2px;
                padding: 1.2rem;
                transition: border-color 0.2s;
            }

            .lb-book-card:hover {
                border-color: rgba(201,185,154,0.2);
            }

            .lb-book-title {
                font-family: 'Cormorant Garamond', serif;
                font-weight: 400;
                font-size: 1rem;
                color: #d4cdc5;
                margin-bottom: 0.2rem;
            }

            .lb-book-author {
                font-size: 0.72rem;
                color: #6b6257;
                letter-spacing: 0.06em;
            }

            .lb-badge {
                font-size: 0.62rem;
                letter-spacing: 0.1em;
                text-transform: uppercase;
                padding: 0.2rem 0.6rem;
                border-radius: 2px;
            }

            .lb-badge-reading {
                background: rgba(201,185,154,0.12);
                color: #c9b99a;
                border: 1px solid rgba(201,185,154,0.2);
            }

            .lb-badge-read {
                background: rgba(140,130,110,0.08);
                color: #8a8070;
                border: 1px solid rgba(140,130,110,0.15);
            }

            .lb-badge-want {
                background: rgba(180,160,140,0.06);
                color: #a09580;
                border: 1px solid rgba(180,160,140,0.12);
            }
        </style>
    </head>
    <body>
        <div class="lb-bg"></div>

        <div class="lb-wrapper d-flex flex-column min-vh-100">

            <nav class="navbar navbar-expand-sm w-100" style="border-bottom: 1px solid rgba(255,255,255,0.04);">
                <div class="container-fluid px-4">
                    <a href="{{ route('dashboard') }}" style="
                        font-family: 'Cormorant Garamond', serif;
                        font-weight: 300;
                        font-size: 1.7rem;
                        letter-spacing: 0.2em;
                        color: #f0ebe3;
                        text-transform: uppercase;
                        text-decoration: none;
                        padding: 0.5rem 0;
                    ">Letterbooks</a>

                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Alternar navegacao">
                        <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27><path stroke=%27%236b6257%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 stroke-width=%272%27 d=%27M4 7h22M4 15h22M4 23h22%27/></svg>');"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarMain">
                        <ul class="navbar-nav ms-auto align-items-sm-center gap-2 pt-3 pt-sm-0">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="lb-nav-link {{ request()->routeIs('dashboard') ? 'primary' : '' }}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="lb-nav-link">Meus livros</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="lb-nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-2" style="background: rgba(14,12,10,0.96); border: 1px solid rgba(255,255,255,0.07); border-radius: 2px; padding: 0.4rem 0; backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); min-width: 160px;">
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="dropdown-item lb-dropdown-item">Perfil</a>
                                    </li>
                                    <li><hr style="border-color: rgba(255,255,255,0.04); margin: 0.2rem 0;"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item lb-dropdown-item w-100 text-start border-0 bg-transparent">Sair</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="flex-grow-1 p-4">
                <div class="container" style="max-width: 720px;">
                    <div class="lb-card">
                        <p class="lb-card-title">Visao geral</p>

                        <div class="row g-3 mb-4">
                            <div class="col-sm-4">
                                <div class="stat-box">
                                    <div class="stat-label">Lendo agora</div>
                                    <div class="stat-value">3</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-box">
                                    <div class="stat-label">Lidos</div>
                                    <div class="stat-value">12</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="stat-box">
                                    <div class="stat-label">Quero ler</div>
                                    <div class="stat-value">7</div>
                                </div>
                            </div>
                        </div>

                        <p class="lb-card-title" style="margin-top: 2rem;">Leituras recentes</p>

                        <div class="d-flex flex-column gap-2">
                            <div class="lb-book-card d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lb-book-title">Memorias Postumas de Bras Cubas</div>
                                    <div class="lb-book-author">Machado de Assis</div>
                                </div>
                                <span class="lb-badge lb-badge-reading">Lendo</span>
                            </div>

                            <div class="lb-book-card d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lb-book-title">Grande Sertao: Veredas</div>
                                    <div class="lb-book-author">Guimaraes Rosa</div>
                                </div>
                                <span class="lb-badge lb-badge-read">Lido</span>
                            </div>

                            <div class="lb-book-card d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="lb-book-title">Capitães da Areia</div>
                                    <div class="lb-book-author">Jorge Amado</div>
                                </div>
                                <span class="lb-badge lb-badge-want">Quero ler</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="text-center py-4">
                <span class="lb-version">Letterbooks — v{{ app()->version() }}</span>
            </footer>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>