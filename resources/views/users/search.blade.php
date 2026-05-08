@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 720px;">
    <p class="lb-card-title mt-4">Resultados para "{{ $query }}"</p>

    <div class="lb-card">
        <div class="d-flex flex-column gap-3">
            @forelse ($users as $user)
                <div class="d-flex justify-content-between align-items-center" style="border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1rem;">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width: 40px; height: 40px; border-radius: 50%; background: #c9b99a; color: #0d0d0a; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1.2rem;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <div style="font-family: 'Cormorant Garamond', serif; font-size: 1.2rem; color: #f0ebe3;">{{ $user->name }}</div>
                            <div style="font-size: 0.7rem; color: #8a8070;">Membro desde {{ $user->created_at->format('Y') }}</div>
                        </div>
                    </div>
                    <a href="{{ route('users.show', $user) }}" class="btn-letterbooks-outline" style="text-decoration: none;">Ver Perfil</a>
                </div>
            @empty
                <div class="text-center py-4" style="color: #8a8070; font-size: 0.9rem;">
                    Nenhum usuário encontrado com esse nome.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection