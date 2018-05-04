<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ResRoomResource extends Resource
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
            return ['key'=>$this->id
                 ,'reservation_id'=>$this->reservation_id
                ,'room_id'=>$this->room_id
            ];
        }
        
    }
}
