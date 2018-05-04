<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Res_room extends Model
{
    protected $fillable=['reservation_id','room_id'];

    public function reservation(){
    	return $this->hasOne('App\Reservation');
    }
     public function room(){
    	return $this->hasOne('App\Room');
    }
}
