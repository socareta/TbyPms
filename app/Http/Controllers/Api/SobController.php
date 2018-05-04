<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\SobResource;
use App\Http\Resources\SobCollection;
use App\Sob;

class SobController extends Controller
{
    
    public function index()
    {
        return new SobCollection(Sob::all());
    }

   
    public function store(Request $request)
    {
        $dataSob= new Sob;
        $dataSob->sob_name=$request->data[1];
        $dataSob->sob_website=$request->data[2];
        if(isset($request->data[3])){$dataSob->sob_contact_person=$request->data[3];}
        if(isset($request->data[4])){$dataSob->sob_phone=$request->data[4];}
        if(isset($request->data[5])){$dataSob->sob_email=$request->data[5];}
        if(isset($request->data[6])){$dataSob->cs_email=$request->data[6];}
        if(isset($request->data[7])){$dataSob->cs_phone=$request->data[7];}
        if(isset($request->data[8])){$dataSob->remark=$request->data[8];}

        $dataSob->save();
        return new SobResource(Sob::find($dataSob));
    }
    public function show($id)
    {
        return new SobResource(Sob::find($id));
    }

    public function update(Request $request, $id)
    {
        $dataSob=Sob::find($id);
        if($dataSob){
            $dataSob->sob_name=$request->data[1];
            $dataSob->sob_website=$request->data[2];
            $dataSob->sob_contact_person=$request->data[3];
            $dataSob->sob_phone=$request->data[4];
            $dataSob->sob_email=$request->data[5];
            $dataSob->cs_email=$request->data[6];
            $dataSob->cs_phone=$request->data[7];
            $dataSob->remark=$request->data[8];
            $dataSob->save();
            return new SobResource($dataSob);
        }
        
    }

    
    public function destroy($id)
    {
        $sob=Sob::find($id);
        if($sob!=null)
        {
            $sob->delete();
            return new SobResource($sob);
        }
        return response()->json(array());
    }
}
