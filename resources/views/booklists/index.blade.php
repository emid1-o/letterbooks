@extends('booklogs.layout')

@section('content')
<div class="container" style="max-width: 1100px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <p class="lb-card-title m-0">Minhas Listas</p>
        <a href="{{ route('booklists.create') }}" class="btn-letterbooks" style="text-decoration: none;">Nova Lista</a>
    </div>

    <div class="row">
        @forelse ($lists as $list)
            <div class="col-md-4 mb-4">
                <div class="lb-card h-100 d-flex flex-column" style="padding: 1.8rem;">
                    <h5 style="font-family: 'Cormorant Garamond', serif; font-weight: 700; color: #d4cdc5;">
                        <a href="{{ route('booklists.show', $list) }}" style="color: inherit; text-decoration: none;" onmouseover="this.style.color='#c9b99a'" onmouseout="this.style.color='inherit'">{{ $list->name }}</a>
                    </h5>
                    <p style="font-size: 0.8rem; color: #8a8070; margin-bottom: 1rem; flex-grow: 1;">{{ Str::limit($list->description, 80) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center" style="border-top: 1px solid rgba(255,255,255,0.05); padding-top: 1rem;">
                        <span class="lb-badge" style="background: rgba(255,255,255,0.05); color: #c9b99a;">{{ $list->book_logs_count }} livros</span>
                        
                        <form action="{{ route('booklists.destroy', $list) }}" method="POST" class="m-0 p-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-decoration-none p-0" style="color: #6b6257; font-size: 0.8rem;" onmouseover="this.style.color='#dc3545'" onmouseout="this.style.color='#6b6257'">✕</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5" style="color: #8a8070; font-size: 0.85rem; border: 1px dashed rgba(255,255,255,0.05);">
                    Você ainda não criou nenhuma lista.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection