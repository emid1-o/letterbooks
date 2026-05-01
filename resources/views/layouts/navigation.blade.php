<nav class="navbar navbar-expand-sm py-3" style="border-bottom: 1px solid rgba(255,255,255,0.04);">
    <div class="container px-4">
        <a href="{{ route('dashboard') }}" class="lb-brand navbar-brand" style="font-size: 1.7rem; letter-spacing: 0.2em; padding: 0;">
            Letterbooks
        </a>

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
                    <ul class="dropdown-menu dropdown-menu-end mt-2" style="background: rgba(14,12,10,0.96); border: 1px solid rgba(255,255,255,0.07); border-radius: 2px; padding: 0.4rem 0; backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px);">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item" style="color: #8a8070; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;" onmouseover="this.style.background='rgba(201,185,154,0.08)'; this.style.color='#c9b99a';" onmouseout="this.style.background='transparent'; this.style.color='#8a8070';">Perfil</a>
                        </li>
                        <li><hr style="border-color: rgba(255,255,255,0.04); margin: 0.2rem 0;"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" style="background: none; border: none; width: 100%; text-align: left; color: #8a8070; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;" onmouseover="this.style.background='rgba(201,185,154,0.08)'; this.style.color='#c9b99a';" onmouseout="this.style.background='transparent'; this.style.color='#8a8070';">Sair</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>