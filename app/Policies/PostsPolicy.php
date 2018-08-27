<?php

namespace App\Policies;

use App\User;
use App\PostsModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the posts model.
     *
     * @param  \App\User  $user
     * @param  \App\PostsModel  $postsModel
     * @return mixed
     */
//    public function view(User $user, PostsModel $postsModel)
//    {
//        //
//    }

    /**
     * Determine whether the user can create posts models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the posts model.
     *
     * @param  \App\User  $user
     * @param  \App\PostsModel  $postsModel
     * @return mixed
     */
    public function update(User $user, PostsModel $postsModel)
    {
        return $user->id === $postsModel->user_id;
    }

    /**
     * Determine whether the user can delete the posts model.
     *
     * @param  \App\User  $user
     * @param  \App\PostsModel  $postsModel
     * @return mixed
     */
    public function delete(User $user, PostsModel $postsModel)
    {
        //
    }

    /**
     * Determine whether the user can restore the posts model.
     *
     * @param  \App\User  $user
     * @param  \App\PostsModel  $postsModel
     * @return mixed
     */
    public function restore(User $user, PostsModel $postsModel)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the posts model.
     *
     * @param  \App\User  $user
     * @param  \App\PostsModel  $postsModel
     * @return mixed
     */
    public function forceDelete(User $user, PostsModel $postsModel)
    {
        //
    }
}
