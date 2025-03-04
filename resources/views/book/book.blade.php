@extends('layouts.app')

@section('content')
    <livewire:book-viewer book-id="{{ $book->id }}" />
@endsection
