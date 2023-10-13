<x-layouts.template title="Películas" globalCSS="{{ false }}" jquerie="{{ true }}"
    bootstrap="{{ true }}">
    @if (session('status'))
        @if (session('ok'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @else
            <div class="alert alert-danger text-center">{{ session('status') }}</div>
        @endif
    @endif
    <div class="movies-create">
        <p class="h2">Crear Nueva Película</p>
        <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-center" id="title" name="title"
                    placeholder="Título de la película">
                <label for="title">Título de la película</label>
                @error('title')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <label for="image">Imagen (opcional)</label>
                @error('image')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="genre" name="genre">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <label for="genre">Género</label>
                @error('genre')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="rating" name="rating">
                    @foreach ($ratings as $rating)
                        <option value="{{ $rating->id }}">{{ $rating->name }}</option>
                    @endforeach
                </select>
                <label for="rating">Clasificación</label>
                @error('rating')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" checked>
                <label class="form-check-label" for="status">Activa</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Crear Película</button>
        </form>
    </div>
    <div class="movies-list mt-5">
        <div class="row">
            <div class="col-12">
                <p class="h2">Lista de Películas</p>
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Título</th>
                            <th scope="col">Imagen</th>
                            <th scope="col">Género</th>
                            <th scope="col">Clasificación</th>
                            <th scope="col">Status</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                             <tr class="text-center">
                                <th scope="row">{{ $movie->id }}</th>
                                <td>{{ $movie->title }}</td>
                                <td>
                                    @if ($movie->image)
                                        <img width="33" src="{{ asset('storage/' . $movie->image) }}" alt="Imagen">
                                    @else
                                        No hay imagen disponible
                                    @endif
                                </td>
                                <td>{{ $movie->genre->name }}</td>
                                <td>{{ $movie->rating->name }}</td>
                                <td>{{ $movie->status == '1' ? 'Disponible' : 'No Diponible' }}</td>
                                <td>
                                    <div class="d-flex justify-content-around ms-4 me-4">
                                        <a class="btn btn-sm btn-outline-dark"
                                            href="{{ route('movies.edit', ['id' => $movie->id]) }}">
                                            Modificar
                                        </a>
                                        <a href="{{ route('movies.drop', ['id' => $movie->id]) }}"
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
