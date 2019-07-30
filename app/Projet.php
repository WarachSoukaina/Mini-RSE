<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_projet','chef_projet',
    ];

    function equipe()
    {
        return $this->hasMany(Equipe::class); // a baucoup de user 
    }
}
