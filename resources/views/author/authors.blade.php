@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Autores</h1>
        @if(Auth::user()->role < 10)
            {{-- TODO: Implementar AuthorMaker --}}
            <livewire:author-maker />
        @endif
        @foreach($authorChunks as $authorChunk)
            <div class="card-group my-2">
                @foreach($authorChunk as $author)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $author->name }}</h5>
                            <p class="card-text">Fecha de nacimiento: {{ $author->birth_date->isoFormat("D/MM/Y") }}</p>

                        </div>
                        <div class="card-footer">
                            <div class="btn-group d-block w-50 mx-auto">
                                <a href="{{ route('authors.show', $author->id) }}" class="btn btn-primary d-block">Ver</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
