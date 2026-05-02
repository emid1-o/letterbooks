@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 720px;">

    <a href="{{ route('booklogs.index') }}" style="color: #6b6257; font-size: 0.72rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='#6b6257'">
        Voltar para meus livros
    </a>

    <p class="lb-card-title mt-2">Registrar leitura</p>

    <div class="lb-card mb-4">
        <div class="input-group">
            <input type="text" id="api-search" class="form-control" placeholder="Buscar livro (ex: A Redoma de Vidro)">
            <button type="button" class="btn-letterbooks" onclick="searchBook()" style="border-radius: 0 2px 2px 0;">Buscar</button>
        </div>
    </div>

    <div class="lb-card">
        <form action="{{ route('booklogs.store') }}" method="POST">
            @csrf

            <div class="row mb-4">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    <img id="cover-preview"
                         src="data:image/svg+xml;utf8,<svg xmlns=%27http://www.w3.org/2000/svg%27 width=%27128%27 height=%27192%27><rect fill=%27%23141411%27 width=%27128%27 height=%27192%27/><text x=%2750%25%27 y=%2750%25%27 fill=%27%234a4035%27 font-size=%2710%27 text-anchor=%27middle%27 dy=%27.3em%27>Sem Capa</text></svg>"
                         style="width: 128px; height: 192px; object-fit: cover; border: 1px solid rgba(255,255,255,0.06); border-radius: 2px;"
                         alt="Capa">
                    <input type="hidden" name="cover_url" id="cover_url">
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label class="form-label">Titulo do livro</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Autor</label>
                        <input type="text" name="author" id="author" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 mb-3 mb-md-0">
                    <label class="form-label">Nota (1 a 5)</label>
                    <input type="number" name="rating" class="form-control" min="1" max="5">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data da leitura</label>
                    <input type="date" name="read_date" class="form-control">
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label">Review</label>
                <textarea name="review" class="form-control" rows="4" style="resize: vertical;"></textarea>
            </div>

            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_favorite" id="is_favorite" value="1">
                    <label class="form-check-label" for="is_favorite" style="color: #c9b99a; font-size: 0.85rem;">
                        Marcar como favorito ❤️
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('booklogs.index') }}" class="btn-letterbooks-outline" style="font-size: 0.72rem; padding: 0.45rem 1.2rem;">Cancelar</a>
                <button type="submit" class="btn-letterbooks">Salvar no diario</button>
            </div>
        </form>
    </div>
</div>

<script>
async function searchBook() {
    const query = document.getElementById('api-search').value.trim();
    if (!query) return;

    const button = document.querySelector('button[onclick="searchBook()"]');
    button.disabled = true;
    button.textContent = 'Buscando...';

    const apiKey = '{{ env("GOOGLE_BOOKS_API") }}';

    try {
        const res = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(query)}&langRestrict=pt&maxResults=1&key=${apiKey}`);
        const data = await res.json();

        if (!data.items || data.items.length === 0) {
            alert('Livro não encontrado ou sem edição em português.');
            return;
        }

        const book = data.items[0].volumeInfo;

        document.getElementById('title').value = book.title || '';
        document.getElementById('author').value = (book.authors && book.authors[0]) || 'Autor Desconhecido';

        let coverUrl = '';
        if (book.imageLinks && book.imageLinks.thumbnail) {
            coverUrl = book.imageLinks.thumbnail.replace('http:', 'https:');
        }

        document.getElementById('cover-preview').src =
            coverUrl ||
            'data:image/svg+xml;utf8,<svg xmlns=%27http://www.w3.org/2000/svg%27 width=%27128%27 height=%27192%27><rect fill=%27%23141411%27 width=%27128%27 height=%27192%27/><text x=%2750%25%27 y=%2750%25%27 fill=%27%234a4035%27 font-size=%2710%27 text-anchor=%27middle%27 dy=%27.3em%27>Sem Capa</text></svg>';

        document.getElementById('cover_url').value = coverUrl;

    } catch (e) {
        alert('Erro ao buscar o livro.');
    } finally {
        button.disabled = false;
        button.textContent = 'Buscar';
    }
}
</script>
@endsection