<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\ResRoomResource;
use App\Res_room;

class ResRoomController extends Controller
{
    
    public function index()
    {
        return ResRoomResource::collection(Res_room::all());
    }

    public function store(Request $request)
    {
        $id=Res_room::insertGetId($request->all());
        return new ResRoomResource(Res_room::find($id));
    }

    
    public function show($id)
    {
        return new ResRoomResource(Res_room::find($id));
    }

    public function update(Request $request, $id)
    {
        $rr=Res_room::find($id);
        if($rr){
            $rr->update($request->all());
            return new ResRoomResource($rr);
        }
    }

   
    public function destroy($id)
    {
        $rr=Res_room::find($id);
        if($rr){
            $rr->delete();
            return new ResRoomResource($rr);
        }
    }
}
