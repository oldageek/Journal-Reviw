<?php

namespace App\Http\Controllers;

use App\Perfil;
use App\Articulo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth', ['except' => 'show']);   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        // Obtener los articulos con paginacion
        $articulos = Articulo::where('user_id', $perfil -> user_id) -> paginate(6);

        return view('perfiles.show', compact('perfil', 'articulos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        //
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        // ejecutar Policy
        $this -> authorize('update', $perfil);

        // Validar
        $data = request() -> validate([
            'degree' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'familyname' => 'required',
            'institution' => 'required',
            'acronym' => 'required',
            'dependence' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'biografia' => 'required'
        ]);

        // Si el usuario sube una imagen
        if ($request['imagen']) {
            // obtener la ruta de la imagen
            $ruta_imagen = $request['imagen'] -> store('upload-perfiles', 'public');

            // Resize de la imagen
            $img = Image::make(public_path("storage/{$ruta_imagen}")) -> fit(400, 400);
            $img -> save();

           //  Crear arreglo de imagen
           $array_imagen = ['imagen' => $ruta_imagen];
        }

        // Asignar datos de user
        auth() -> user() -> degree = $data['degree'];
        auth() -> user() -> name = $data['name'];
        auth() -> user() -> lastname = $data['lastname'];
        auth() -> user() -> familyname = $data['familyname'];
        auth() -> user() -> institution = $data['institution'];
        auth() -> user() -> acronym = $data['acronym'];
        auth() -> user() -> dependence = $data['dependence'];
        auth() -> user() -> city = $data['city'];
        auth() -> user() -> state = $data['state'];
        auth() -> user() -> country = $data['country'];
        auth() -> user() -> phone = $data['phone'];
        auth() -> user() -> email = $data['email'];
        auth() -> user() -> save();

        // Eliminar datos de user
        unset($data['degree']);
        unset($data['name']);
        unset($data['lastname']);
        unset($data['familyname']);
        unset($data['institution']);
        unset($data['acronym']);
        unset($data['dependence']);
        unset($data['city']);
        unset($data['state']);
        unset($data['country']);
        unset($data['phone']);
        unset($data['email']);

        auth() -> user() -> perfil() -> update( array_merge(
            $data,
            $array_imagen ?? []
        ));

        return redirect() -> action('ArticuloController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}
