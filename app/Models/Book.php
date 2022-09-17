<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "books";

    protected $fillable = ['title', 'author', 'year', 'status'];

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function reservations() {
        return $this->BelongsTo(Reservation::class);
    }
}
