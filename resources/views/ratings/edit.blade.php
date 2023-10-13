<x-layouts.template title="Clasificación" globalCSS="{{ false }}" jquerie="{{ true }}"
    bootstrap="{{ true }}">
    @if (session('status'))
        @if (session('ok'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @else
            <div class="alert alert-danger text-center">{{ session('status') }}</div>
        @endif
    @endif
    <div class="ratings-create">
        <p class="h2">Editar la clasificación</p>
        <form method="POST" action="{{ route('ratings.update', ['id' => $rating->id]) }}">
            @method('PUT')
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control text-center" id="name" name="name"
                    placeholder="Nombre de la clasificación" value="{{ $rating->name }}">
                <label for="name">Nombre de la clasificación</label>
                @error('name')
                    <small class="text-danger" role="alert">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" @if($rating->status) checked @endif>
                <label class="form-check-label" for="status">Activo</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Actualizar información de la clasificación</button>
        </form>
    </div>
</x-layouts.template>
