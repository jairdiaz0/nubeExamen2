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
        <p class="h2">Editar el Género</p>
        <form method="POST" action="{{ route('genres.update', ['id' => $genre->id]) }}">
            @method('PUT')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-center" id="name" name="name"
                    placeholder="Nombre del Género" value="{{ $genre->name }}">
                <label for="name">Nombre del Género</label>
                @error('name')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" @if($genre->status) checked @endif>
                <label class="form-check-label" for="status">Activo</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Actualizar información del Género</button>
        </form>
    </div>
</x-layouts.template>
