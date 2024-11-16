<?php

namespace App\Policies;

use App\Models\FormularioClases;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClasesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Allow only admins to view the index
        return $user->user_type === 'admin';
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FormularioClases $formularioClases): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FormularioClases $formularioClases): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FormularioClases $formularioClases): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FormularioClases $formularioClases): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FormularioClases $formularioClases): bool
    {
        //
    }
}
