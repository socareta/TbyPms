<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\RoomResource;
use App\Http\Resources\RoomCollection;
use App\Room;
use Illuminate\Support\Facades\Crypt;

class RoomController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    public function index()
    {
        //Room::with('property')->get()
        $data=Room::leftJoin('properties','properties.id','rooms.property_id')
                    ->select('rooms.*','properties.property_name')
                    ->get();
        return new RoomCollection($data);
    }

    public function store(Request $request)
    {
        $dataForm= new Room;
            $dataForm->property_id=$request->data[1];
            $dataForm->room_name=$request->data[2];
            $dataForm->room_description=$request->data[3];
            $dataForm->room_size=$request->data[4];
            $dataForm->number_bed= $request->data[5];
            $dataForm->max_adult= $request->data[6];
            $dataForm->max_extra_person= $request->data[7];
            $dataForm->extrabed_charge= $request->data[8];
            $dataForm->bed_config= $request->data[9];
            $dataForm->typeOfRoom= $request->data[10];
            $dataForm->rateLowSeason= $request->data[11];
            $dataForm->rateHightSeason= $request->data[12];
            $dataForm->ratePeakSeason= $request->data[13];
            $dataForm->rate_remark= $request->data[14];
       $dataForm->save();
        return new RoomResource(Room::find($dataForm));
    }

    public function show($id)
    {
        return new RoomResource(Room::find($id));
    }

    public function update(Request $request, $id)
    {
        $dataForm=Room::find($id);
            
        if($dataForm){
            $dataForm->room_name=$request->data[2];
            $dataForm->property_id=$request->data[1];
            $dataForm->room_description=$request->data[3];
            $dataForm->room_size=$request->data[4];
            $dataForm->number_bed= $request->data[5];
            $dataForm->max_adult= $request->data[6];
            $dataForm->max_extra_person= $request->data[7];
            $dataForm->extrabed_charge= $request->data[8];
            $dataForm->bed_config= $request->data[9];
            $dataForm->typeOfRoom= $request->data[10];
            $dataForm->rateLowSeason= $request->data[11];
            $dataForm->rateHightSeason= $request->data[12];
            $dataForm->ratePeakSeason= $request->data[13];
            $dataForm->rate_remark= $request->data[14];

            $dataForm->save();
            return new RoomResource($dataForm);
        }
        
    }

    public function destroy($id)
    {
        $room=Room::find($id);
        if($room!=null)
        {
            $room->delete();
            return new RoomResource($room);
        }
        return response()->json(array());
        
    }
}
