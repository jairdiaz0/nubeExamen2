<x-layouts.template title="Generos" globalCSS="{{ false }}" jquerie="{{ true }}"
    bootstrap="{{ true }}">
    @if (session('status'))
        @if (session('ok'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @else
            <div class="alert alert-danger text-center">{{ session('status') }}</div>
        @endif
    @endif
    <div class="genders-create">
        <p class="h2">Crear Nuevo Género</p>
        <form method="POST" action="{{ route('genres.store') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-center" id="name" name="name"
                    placeholder="Nombre del Género">
                <label for="name">Nombre del Género</label>
                @error('name')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                <label class="form-check-label" for="status">Activo</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Crear Género</button>
        </form>
    </div>
    <div class="genders-list mt-5">
        <div class="row">
            <div class="col-12">
                <p class="h2">Lista de Generos</p>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Status</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                            <tr class="text-center">
                                <th scope="row">{{ $genre->id }}</th>
                                <td>{{ $genre->name }}</td>
                                <td>{{ $genre->status == '1' ? 'Disponible' : 'No Diponible' }}</td>
                                <td>
                                    <div class="d-flex justify-content-around ms-4 me-4">
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="{{ route('genres.edit', ['id' => $genre->id]) }}">
                                            Modificar
                                        </a>
                                        <a href="{{ route('genres.drop', ['id' => $genre->id]) }}"
                                            class="btn btn-sm btn-outline-danger">
                                            Eliminar
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.template>
