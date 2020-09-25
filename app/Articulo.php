<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use StatusSeeder;

class Articulo extends Model
{
    // Archivos a agregar
    protected $fillable = [
        'titulo', 'abstract', 'archivo', 'categoria_id', 'status_id'
    ];

    // Obtenemos la categoria del articulo
    public function categoria() {
        return $this -> belongsTo(CategoriaArticulo::class);
    }

    //Obtener el status del articulo
    public function status() {
        return $this -> belongsTo(CategoriaStatus::class);
    }

    // Obenemos la informacion del usuario
    public function autor() {
        return $this -> belongsTo(User::class, 'user_id');
    }
}
