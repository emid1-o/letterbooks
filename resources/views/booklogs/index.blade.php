@extends('booklogs.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Meu Diário de Leituras</h2>
        <a href="{{ route('booklogs.create') }}" class="btn btn-primary">Logar Novo Livro</a>
    </div>

    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="row g-0 h-100">
                        <div class="col-md-4 p-3 text-center bg-light d-flex align-items-center justify-content-center">
                            <img src="{{ $book->cover_url ?? 'https://via.placeholder.com/128x192?text=Sem+Capa' }}" class="img-fluid rounded shadow-sm" alt="Capa">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column h-100">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                                <p class="card-text flex-grow-1 mt-2">{{ Str::limit($book->review, 90) }}</p>
                                
                                <div class="mt-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-warning text-dark">Nota: {{ $book->rating ?? '-' }}/5</span>
                                    <form action="{{ route('booklogs.destroy', $book) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Você ainda não registrou nenhum livro.</div>
            </div>
        @endforelse
    </div>
@endsection