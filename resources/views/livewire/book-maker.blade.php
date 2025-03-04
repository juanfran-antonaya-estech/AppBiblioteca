<div>
    <button wire:click="openModal" class="btn btn-outline-primary">Crear</button>
    @if($isModalOpen)
        <div class="card mt-2" wire:transition>
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Creando libro</h3><button wire:click="closeModal" class="btn btn-outline-danger">Cerrar</button>
            </div>
            <div class="card-body">
                <form wire:submit="save">
                    <input class="form-control" type="text" wire:model="title" placeholder="Título">
                    @error('title')<span class="text-danger">{{ $message }}</span> <br>@enderror
                    <label for="author_id">Autor</label>
                    <select class="form-select" wire:model="author_id">
                        <option value="">Elige un autor</option>
                        @foreach($authors as $author)
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endforeach
                    </select>
                    @error('author_id') <span class="text-danger">{{ $message }}</span> <br>@enderror
                    <label for="release_year">Año de salida</label>
                    <input class="form-control" type="number" wire:model="release_year" placeholder="Año de salida"
                           min="1900" max="{{ now()->year }}" step="1">
                    @error('release_year') <span class="text-danger">{{ $message }}</span> <br>@enderror
                    <button type="submit" class="btn btn-primary mt-2">Guardar</button>

                </form>
            </div>
        </div>
    @endif
</div>
