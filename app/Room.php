<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['room_name','property_id'
            ,'room_description'
            ,'room_size'
            ,'number_bed'
            ,'max_adult'
            ,'max_extra_person'
            ,'extrabed_charge'
            ,'bed_config'
            ,'typeOfRoom'
            ,'rateLowSeason'
            ,'rateHightSeason'
            ,'ratePeakSeason'
            ,'rate_remark'
    ];

    public function property()
    {
        return $this->belongsTo('App\Property');
    }

    public function reservation(){
        return $this->hasMany('App\reservation');
    }
}
