<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_eq','chef_eq'
    ];

    function user()
    {
        return $this->hasMany(User::class); // a baucoup de user 
    }

     function projet()
    {
        return $this->hasMany(Projet::class); // a baucoup de user 
    }
}
