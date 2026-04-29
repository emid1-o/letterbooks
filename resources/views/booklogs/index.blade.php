@extends('booklogs.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Meu Diário de Leituras</h2>
        <a href="{{ route('booklogs.create') }}" class="btn btn-primary">Logar Novo Livro</a>
    </div>

    <div class="row">
        @forelse ($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $book->author }}</h6>
                        <p class="card-text">{{ Str::limit($book->review, 100) }}</p>
                    </div>
                    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                        <span class="badge bg-warning text-dark">Nota: {{ $book->rating ?? 'S/N' }}/5</span>
                        <small class="text-muted">{{ $book->read_date ? \Carbon\Carbon::parse($book->read_date)->format('d/m/Y') : 'Data desconhecida' }}</small>
                        
                        <form action="{{ route('booklogs.destroy', $book) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
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