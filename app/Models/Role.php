<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * Set timestamps off
     */
    public $timestamps = false;

    /**
     * Get users with a certain role
     */
    public function users() {
        return $this->belongsToMany('App\User', 'users_roles');
    }

}
