<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function index()
    {
        return view('ratings.all', [
            "ratings" => Rating::get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:80', 'min:2', 'unique:ratings'],
        ]);
        $status = $request->has('status') ? 1 : 0;
        $rating = Rating::create([
            'name' => $request->name,
            'status' => $status,
        ]);
        return redirect()->route('ratings.index')->with([
            'status' => 'La clasificación se ha agregado correctamente.',
            'ok' => true
        ]);
    }

    public function drop(int $id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();
        return redirect()->route('ratings.index')->with([
            'status' => 'La clasificación se ha eliminado correctamente.',
            'ok' => false
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:80', 'min:2', 'unique:ratings,name,' . $id],
        ]);

        $status = $request->has('status') ? 1 : 0;

        $rating = Rating::findOrFail($id);

        $rating->update([
            'name' => $request->name,
            'status' => $status,
        ]);

        return redirect()->route('ratings.index')->with([
            'status' => 'La clasificación se ha actualizado correctamente.',
            'ok' => true
        ]);
    }
    public function edit(int $id)
    {
        $rating = Rating::findOrFail($id);
        return view('ratings.edit', [
            "rating" => $rating,
        ]);
    }
}
