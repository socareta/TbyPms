<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\ReservationResource;
use App\Room;
use App\Sob;

class ResCollection extends ResourceCollection
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
            'header'=>collect(array(array('text'=>'guest_name','value'=>'guest_name'),
            array('text'=>'check_in','value'=>'check_in'),
            array('text'=>'check_out','value'=>'check_out'),
            array('text'=>'rate_usd','value'=>'rate_usd'),
            array('text'=>'Villa name','value'=>'Villa name'),
            array('text'=>'room_name','value'=>'room_name'),
            array('text'=>'sob_name','value'=>'sob_name'))),
            'rooms'=>collect(Room::leftJoin('properties','properties.id','rooms.property_id')
                                    ->select('rooms.id','rooms.room_name','properties.property_name')
                                    ->get()),
            'sobs'=>collect(Sob::select('id','sob_name')->get())

        ];
    }
}
