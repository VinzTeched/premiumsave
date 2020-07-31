<?php

namespace App\Policies;

use App\Model\admin\admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any odal= posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function viewAny(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function view(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create odal= posts.
     *
     * @param  \App\Model\user\User  $user
     * @return mixed
     */
    public function create(admin $user)
    {
        return $this->getPermission($user, 1);
    }

    /**
     * Determine whether the user can update the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function update(admin $user)
    {
        return $this->getPermission($user, 3);
    }

    /**
     * Determine whether the user can delete the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function delete(admin $user)
    {
        return $this->getPermission($user, 2);
    }
	
	public function getPermission($user, $p_id)
    {
        
        foreach ($user->roles as $role){
			foreach ($role->permission as $permission){
				if ($permission->id == $p_id){
					return true;
				}
			}
		}
		return false;
    }

    /**
     * Determine whether the user can restore the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function restore(admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the odal= post.
     *
     * @param  \App\Model\user\User  $user
     * @param  \App\odal=Post  $odal=Post
     * @return mixed
     */
    public function forceDelete(admin $user)
    {
        //
    }
}
