<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;


class RoomCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection,
            'header'=>collect(array(array('text'=>'Room Name','value'=>'room_name'),
            array('text'=>'Propety','value'=>'property_name'),
            array('text'=>'Number Bed','value'=>'number_bed'),
            array('text'=>'rateLowSeason','value'=>'rateLowSeason'),
            array('text'=>'rateHightSeason','value'=>'rateHightSeason'),
            array('text'=>'ratePeakSeason','value'=>'ratePeakSeason'))),
            'properties'=>collect(\App\Property::select('id','property_name')->get())
        ];
            
    }

    
}
