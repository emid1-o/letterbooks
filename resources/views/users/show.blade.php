@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 1100px;">
    <div class="d-flex align-items-center gap-4 mb-4 mt-2">
        <div style="width: 80px; height: 80px; border-radius: 50%; background: #c9b99a; color: #0d0d0a; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 2.5rem; font-family: 'Cormorant Garamond', serif;">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <div>
            <h1 style="font-family: 'Cormorant Garamond', serif; font-weight: 700; color: #f0ebe3; margin: 0;">{{ $user->name }}</h1>
            <p style="color: #8a8070; font-size: 0.85rem; letter-spacing: 0.1em; text-transform: uppercase; margin: 0;">{{ $books->count() }} Leituras Registradas</p>
        </div>
    </div>

    <div class="lb-card">
        <p class="lb-card-title">Diário de {{ $user->name }}</p>

        <div class="d-flex flex-column gap-3">
            @forelse ($books as $book)
                <div class="lb-book-card d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row gap-3">
                        <div class="d-flex align-items-center gap-3">
                            @if($book->cover_url)
                                <img src="{{ $book->cover_url }}" alt="Capa" style="width: 45px; height: 68px; object-fit: cover; border-radius: 2px;">
                            @endif
                            <div>
                                <div class="lb-book-title" style="font-size: 1.1rem;">{{ $book->title }}
                                    @if($book->is_favorite)
                                        <span style="color: #c9b99a; font-size: 0.8rem; margin-left: 4px;">❤</span>
                                    @endif
                                </div>
                                <div class="lb-book-author">{{ $book->author }}</div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center gap-3 mt-2 mt-sm-0">
                            @if($book->rating)
                                <span class="lb-badge lb-badge-reading">Nota: {{ $book->rating }}/5</span>
                            @endif

                            <form action="{{ route('booklogs.like', $book) }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="btn btn-link text-decoration-none p-0 d-flex align-items-center gap-1" style="color: {{ $book->likes->contains(Auth::id()) ? '#dc3545' : '#6b6257' }}; transition: color 0.2s;">
                                    <span style="font-size: 1.2rem; line-height: 1;">{{ $book->likes->contains(Auth::id()) ? '♥' : '♡' }}</span>
                                    <span style="font-size: 0.75rem;">{{ $book->likes_count }}</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    @if($book->review)
                        <div style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 1rem; color: #a09580; font-size: 0.9rem; font-weight: 300; line-height: 1.6; white-space: pre-line;">"{{ $book->review }}"</div>
                    @endif
                </div>
            @empty
                <div class="text-center py-5" style="color: #8a8070; font-size: 0.85rem;">
                    Este usuário ainda não registrou nenhum livro.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection