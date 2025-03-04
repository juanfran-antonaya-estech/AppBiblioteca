<div class="container col-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>{{ $isEditing ? "Editando" : "Viendo" }} libro</h3>
            <button class="btn btn-primary" wire:click="goback">Volver</button>
        </div>
        <div class="card-body">
            @if($isEditing)
                <form wire:submit="save">
                    <div class="input-group">
                        <label for="title" class="input-group-text">Título:</label>
                        <input class="form-control" type="text" wire:model="title">
                    </div>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <label for="release_year" class="input-group-text">Año de lanzamiento</label>
                        <input type="number" class="form-control" wire:model="release_year">
                    </div>
                    @error('release_year')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group">
                        <label for="author_id" class="input-group-text">Autor</label>
                        <select class="form-select" wire:model="author_id">
                            <option value="{{$book->author->id}}" selected>{{$book->author->name}}</option>
                            @foreach($authors as $author)
                                <option
                                    value="{{ $author->id }}" {{ $book->author_id == $author->id ? "hidden" : "" }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Guardar Formulario</button>
                    </div>
                    @error('author_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </form>
            @else
                <p>Título: <span class="font-bold">{{ $book->title }}</span></p>
                <p>Año de salida: <span class="font-bold">{{ $book->release_year }}</span></p>
                <p>Autor: <a class="link-primary link-underline-info" href="{{ route('authors.show', $book->author) }}">{{ $book->author->name }}</a></p>
                @if($book->status)
                    @if($book->user_id != null)
                        <p class="badge bg-warning">En prestamo</p>
                    @else
                        <p class="badge bg-danger">No disponible</p>
                    @endif
                @else
                    <p class="badge bg-success">Disponible</p>
                @endif
            @endif
        </div>
        <div class="card-footer">
            @if($isEditing)
                <button class="btn btn-danger" wire:click="hideEditForm">Cancelar edición</button>
            @else
                <div class="btn-group">
                    @if(Auth::user()->role < 10)
                        <button class="btn btn-outline-primary" wire:click="showEditForm" >Editar</button>
                        <button class="btn btn-danger" wire:click="delete">{{ $deleteConfirm ? "¿Seguro?" : "Eliminar este libro" }}</button>
                    @endif
                    @if($book->status && $book->user_id == Auth::user()->id)
                        <button class="btn btn-outline-success" wire:click="devolver">Devolver libro</button>
                    @elseif(!$book->status)
                        <button class="btn btn-outline-warning" wire:click="prestar">Pedir prestado</button>
                    @endif
                </div>

            @endif
        </div>
    </div>
</div>
