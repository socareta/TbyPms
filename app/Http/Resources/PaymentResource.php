<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PaymentResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if($this->resource!=null){
            return ['reservation_id'=>$this->reservation_id
                    ,'property_id'=>$this->property_id
                    ,'payment_type'=>$this->payment_type
                    ,'payment_method'=>$this->payment_method
                    ,'bank_name'=>$this->bank_name
                    ,'amount'=>$this->amount
                    ,'balance'=>$this->balance
                    ,'cod_balance'=>$this->cod_balance
                    ,'remark'=>$this->remark
            ];
        }
        
    }
}
