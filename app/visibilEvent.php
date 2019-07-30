<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visibilEvent extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['equipe_id','evenement_id','all',];

    function equipe()
    {
        return $this->belongsTo(Equipe::class);  //  visibilEvent appartient a un equipe (l'equipe de user )
    }
}
