<x-guest-layout>
    @if (session('status'))
        <div class="alert mb-4" style="background:rgba(201,185,154,0.1); border:1px solid rgba(201,185,154,0.3); color:#c9b99a; font-size:0.8rem; border-radius:2px;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror"
                   required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input id="password" type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <div class="form-check">
                <input id="remember_me" type="checkbox" name="remember" class="form-check-input" style="background-color:transparent; border-color:rgba(255,255,255,0.2);">
                <label for="remember_me" class="form-check-label lb-link">Lembrar de mim</label>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-end gap-3">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="lb-link">Esqueceu sua senha?</a>
            @endif

            <button type="submit" class="btn lb-btn">Entrar</button>
        </div>
    </form>
</x-guest-layout>