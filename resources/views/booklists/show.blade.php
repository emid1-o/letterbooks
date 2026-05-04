@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 1100px;">
    <a href="{{ route('booklists.index') }}" style="color: #6b6257; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='#6b6257'">
        Voltar para listas
    </a>

    <div class="lb-card mt-2">
        <div style="border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 1.5rem; margin-bottom: 2rem;">
            <h1 style="font-family: 'Cormorant Garamond', serif; font-weight: 700; color: #f0ebe3; margin-bottom: 0.5rem;">{{ $booklist->name }}</h1>
            @if($booklist->description)
                <p style="color: #8a8070; font-size: 0.9rem; margin: 0; white-space: pre-line;">{{ $booklist->description }}</p>
            @endif
        </div>

        <div class="d-flex flex-column gap-3">
            @forelse ($books as $book)
                <div class="lb-book-card d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row gap-3">
                        <div class="d-flex align-items-center gap-3">
                            @if($book->cover_url)
                                <img src="{{ $book->cover_url }}" alt="Capa" style="width: 45px; height: 68px; object-fit: cover; border-radius: 2px;">
                            @endif
                            <div>
                                <div class="lb-book-title" style="font-size: 1.1rem;">{{ $book->title }}</div>
                                <div class="lb-book-author">{{ $book->author }}</div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0">
                            @if($book->rating)
                                <span class="lb-badge lb-badge-reading">Nota: {{ $book->rating }}/5</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5" style="color: #8a8070; font-size: 0.85rem;">
                    Esta lista não possui livros.
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection