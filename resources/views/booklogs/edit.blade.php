@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 720px;">

    <a href="{{ route('booklogs.index') }}" style="color: #6b6257; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='#6b6257'">
        Voltar para meus livros
    </a>

    <p class="lb-card-title mt-2">Editar leitura</p>

    <div class="lb-card">
        <form action="{{ route('booklogs.update', $booklog) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img src="{{ $booklog->cover_url ?? 'data:image/svg+xml;utf8,<svg xmlns=%27http://www.w3.org/2000/svg%27 width=%27128%27 height=%27192%27><rect fill=%27%23141411%27 width=%27128%27 height=%27192%27/><text x=%2750%25%27 y=%2750%25%27 fill=%27%234a4035%27 font-size=%2710%27 text-anchor=%27middle%27 dy=%27.3em%27>Sem Capa</text></svg>' }}"
                         style="width: 128px; height: 192px; object-fit: cover; border: 1px solid rgba(255,255,255,0.06); border-radius: 2px;"
                         alt="Capa">
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Titulo do livro</label>
                        <input type="text" class="form-control" value="{{ $booklog->title }}" readonly style="background: rgba(20, 19, 17, 0.2);">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <input type="text" class="form-control" value="{{ $booklog->author }}" readonly style="background: rgba(20, 19, 17, 0.2);">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_favorite" name="is_favorite" value="1" {{ $booklog->is_favorite ? 'checked' : '' }} style="background-color: transparent; border-color: rgba(255,255,255,0.2);">
                        <label class="form-check-label form-label" for="is_favorite" style="color: #c9b99a; font-weight: normal;">Marcar como Favorito ❤</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Nota (1 a 5)</label>
                    <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ $booklog->rating }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data da leitura</label>
                    <input type="date" name="read_date" class="form-control" value="{{ $booklog->read_date }}">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Review</label>
                <textarea name="review" class="form-control" rows="4" style="resize: vertical;">{{ $booklog->review }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('booklogs.index') }}" class="btn-letterbooks-outline" style="font-size: 0.72rem; padding: 0.45rem 1.2rem;">Cancelar</a>
                <button type="submit" class="btn-letterbooks">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection