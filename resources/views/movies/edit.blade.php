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
        <p class="h2">Editar Película</p>
        <form method="POST" action="{{ route('movies.update', ['id' => $movie->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-center" id="title" name="title"
                    placeholder="Título de la película" value="{{ $movie->title }}">
                <label for="title">Título de la película</label>
                @error('title')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                <label for="image">Cambiar Imagen (opcional)</label>
                @error('image')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="genre" name="genre">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $genre->id == $movie->id_genre ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
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
                        <option value="{{ $rating->id }}" {{ $rating->id == $movie->id_rating ? 'selected' : '' }}>
                            {{ $rating->name }}
                        </option>
                    @endforeach
                </select>
                <label for="rating">Clasificación</label>
                @error('rating')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="status" name="status"
                    value="1" {{ $movie->status ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Activa</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Actualizar Información de la Película</button>
        </form>
    </div>
</x-layouts.template>
