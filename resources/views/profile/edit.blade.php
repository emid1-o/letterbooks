<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Letterbooks - Perfil</title>
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

            .lb-card {
                background: rgba(14, 12, 10, 0.75);
                border: 1px solid rgba(255,255,255,0.07);
                border-radius: 4px;
                padding: 2.4rem 2.2rem;
                backdrop-filter: blur(18px);
                -webkit-backdrop-filter: blur(18px);
                margin-bottom: 2rem;
            }

            .lb-card-title {
                font-family: 'Cormorant Garamond', serif;
                font-weight: 300;
                font-size: 1.1rem;
                letter-spacing: 0.12em;
                color: #8a8070;
                text-transform: uppercase;
                margin-bottom: 1.2rem;
                border-bottom: 1px solid rgba(255,255,255,0.05);
                padding-bottom: 0.8rem;
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

            .btn-danger-outline {
                background: transparent;
                border: 1px solid rgba(220, 53, 69, 0.3);
                color: #dc3545;
                font-size: 0.72rem;
                letter-spacing: 0.18em;
                text-transform: uppercase;
                padding: 0.45rem 1.2rem;
                border-radius: 2px;
                transition: all 0.2s;
            }

            .btn-danger-outline:hover {
                background: #dc3545;
                color: #fff;
            }

            .text-success-msg {
                color: #c9b99a;
                font-size: 0.8rem;
                letter-spacing: 0.05em;
            }
            
            .error-msg {
                color: #dc3545;
                font-size: 0.75rem;
                margin-top: 0.25rem;
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

                    <div class="collapse navbar-collapse" id="navbarMain">
                        <ul class="navbar-nav ms-auto align-items-sm-center gap-2 pt-3 pt-sm-0">
                            <li class="nav-item">
                                <a href="{{ route('booklogs.index') }}" class="lb-nav-link">Meus Livros</a>
                            </li>
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="btn btn-link lb-nav-link text-decoration-none">Sair</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="flex-grow-1 p-4">
                <div class="container" style="max-width: 600px;">
                    
                    <a href="{{ route('booklogs.index') }}" style="color: #6b6257; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='#6b6257'">
                        ← Voltar
                    </a>

                    <div class="mt-3">
                        
                        <div class="lb-card">
                            <h2 class="lb-card-title">Informações do Perfil</h2>
                            
                            <form method="post" action="{{ route('profile.update') }}">
                                @csrf
                                @method('patch')

                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                    @error('name') <div class="error-msg">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                    @error('email') <div class="error-msg">{{ $message }}</div> @enderror
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <button type="submit" class="btn-letterbooks">Salvar Alterações</button>
                                    @if (session('status') === 'profile-updated')
                                        <span class="text-success-msg">Salvo.</span>
                                    @endif
                                </div>
                            </form>
                        </div>

                        
                        <div class="lb-card">
                            <h2 class="lb-card-title">Atualizar Senha</h2>
                            
                            <form method="post" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <div class="mb-3">
                                    <label class="form-label">Senha Atual</label>
                                    <input type="password" name="current_password" class="form-control" autocomplete="current-password">
                                    @error('current_password', 'updatePassword') <div class="error-msg">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Nova Senha</label>
                                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                                    @error('password', 'updatePassword') <div class="error-msg">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Confirmar Nova Senha</label>
                                    <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password">
                                </div>

                                <div class="d-flex align-items-center gap-3">
                                    <button type="submit" class="btn-letterbooks">Atualizar Senha</button>
                                    @if (session('status') === 'password-updated')
                                        <span class="text-success-msg">Senha atualizada.</span>
                                    @endif
                                </div>
                            </form>
                        </div>

                        <!-- Formulário 3: Deletar Conta -->
                        <div class="lb-card" style="border-color: rgba(220, 53, 69, 0.2);">
                            <h2 class="lb-card-title" style="color: #dc3545; border-bottom-color: rgba(220, 53, 69, 0.2);">Zona de Perigo</h2>
                            <p style="font-size: 0.85rem; color: #8a8070; margin-bottom: 1.5rem;">
                                Uma vez que sua conta for excluída, todos os seus recursos e dados (incluindo seu diário de livros) serão excluídos permanentemente.
                            </p>
                            
                            <form method="post" action="{{ route('profile.destroy') }}">
                                @csrf
                                @method('delete')

                                <div class="mb-4">
                                    <label class="form-label">Confirme sua senha para deletar</label>
                                    <input type="password" name="password" class="form-control" placeholder="Sua senha">
                                    @error('password', 'userDeletion') <div class="error-msg">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit" class="btn-danger-outline">Deletar Minha Conta</button>
                            </form>
                        </div>

                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>