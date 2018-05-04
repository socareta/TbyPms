<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Log_payment;
class PaymentController extends Controller
{
    public function index()
    {  
        $data=Log_payment::leftJoin('reservations','reservations.id','log_payments.reservation_id')
                            ->leftJoin('properties','properties.id','log_payments.property_id')
                            ->select('log_payments.*','reservations.guest_name','properties.property_name')
                            ->orderBy('log_payments.created_at','DESC')
                            ->get();

        return new PaymentCollection($data);
    }

    
    public function store(Request $request)
    {
        $dataPayment= new log_payment;
        $dataPayment->reservation_id=$request->data[1];
        $dataPayment->property_id=$request->data[2];
        $dataPayment->payment_type=$request->data[3];
        $dataPayment->payment_method=$request->data[4];
        $dataPayment->bank_name=$request->data[5];
        $dataPayment->amount=$request->data[6];
        $dataPayment->balance=$request->data[7];
        $dataPayment->cod_balance=$request->data[8];
        $dataPayment->remark=$request->data[9];
        $dataPayment->save();

        return new PaymentResource($dataPayment);
        
    }

    public function update(Request $request, $id)
    {
        $dataPayment= Log_payment::find($id);
        if($dataPayment){
            $dataPayment->reservation_id=$request->data[1];
            $dataPayment->property_id=$request->data[2];
            $dataPayment->payment_type=$request->data[3];
            $dataPayment->payment_method=$request->data[4];
            $dataPayment->bank_name=$request->data[5];
            $dataPayment->amount=$request->data[6];
            $dataPayment->balance=$request->data[7];
            $dataPayment->cod_balance=$request->data[8];
            $dataPayment->remark=$request->data[9];
            $dataPayment->save();
            return new PaymentResource($dataPayment);
        }
        return new PaymentResource(array());

    }

    
    public function destroy($id)
    {
        $pay=Log_payment::findOrFail($id);
        if($pay){
            $pay->delete();
            return "success";
        }
    }
}
