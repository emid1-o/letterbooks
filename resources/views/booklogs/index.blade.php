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
                font-weight: 700;
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
                font-weight: 700;
                font-size: 3.2rem;
                letter-spacing: 0.25em;
                color: #f0ebe3;
                text-transform: uppercase;
                text-decoration: none;
            }

            .lb-brand:hover { color: #f0ebe3; }

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
                font-weight: 800;
                font-size: 1.1rem;
                letter-spacing: 0.12em;
                color: #8a8070;
                text-transform: uppercase;
                margin-bottom: 1.2rem;
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
                font-weight: 700;
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
                font-weight: 600;
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
                    <a href="{{ route('booklogs.index') }}" style="
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
                        
                        <form action="{{ route('users.search') }}" method="GET" class="d-flex mx-auto my-3 my-sm-0" style="max-width: 300px; width: 100%;">
                            <input type="text" name="q" class="form-control" placeholder="Buscar usuários..." style="border-radius: 20px; padding: 0.3rem 1rem; font-size: 0.8rem;" required>
                        </form>

                        <ul class="navbar-nav ms-auto align-items-sm-center gap-2 pt-3 pt-sm-0">
                            <li class="nav-item">
                                <a href="{{ route('booklogs.index') }}" class="lb-nav-link primary">Painel</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('booklists.index') }}" class="lb-nav-link">Listas</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('booklogs.create') }}" class="lb-nav-link">Registrar</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="lb-nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-2" style="background: rgba(14,12,10,0.96); border: 1px solid rgba(255,255,255,0.07); border-radius: 2px; padding: 0.4rem 0; backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); min-width: 160px;">
                                    <li>
                                        <a href="{{ route('users.show', Auth::id()) }}" class="dropdown-item lb-dropdown-item">Meu Perfil Público</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.edit') }}" class="dropdown-item lb-dropdown-item">Configurações</a>
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
                <div class="container" style="max-width: 1100px;">
                    <div class="lb-card">
                        <p class="lb-card-title">Visao geral</p>

                        {{-- @var $percentage float --}}
                        {{-- @var $goal int --}}
                        {{-- @var $booksReadThisYear int --}}

                        <div class="card bg-dark text-white p-4 mb-4" style="border: 1px solid rgba(255,255,255,0.1); border-radius: 15px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h5 class="mb-0" style="color: #c9b99a;">Minha Meta de {{ date('Y') }}</h5>
                                    <form action="{{ route('user.updateGoal') }}" method="POST" class="mt-1">
                                        @csrf
                                        <label style="font-size: 0.8rem; color: #8a8070;">Meta anual: </label>
                                        <input type="number" name="reading_goal" value="{{ $goal }}" 
                                            onchange="this.form.submit()"
                                            style="background: transparent; border: none; border-bottom: 1px solid #c9b99a; color: #c9b99a; width: 45px; text-align: center; font-weight: bold;">
                                    </form>
                                </div>
                                <div class="text-end">
                                    <span style="font-size: 1.5rem; font-weight: bold; color: #fff;">{{ $booksReadThisYear }}</span>
                                    <span style="color: #8a8070;">/ {{ $goal }} livros</span>
                                </div>
                            </div>

                            <div class="progress" style="height: 12px; background-color: rgba(255,255,255,0.05); border-radius: 10px;">
                               <div class="progress-bar" role="progressbar" 
                                    style="--progress-width: {{ $percentage }}%; width: var(--progress-width); background: linear-gradient(90deg, #c9b99a, #e2d5ba);" 
                                    aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row g-3 mb-4 justify-content-center">
                            <div class="col-6 col-sm-5">
                                <div class="stat-box text-center">
                                    <div class="stat-label">Total Registrados</div>
                                    <div class="stat-value">{{ $books->count() }}</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-5">
                                <div class="stat-box text-center">
                                    <div class="stat-label">Com Resenha</div>
                                    <div class="stat-value">{{ $books->whereNotNull('review')->count() }}</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-5">
                                <div class="stat-box text-center">
                                    <div class="stat-label">Fila de Leitura</div>
                                    <div class="stat-value">{{ $books->whereNull('read_date')->count() }}</div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-5">
                                <div class="stat-box text-center">
                                    <div class="stat-label">Favoritos</div>
                                    <div class="stat-value" style="color: #c9b99a;">{{ $books->where('is_favorite', true)->count() }}</div>
                                </div>
                            </div>
                        </div>

                        @php
                            $favoritos = $books->where('is_favorite', true)->take(10);
                        @endphp

                        @if($favoritos->count() > 0)
                            <p class="lb-card-title" style="margin-top: 2rem;">Sua Coleção Especial</p>
                            <div class="d-flex flex-row gap-3 mb-4 pb-2" style="overflow-x: auto; white-space: nowrap; scrollbar-width: thin;">
                                @foreach($favoritos as $fav)
                                    <div class="stat-box d-flex align-items-center" style="min-width: 220px; flex: 0 0 auto; padding: 0.7rem; border-left: 3px solid #c9b99a;">
                                        @if($fav->cover_url)
                                            <img src="{{ $fav->cover_url }}" alt="Capa" style="width: 30px; height: 45px; object-fit: cover; border-radius: 2px; margin-right: 10px;">
                                        @endif
                                        <div style="overflow: hidden; line-height: 1.2;">
                                            <div class="lb-book-title" style="font-size: 0.85rem; text-overflow: ellipsis; overflow: hidden;">{{ $fav->title }}</div>
                                            <div class="lb-book-author" style="font-size: 0.7rem; opacity: 0.8;">{{ $fav->author }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-baseline" style="margin-top: 2rem; margin-bottom: 1.2rem;">
                            <p class="lb-card-title m-0">Leituras recentes</p>
                            @if($books->count() > 5)
                                <a href="{{ route('booklogs.all') }}" style="color: #c9b99a; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; transition: opacity 0.2s;" onmouseover="this.style.opacity='0.7'" onmouseout="this.style.opacity='1'">Ver todos ({{ $books->count() }}) →</a>
                            @endif
                        </div>

                        
                        <div class="d-flex flex-column gap-2">
                            @forelse ($books->take(5) as $book)
                                
                                <div class="lb-book-card d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center gap-3">
                                        @if($book->cover_url)
                                            <img src="{{ $book->cover_url }}" alt="Capa" style="width: 40px; height: 60px; object-fit: cover; border-radius: 2px;">
                                        @endif
                                        <div>
                                            <div class="lb-book-title">{{ $book->title }}
                                                @if($book->is_favorite)
                                                    <span style="color: #c9b99a; font-size: 0.8rem; margin-left: 4px;">❤</span>
                                                @endif
                                            </div>
                                            <div class="lb-book-author">{{ $book->author }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex align-items-center gap-2">
                                        @if($book->rating)
                                            <span class="lb-badge lb-badge-reading">Nota: {{ $book->rating }}/5</span>
                                        @endif

                                        @if($book->read_date)
                                            <span class="lb-badge lb-badge-read">Lido em {{ \Carbon\Carbon::parse($book->read_date)->format('Y') }}</span>
                                        @else
                                            <span class="lb-badge lb-badge-want">Fila</span>
                                        @endif

                                        <a href="{{ route('booklogs.edit', $book) }}" style="color: #6b6257; font-size: 0.8rem; text-decoration: none;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='#6b6257'">✎</a>
                                        
                                        <form action="{{ route('booklogs.destroy', $book) }}" method="POST" class="m-0 p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-decoration-none p-0 ms-2" style="color: #6b6257; font-size: 0.8rem;" onmouseover="this.style.color='#dc3545'" onmouseout="this.style.color='#6b6257'">✕</button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5" style="color: #8a8070; font-size: 0.85rem; border: 1px dashed rgba(255,255,255,0.05);">
                                    Seu diário está vazio. <a href="{{ route('booklogs.create') }}" style="color: #c9b99a; text-decoration: none;">Comece a adicionar livros.</a>
                                </div>
                            @endforelse
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