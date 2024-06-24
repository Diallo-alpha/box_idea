<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Commentaire;
use App\Models\Idee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Les attributs assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'role',
        'email',
        'password',
    ];

    /**
     * Les attributs à masquer pour la sérialisation.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs devant être typés.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
        /**
     * Vérifie si l'utilisateur a le rôle spécifié.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Un utilisateur peut ajouter zéro ou plusieurs idées.
     */
    public function idees()
    {
        return $this->hasMany(Idee::class);
    }

    /**
     * Un utilisateur peut commenter zéro ou plusieurs commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
