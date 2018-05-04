<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable=['room_id','sob_id'
            ,'guest_name'
            ,'country'
            ,'email'
            ,'status'
            ,'check_in'
            ,'check_out' 
            ,'los'
            ,'rate_usd'
            ,'rate_idr'
            ,'rate_contract'
           ,'remark'
    ];

    public function sob()
    {
    	return $this->hasOne('App\Sob');
    }
    public function room()
    {
        return $this->hasOne('App\Room');
    }
}
