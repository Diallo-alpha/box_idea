<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'idee_id',
        'user_id',
    ];

    /**
     * Un commentaire appartient à un et un seul utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Un commentaire est associé à une et une seule idée.
     */
    public function idee()
    {
        return $this->belongsTo(Idee::class);
    }
}
