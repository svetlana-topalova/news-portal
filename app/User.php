<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

    use Authenticatable,
        Authorizable,
        CanResetPassword;
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'remember_token'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the roles a user has
     */
    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'users_roles');
    }

    public function hasRole($check) {
        return in_array($check, array_fetch($this->roles->toArray(), 'slug'));
    }
    
    public function isAdmin(){
        return $this->hasRole('admin');
    }

    public function isEditor(){
        return $this->hasRole('editor');
    }
}
