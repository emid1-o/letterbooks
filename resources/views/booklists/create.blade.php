@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 720px;">
    <a href="{{ route('booklists.index') }}" style="color: #6b6257; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='#6b6257'">
        Voltar para listas
    </a>

    <p class="lb-card-title mt-2">Criar Nova Lista</p>

    <div class="lb-card">
        <form action="{{ route('booklists.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nome da Lista</label>
                <input type="text" name="name" class="form-control" required placeholder="Ex: Top 10 Ficção Científica">
            </div>

            <div class="mb-4">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control" rows="3" style="resize: vertical;"></textarea>
            </div>

            <p class="form-label mb-3">Selecione os livros para esta lista</p>
            <div class="row g-2 mb-4" style="max-height: 300px; overflow-y: auto; padding-right: 10px;">
                @foreach($books as $book)
                    <div class="col-12">
                        <div class="d-flex align-items-center gap-3 p-2" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); border-radius: 2px;">
                            <input type="checkbox" name="books[]" value="{{ $book->id }}" class="form-check-input m-0" style="background-color: transparent; border-color: rgba(255,255,255,0.2);">
                            @if($book->cover_url)
                                <img src="{{ $book->cover_url }}" alt="Capa" style="width: 30px; height: 45px; object-fit: cover; border-radius: 2px;">
                            @endif
                            <div>
                                <div style="font-family: 'Cormorant Garamond', serif; font-size: 0.95rem; color: #d4cdc5;">{{ $book->title }}</div>
                                <div style="font-size: 0.65rem; color: #6b6257;">{{ $book->author }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('booklists.index') }}" class="btn-letterbooks-outline" style="font-size: 0.72rem; padding: 0.45rem 1.2rem;">Cancelar</a>
                <button type="submit" class="btn-letterbooks">Salvar Lista</button>
            </div>
        </form>
    </div>
</div>
@endsection