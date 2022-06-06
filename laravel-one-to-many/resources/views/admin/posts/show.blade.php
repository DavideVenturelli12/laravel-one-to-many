@extends('layouts.dashboard')

@section('content')
    <div>
        {{-- link per la modifica del post --}}
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-outline-info">
            Modifica
        </a>
        {{-- link per cancellare un post --}}
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" class=" d-inline-block">
            @csrf
            @method('DELETE')
            <button type='submit' onclick="return confirm('Sei sicuro di voler eliminare il post?')" type="submit" value=""
                class="btn btn-danger">
                Elimina
            </button>
        </form>
    </div>
    <dl class="mt-3">
        <dt>Titolo:</dt>
        <dd>{{ $post->title }}</dd>
        <dt>Slug:</dt>
        <dd>{{ $post->slug }}</dd>
        <dt>Categoria:</dt>
        <dd>{{ $category->name }}</dd>
        <dt>Contenuto:</dt>
        <dd>{{ $post->content }}</dd>

    </dl>
    {{-- link per tornare indietro --}}
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary"> Indietro</a>
    {{-- / link per tornare indietro --}}
@endsection
