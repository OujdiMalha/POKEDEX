<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Pokemon extends Model
{
    use HasFactory;

    protected $fillable = ['nom','pv', 'poids', 'taille', 'image'];

    public function types()
    {
        return $this->belongsToMany(Type::class, 'pokemon_type');
    }

    public function attaques()
    {
        return $this->belongsToMany(Attaque::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentaires() {
        return $this->hasMany(Commentaire::class);
    }
}
