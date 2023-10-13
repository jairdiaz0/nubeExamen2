<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    protected $fillable = ['title', 'image', 'id_genre', 'id_rating', 'status'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre', 'id');
    }

    public function rating()
    {
        return $this->belongsTo(Rating::class, 'id_rating', 'id');
    }

    use HasFactory;
}
