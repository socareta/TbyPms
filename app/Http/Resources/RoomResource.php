<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Crypt;
class RoomResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->resource!=null){
             return ['key'=>$this->id,'room_name'=>$this->room_name
                    ,'room_description'=>$this->room_description
                    ,'room_size'=>$this->room_size
                    ,'number_bed'=>$this->number_bed
                    ,'max_adult'=>$this->max_adult
                    ,'max_extra_person'=>$this->max_extra_person
                    ,'extrabed_charge'=>$this->extrabed_charge
                    ,'bed_config'=>$this->bed_config
                    ,'typeOfRoom'=>$this->typeOfRoom
                    ,'rateLowSeason'=>$this->rateLowSeason
                    ,'rateHightSeason'=>$this->rateHightSeason
                    ,'ratePeakSeason'=>$this->ratePeakSeason
                    ,'rate_remark'=>$this->rate_remark
                ];
        }
       
    }
}
