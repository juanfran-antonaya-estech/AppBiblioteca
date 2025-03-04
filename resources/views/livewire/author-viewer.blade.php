<div class="card">
    {{-- Do your work, then step back. --}}
    <div class="card-header d-flex justify-content-between">
        <h3>{{ $isEditing ? "Editando" : "Viendo" }} {{ $author->name }}</h3>
        <div class="btn-group">
            @if($isEditing)
                <button class="btn btn-danger" wire:click="hideEditForm">Cancelar edición</button>
            @else
                @if(Auth::user()->role < 10)
                    <button class="btn btn-danger" wire:click="delete">{{ $deleteConfirm ? "¿Seguro?" : "Eliminar autor" }}</button>
                    <button class="btn btn-outline-primary" wire:click="showEditForm">Editar</button>
                @endif
                <a href="{{ route('authors.index') }}" class="btn btn-primary">Volver</a>
            @endif
        </div>
    </div>
    <div class="card-body">
        @if($isEditing)
            <form wire:submit="save">
                <div class="input-group mb-3">
                    <label for="name" class="input-group-text">Nombre</label>
                    <input type="text" class="form-control" wire:model="name">
                </div>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <label for="bio" class="input-group-text">Biografía</label>
                    <textarea class="form-control" wire:model="bio"></textarea>
                </div>
                @error('bio')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="input-group mb-3">
                    <label for="birth_date" class="input-group-text">Fecha de nacimiento</label>
                    <input type="date" class="form-control" wire:model="birth_date"
                           value="{{ $author->birth_date->toDateString() }}">
                </div>
                @error('birth_date')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        @else
            <p class="card-text">Nombre: {{ $author->name }}</p>
            <p class="card-text">Biografía:</p>
            <p class="card-text border rounded p-1">{{ $author->bio }}</p>
            <p class="card-text">Fecha de nacimiento: {{ $author->birth_date->isoFormat("DD/MM/YYYY") }}</p>
        @endif
    </div>
    <div class="card-footer">
        @if(!$isEditing)
            <h3>Libros</h3>
            <ul>
                @foreach ($author->books as $book)
                    <li><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a> <span class="badge bg-{{ $book->status ? "danger" : "success" }}">{{ $book->status ? "No disponible" : "Disponible" }}</span></li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
