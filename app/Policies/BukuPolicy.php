<?php

namespace App\Policies;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BukuPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, $slug)
    {
        //
        $buku = Buku::where('slug', $slug)->first();
        return $user->id === $buku->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, $slug)
    {
        //
        $buku = Buku::where('slug', $slug)->first();
        return $user->id === $buku->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Buku $buku)
    {
        //
        return $user->id === $buku->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Buku $buku)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Buku $buku)
    {
        //
    }
}
