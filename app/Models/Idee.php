<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idee extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'status',
        'user_id',
    ];

    /**
     * Une idée appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Une idée est associée à zéro ou plusieurs commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
    /*un commeenaire apartient à un seul <categorie*/
    public function categorie ()
        {
            return $this->belongsTo(Categorie::class);
        }
}
