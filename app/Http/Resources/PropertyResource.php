<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PropertyResource extends Resource
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
        return ['key'=>$this->id
            ,'property_name'=>$this->property_name
            ,'property_address'=>$this->property_address
            ,'property_phone'=>$this->property_phone
            ,'reservation_email'=>$this->reservation_email
            ,'sales_person'=>$this->sales_person
            ,'sales_contact'=>$this->sales_contact
            ,'sales_email'=>$this->sales_email
            ,'website'=>$this->website
            ,'bank_name'=>$this->bank_name
            ,'bank_account'=>$this->bank_account
            ,'currency'=>$this->currency
            ,'remark'=>$this->remark
        ];
        }

    }
}

            
            
            
            
            
            
            
            
            
            
            