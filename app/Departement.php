<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_dep','chef_dep'
    ];


    function user()
    {
        return $this->hasMany(User::class); // a baucoup de user 
    }
}
