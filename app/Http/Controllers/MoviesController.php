<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Rating;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genre', 'rating')->get();
        $genres = Genre::all();
        $ratings = Rating::all();
        return view('movies.all', compact('movies', 'genres', 'ratings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:2048'], // 2MB maximum
            'genre' => ['required', 'exists:genres,id'],
            'rating' => ['required', 'exists:ratings,id'],
            'status' => ['boolean'],
        ]);

        $status = $request->has('status') ? 1 : 0;

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->id_genre = $request->genre;
        $movie->id_rating = $request->rating;
        $movie->status = $status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('movies_images', 'public');
            $movie->image = $imagePath;
        }

        $movie->save();

        return redirect()->route('movies.index')->with([
            'status' => 'La película se ha agregado correctamente.',
            'ok' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image'], // 2MB maximum
            'genre' => ['required', 'exists:genres,id'],
            'rating' => ['required', 'exists:ratings,id'],
            'status' => ['boolean'],
        ]);

        $status = $request->has('status') ? 1 : 0;

        $movie = Movie::findOrFail($id);
        $movie->title = $request->title;
        $movie->id_genre = $request->genre;
        $movie->id_rating = $request->rating;
        $movie->status = $status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('movies_images', 'public');
            $movie->image = $imagePath;
        }

        $movie->save();

        return redirect()->route('movies.index')->with([
            'status' => 'La película se ha actualizado correctamente.',
            'ok' => true,
        ]);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with([
            'status' => 'La película se ha eliminado correctamente.',
            'ok' => false,
        ]);
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
        $ratings = Rating::all();
        return view('movies.edit', compact('movie', 'genres', 'ratings'));
    }
}
