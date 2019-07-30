<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembresGroup extends Model
{
	protected $fillable = ['group_id','user_id',];

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
