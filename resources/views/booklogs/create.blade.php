@extends('booklogs.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Registrar Leitura</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('booklogs.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Título do Livro</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Autor</label>
                            <input type="text" name="author" class="form-control" required>
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
@endsection