<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\ReservationResource;
use App\Http\Resources\ResCollection;
use App\Reservation;
use App\Log_payment;
use App\Res_room;
class FolioController extends Controller
{
    
    public function index()
    {
        $data=Reservation::leftJoin('rooms','Reservations.room_id','rooms.id')
                        ->leftJoin('sobs','Reservations.sob_id','sobs.id')
                        ->leftJoin('properties','rooms.property_id','properties.id')
                        ->select('Reservations.*','rooms.room_name','sobs.sob_name','properties.property_name')
                        ->where('Reservations.status','registered')
                        ->orWhere('Reservations.status','canceled')
                        ->orderBy('Reservations.check_in','DESC')
                        ->get();
        return new ResCollection($data);
    }
}
