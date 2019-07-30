<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
     'titre','lieu','description','date_event','active','created_by',
    ];

    function equipe()
    {
        return $this->belongsTo(Equipe::class);  // user appartient a un equipe
    }

}
