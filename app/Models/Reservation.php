<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = "reservations";

    protected $fillable = ['start_time', 'return_time', 'book_id', 'user_id'];

    public function users() {

        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->hasOne(Book::class);
    }
}
