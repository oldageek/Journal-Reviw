<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\CategoriaArticulo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function index() {
        // Recetas mas nuevas
        $nuevas = Articulo::latest() -> take(5) -> get();

        // Obtenemos todas las categorias
        $categorias = CategoriaArticulo::all();

        // Agregar las recetas por categoria
        $articulos = [];

        foreach ($categorias as $categoria) {
            $articulos[Str::slug($categoria -> nombre)] [] = Articulo::where('categoria_id', $categoria -> id) -> take(3) -> get();
        }

        return view('inicio.index', compact('nuevas', 'articulos'));
    }

    public function issues() {
        // Ultimos articlos
        $ultimos_articulos = Articulo::orderBy('created_at', 'DESC') -> take(10) -> get(); 

        return view('inicio.issue', compact('ultimos_articulos'));
    }

    public function privacy() {
        return view('inicio.privacy');
    }

    public function indexing() {
        return view('inicio.indexing');
    }

    public function editorial() {
        return view('inicio.editorialboard');
    }
}
