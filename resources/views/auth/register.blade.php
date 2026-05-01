<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-secondary small text-uppercase letter-spacing-1">Nome</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   class="form-control bg-transparent border-secondary text-light @error('name') is-invalid @enderror"
                   required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-secondary small text-uppercase">E-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   class="form-control bg-transparent border-secondary text-light @error('email') is-invalid @enderror"
                   required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label text-secondary small text-uppercase">Senha</label>
            <input id="password" type="password" name="password"
                   class="form-control bg-transparent border-secondary text-light @error('password') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="form-label text-secondary small text-uppercase">Confirmar Senha</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   class="form-control bg-transparent border-secondary text-light @error('password_confirmation') is-invalid @enderror"
                   required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-end gap-3">
            <a href="{{ route('login') }}" class="text-secondary small">
                Já tem uma conta?
            </a>
            <button type="submit" class="btn btn-sm px-4 py-2 text-uppercase small" 
                    style="background:#c9b99a; color:#0d0c0a; letter-spacing:0.15em;">
                Cadastrar
            </button>
        </div>
    </form>
</x-guest-layout>