<?php

namespace App\Policies;

use App\Articulo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticuloPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Articulo  $articulo
     * @return mixed
     */
    public function view(User $user, Articulo $articulo)
    {
        //
        return $user -> id === $articulo -> user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Articulo  $articulo
     * @return mixed
     */
    public function update(User $user, Articulo $articulo)
    {
        //Revisar si el usuario autenticado es el que crea el articulo
        return $user -> id === $articulo -> user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Articulo  $articulo
     * @return mixed
     */
    public function delete(User $user, Articulo $articulo)
    {
        //Revisar que el usuario autenticado es el mismo que elimina la receta
        return $user -> id === $articulo -> user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Articulo  $articulo
     * @return mixed
     */
    public function restore(User $user, Articulo $articulo)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Articulo  $articulo
     * @return mixed
     */
    public function forceDelete(User $user, Articulo $articulo)
    {
        //
    }
}
