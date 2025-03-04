@extends('layouts.app')

@section('content')
    <div class="container">
        <livewire:author-viewer author-id="{{ $author->id }}" />
    </div>
@endsection
