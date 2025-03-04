@extends('layouts.app')

@section('content')
    <div class="container col-10">
        <h1>Libros</h1>
        @if (Auth::user()->role < 10)
            <livewire:book-maker />
        @endif
        <div class="container col-10">
            @foreach($bookChunks as $bookChunk)
                <div class="card-group my-2">
                    @foreach ($bookChunk as $book)
                        <div class="card">
                            <div class="card-header">
                                <h3>{{ $book->title }}</h3>
                                @if ($book->status)
                                    @if($book->user_id != null)
                                        <span class="badge bg-danger">Prestado a {{ $book ->user->name }}</span>
                                    @else
                                        <span class="badge bg-warning">No disponible</span>
                                    @endif
                                @else
                                    <span class="badge bg-success">Disponible</span>
                                @endif
                            </div>
                            <div class="card-body">
                                <p>Autor: {{ $book->author->name }}</p>
                            </div>
                            @if (!$book->status)
                                <div class="card-footer">
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-primary d-block w-50 mx-auto">Ver</a>
                                </div>
                            @else
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
