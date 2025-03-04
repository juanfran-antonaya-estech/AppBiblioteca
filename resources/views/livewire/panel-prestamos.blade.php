<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    @if($lendedList->count() == 0)
        <h3 class="text-muted">No tienes ningún libro reservado</h3>
    @else
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Libros prestados</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Año de salida</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lendedList as $libro)
                        <tr wire:key="{{ $libro->id }}">
                            <td>{{ $libro->title }}</td>
                            <td>{{ $libro->author->name }}</td>
                            <td>{{ $libro->release_year }}</td>
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('books.show', $libro->id) }}" class="btn btn-primary d-block">Ver libro</a>
                                <button wire:click="devolverLibro({{ $libro->id }})" class="btn btn-success d-block">Devolver libro</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
