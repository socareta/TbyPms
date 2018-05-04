<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['data'=>$this->collection,
                'header'=>collect(array(array('text'=>'Reservation','value'=>'Reservation'),
                                        array('text'=>'property','value'=>'Property'),
                                        array('text'=>'payment_type','value'=>'payment_type'),
                                        array('text'=>'payment_method','value'=>'Payment Method'),
                                        array('text'=>'amount','value'=>'amount'),
                                        array('text'=>'balance','value'=>'balance'),
                                        array('text'=>'remark','value'=>'remark'))),
                'reservations'=>collect(\App\Reservation::select('id','guest_name','rate_contract')->orderBy('check_in','DESC')->get()),
                'properties'=>collect(\App\Property::select('id','property_name','bank_name','bank_account','account_name')->get())
        ];
    }
}
