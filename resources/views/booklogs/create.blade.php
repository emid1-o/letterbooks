@extends('booklogs.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="input-group">
                    <input type="text" id="api-search" class="form-control" placeholder="Buscar livro na API (ex: A Redoma de Vidro)">
                    <button type="button" class="btn btn-primary" onclick="searchBook()">Buscar Título Único</button>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0">Registrar Leitura</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('booklogs.store') }}" method="POST">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-3 text-center">
                            <img id="cover-preview" src="https://via.placeholder.com/128x192?text=Sem+Capa" class="img-fluid rounded shadow-sm" alt="Capa">
                            <input type="hidden" name="cover_url" id="cover_url">
                        </div>
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label class="form-label">Título do Livro</label>
                                <input type="text" name="title" id="title" class="form-control" required readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <input type="text" name="author" id="author" class="form-control" required readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nota (1 a 5)</label>
                            <input type="number" name="rating" class="form-control" min="1" max="5">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Data da Leitura</label>
                            <input type="date" name="read_date" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Review</label>
                        <textarea name="review" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('booklogs.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-success">Salvar no Diário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function searchBook() {
        const query = document.getElementById('api-search').value;
        if (!query) return;

        fetch(`https://www.googleapis.com/books/v1/volumes?q=${encodeURIComponent(query)}&maxResults=1`)
            .then(response => response.json())
            .then(data => {
                if (data.items && data.items.length > 0) {
                    const book = data.items[0].volumeInfo;
                    
                    document.getElementById('title').value = book.title || '';
                    document.getElementById('author').value = book.authors ? book.authors[0] : 'Autor Desconhecido';
                    
                    const coverUrl = book.imageLinks ? book.imageLinks.thumbnail : 'https://via.placeholder.com/128x192?text=Sem+Capa';
                    
                    document.getElementById('cover-preview').src = coverUrl;
                    document.getElementById('cover_url').value = coverUrl;
                } else {
                    alert('Livro não encontrado.');
                }
            })
            .catch(error => alert('Erro ao consultar a API do Google Books.'));
    }
</script>
@endsection