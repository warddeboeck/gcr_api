<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'discipline_id',
        'name', 
        'email',
        'role', 
        'password',
        'function',
        'agency',
        'country',
        'idea_url', 
        'ip', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->role == 'super') ? true : false;
    }

    /**
     * Get the users associated with the discipline.
     */
    public function discipline()
    {
        return $this->belongsTo('App\Discipline');
    }
}
