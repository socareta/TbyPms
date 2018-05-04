<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\PropertyResource;
use App\Http\Resources\PropertyCollection;
Use App\Property;

class PropertyController extends Controller
{
   
    public function index()
    {
        return new PropertyCollection(Property::all());
    }

    
    public function store(Request $request)
    {   //return $request->data;
        $dataProperty= new Property;
        $dataProperty->property_name=$request->data[1];
            if(isset($request->data[2])){$dataProperty->property_address=$request->data[2];}
            if(isset($request->data[3])){$dataProperty->property_phone=$request->data[3];}
            if(isset($request->data[4])){$dataProperty->reservation_email=$request->data[4];}
            if(isset($request->data[5])){$dataProperty->sales_person=$request->data[5];}
            if(isset($request->data[6])){$dataProperty->sales_contact=$request->data[6];}
            if(isset($request->data[7])){$dataProperty->sales_email=$request->data[7];}
            if(isset($request->data[8])){$dataProperty->website=$request->data[8];}
            if(isset($request->data[9])){$dataProperty->bank_name=$request->data[9];}
            if(isset($request->data[10])){$dataProperty->bank_account=$request->data[10];}
            if(isset($request->data[11])){$dataProperty->account_name=$request->data[11];}
            if(isset($request->data[12])){$dataProperty->remark=$request->data[12];}

        $dataProperty->save();
        return new PropertyResource($dataProperty);
    }

    public function show($id)
    {
        return new PropertyResource(Property::find($id));
    }

    public function update(Request $request, $id)
    {
        $dataProperty=Property::find($id);
        

        if($dataProperty){
            $dataProperty->property_name=$request->data[1];
            $dataProperty->property_address=$request->data[2];
            $dataProperty->property_phone=$request->data[3];
            $dataProperty->reservation_email=$request->data[4];
            $dataProperty->sales_person=$request->data[5];
            $dataProperty->sales_contact=$request->data[6];
            $dataProperty->sales_email=$request->data[7];
            $dataProperty->website=$request->data[8];
            $dataProperty->bank_name=$request->data[9];
            $dataProperty->bank_account=$request->data[10];
            $dataProperty->account_name=$request->data[11];
            $dataProperty->remark=$request->data[12];
            $dataProperty->save();
            return new PropertyResource($dataProperty);
        }
        
    }

    
    public function destroy($id)
    {
        $pro=Property::find($id);
        if($pro!=null)
        {
            $pro->delete();
            return new PropertyResource($pro);
        }
        return response()->json(array());
    }
}
