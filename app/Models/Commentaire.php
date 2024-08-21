<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'user_id', 'pokemon_id'];

    public function pokemon()
    {
        return $this->belongsTo(Pokemon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
