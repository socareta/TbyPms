<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Room;
use App\Sob;
use App\Log_payment;
use App\Res_room;
class ReservationResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    { 

        if($this->resource!=null)
        {
             return ['key'=>$this->id
                ,'room_id'=>collect(Room::find($this->room_id))
                ,'sob_id'=>collect(Sob::find($this->sob_id))
                ,'guest_name'=>$this->guest_name
                ,'country'=>$this->country
                ,'email'=>$this->email
                ,'status'=>$this->status
                ,'check_in'=>$this->check_in
                ,'check_out' =>$this->check_out
                ,'los'=>$this->los
                ,'rate_usd'=>$this->rate_usd
                ,'rate_idr'=>$this->rate_idr
                ,'rate_contract'=>$this->rate_contract
               ,'remark'=>$this->remark
               ,'otherRoom'=>collect(Res_room::leftJoin('rooms as r','res_rooms.room_id','r.id')->where('res_rooms.reservation_id',$this->id)->get())
               ,'logpayment'=>collect(Log_payment::where('reservation_id',$this->id)->get())
            ];
        }
       
    }
}
