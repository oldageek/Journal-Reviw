<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'degree','name', 'lastname', 'familyname', 'institution', 'acronym','dependence', 'city', 'state', 'country', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion de 1:n de Usuario a Articulo
    public function articulos() {
        return $this -> hasMany(Articulo::class);
    }

    // Relacion de 1:1 de usuario y perfil
    public function perfil() {
        return $this -> hasOne(Perfil::class);
    }

    // Evento que se ejecuta cuando un usuario es creado
    protected static function boot() {
        parent::boot();

        // Asignar perfil una vez se haya creado un usuario nuevo
        static::created(function ($user) {
            $user  -> perfil() -> create();
        });
    }
}
