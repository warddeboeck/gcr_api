<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the users associated with the discipline.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'discipline_id');
    }
}
