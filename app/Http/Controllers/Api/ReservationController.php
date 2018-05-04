<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationResource;
use App\Http\Resources\ResCollection;
use App\Reservation;
use App\Log_payment;
use App\Res_room;
class ReservationController extends Controller
{
    
    public function index()
    {   
        $data=Reservation::leftJoin('rooms','Reservations.room_id','rooms.id')
                        ->leftJoin('sobs','Reservations.sob_id','sobs.id')
                        ->leftJoin('properties','rooms.property_id','properties.id')
                        ->select('Reservations.*','rooms.room_name','sobs.sob_name','properties.property_name')
                        ->where('Reservations.status','confirmed')
                        ->orderBy('Reservations.check_in','ASC')
                        ->get();
        return new ResCollection($data);
    }

    
    public function store(Request $request)
    {
        $newRes=new Reservation;
            $newRes->room_id=$request->data[1];
            $newRes->sob_id=$request->data[2];
            $newRes->guest_name=$request->data[3];
            $newRes->country=$request->data[4];
            $newRes->email=$request->data[5];
            $newRes->status=$request->data[6];
            $newRes->check_in=$request->data[7];
            $newRes->check_out=$request->data[8];
            $newRes->los=$request->data[9];
            $newRes->rate_usd=$request->data[10];
            $newRes->rate_idr=$request->data[11];
            $newRes->rate_contract=$request->data[12];
            $newRes->remark=$request->data[13];

        $newRes->save();
        return new ReservationResource($newRes);
    }

   
    public function show($id)
    {
        return new ReservationResource(Reservation::find($id));
    }

    
    public function update(Request $request, $id)
    {
        $newRes=Reservation::find($id);
            

        if($newRes){
            $newRes->room_id=$request->data[1];
            $newRes->sob_id=$request->data[2];
            $newRes->guest_name=$request->data[3];
            $newRes->country=$request->data[4];
            $newRes->email=$request->data[5];
            $newRes->status=$request->data[6];
            $newRes->check_in=$request->data[7];
            $newRes->check_out=$request->data[8];
            $newRes->los=$request->data[9];
            $newRes->rate_usd=$request->data[10];
            $newRes->rate_idr=$request->data[11];
            $newRes->rate_contract=$request->data[12];
            $newRes->remark=$request->data[13];
            $newRes->save();
            return new ReservationResource($newRes);
        }
        
    }

    public function destroy($id)
    {
        $res=Reservation::find($id);
        if($res!=null)
        {
            $res->delete();
            return new ReservationResource($res);
        }
        return response()->json(array());
    }
}
