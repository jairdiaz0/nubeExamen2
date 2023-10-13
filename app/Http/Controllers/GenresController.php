<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        return view('genres.all', [
            "genres" => Genre::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:80', 'min:2', 'unique:genres'],
        ]);
        $status = $request->has('status') ? 1 : 0;
        $genre = Genre::create([
            'name' => $request->name,
            'status' => $status,
        ]);
        return redirect()->route('genres.index')->with([
            'status' => 'El genero se ha agregado correctamente.',
            'ok' => true
        ]);
    }

    public function drop(int $id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();
        return redirect()->route('genres.index')->with([
            'status' => 'El genero se ha eliminado correctamente.',
            'ok' => false
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:80', 'min:2', 'unique:genres,name,' . $id],
        ]);

        $status = $request->has('status') ? 1 : 0;

        $genre = Genre::findOrFail($id);

        $genre->update([
            'name' => $request->name,
            'status' => $status,
        ]);

        return redirect()->route('genres.index')->with([
            'status' => 'El género se ha actualizado correctamente.',
            'ok' => true
        ]);
    }
    public function edit(int $id)
    {
        $genre = Genre::findOrFail($id);
        return view('genres.edit', [
            "genre" => $genre,
        ]);
    }
}
