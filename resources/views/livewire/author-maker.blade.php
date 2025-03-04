<div>
    <button class="btn btn-{{ $isModalOpen ? "danger" : "primary" }}" wire:click="toggleModal">{{ $isModalOpen ? "Cancelar" : "Crear Autor" }}</button>
    @if($isModalOpen)
        <div class="card my-2" wire:transition>
            <div class="card-header">
                <h3 class="card-title">Creando autor</h3>
            </div>
            <div class="card-body">
                <form wire:submit="save">
                    <div class="input-group mb-3">
                        <label for="name" class="input-group-text">Nombre</label>
                        <input type="text" class="form-control" wire:model="name"/>
                    </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="input-group mb-3">
                        <label for="bio" class="input-group-text">Biografía</label>
                        <textarea class="form-control" wire:model="bio"></textarea>
                    </div>
                        @error('bio')
                        <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="input-group">
                        <label for="birth_date" class="input-group-text">Fecha de nacimiento</label>
                        <input type="date" class="form-control" wire:model="birth_date"/>
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                        @error('birth_date')
                        <div class="text-danger">{{ $message }}</div> @enderror
                </form>
            </div>
        </div>
    @endif
</div>
