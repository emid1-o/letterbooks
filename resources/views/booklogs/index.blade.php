@extends('booklogs.layout')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="lb-card-title mb-0">Meu diario de leituras</p>
            <a href="{{ route('booklogs.create') }}" class="btn-letterbooks">Logar novo livro</a>
        </div>

        <div class="d-flex flex-column gap-3">
            @forelse ($books as $book)
                <div class="lb-book-card d-flex gap-3">
                    <div class="flex-shrink-0">
                        <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/96x144?text=Sem+Capa' }}"
                             style="width: 96px; height: 144px; object-fit: cover; border: 1px solid rgba(255,255,255,0.06); border-radius: 2px;"
                             alt="Capa">
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="lb-book-title">{{ $book->title }}</div>
                                <div class="lb-book-author">{{ $book->author }}</div>
                            </div>
                            <span class="lb-badge lb-badge-reading">Nota: {{ $book->rating ?? '-' }}/5</span>
                        </div>
                        <p class="flex-grow-1 mb-0" style="font-size: 0.78rem; color: #8a8070; line-height: 1.6;">
                            {{ Str::limit($book->review, 100) }}
                        </p>
                        <div class="mt-2">
                            <form action="{{ route('booklogs.destroy', $book) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-letterbooks-outline">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="lb-card">
                    <div class="d-flex align-items-center gap-3">
                        <div class="lb-feature-dot" style="margin-top: 0;"></div>
                        <p class="mb-0" style="font-size: 0.85rem; color: #8a8070;">Voce ainda nao registrou nenhum livro.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection