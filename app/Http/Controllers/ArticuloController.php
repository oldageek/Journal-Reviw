<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\CategoriaArticulo;
use App\CategoriaStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    public function __construct()
    {
        $this -> middleware(['auth','verified'], ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth() -> user() -> id;
        // $articulos = auth() -> user() -> articulos;
        $articulos = Articulo::where('user_id', $usuario) -> paginate(5);

        return view('articulo.index') -> with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Con modelo
        $categorias = CategoriaArticulo::all('id','nombre');
        $status = CategoriaStatus::all('id', 'status');

        return view('articulo.create') 
            -> with('categorias', $categorias)
            -> with('status', $status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'status' => 'required',
            'abstract' => 'required',
            'archivo' => 'required|mimetypes:application/pdf|max:10000'
        ]);

        // Obtenemos ruta de archivos
        $ruta_archivos = $request['archivo'] -> store('upload-archivos', 'public');

        auth() -> user() -> articulos() -> create([
            'titulo' => $data['titulo'],
            'abstract' => $data['abstract'],
            'archivo' => $ruta_archivos,
            'categoria_id' => $data['categoria'],
            'status_id' => $data['status']
        ]);

        return redirect() -> action('ArticuloController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('articulo.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        // Revisar el policy
        $this -> authorize('view', $articulo);

        // Con modelo
        $categorias = CategoriaArticulo::all('id', 'nombre');
        $status = CategoriaStatus::all('id', 'status');

        return view('articulo.edit', compact('categorias', 'status', 'articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        // Revisar el Policy
        $this -> authorize('update', $articulo);

        //Validacion
        $data = $request -> validate([
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'status' => 'required',
            'abstract' => 'required'
        ]);

        //Asignar los valores
        $articulo -> titulo = $data['titulo'];
        $articulo -> categoria_id = $data['categoria'];
        $articulo -> status_id = $data['status'];
        $articulo -> abstract = $data['abstract'];

        //Si el usuario sube nuevo archivo
        if (request('archivo')) {
            // Obtener la ruta del archivo
            $ruta_archivos = $request['archivo'] -> store('upload-archivos', 'public');

            // Asignar al objeto
            $articulo -> archivo = $ruta_archivos;
        }

        // Asignar al objeto
        $articulo -> save();

        // Redireccionar
        return redirect() -> action('ArticuloController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        //Ejecutar el Polizy
        $this -> authorize('delete', $articulo);

        // Eliminar el articulo
        $articulo -> delete();

        return redirect() -> action('ArticuloController@index');
    }
}
