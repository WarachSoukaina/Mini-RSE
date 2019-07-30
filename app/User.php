<?php

namespace App;


use App\Group;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','poste','date_ne','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function departement()
    {
        return $this->belongsTo(Departement::class); // user appartient a un depart
    }

    function equipe()
    {
        return $this->belongsTo(Equipe::class);  // user appartient a un equipe
    }
    public function group()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
