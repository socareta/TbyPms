<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SobResource extends Resource
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
            ,'sob_name'=>$this->sob_name
            ,'sob_website'=>$this->sob_website
            ,'sob_contact_person'=>$this->sob_contact_person
            ,'sob_phone'=>$this->sob_phone
            ,'sob_email'=>$this->sob_email
            ,'cs_email'=>$this->cs_email
            ,'cs_phone'=>$this->cs_phone
            ,'remark'=>$this->remark
        ];
        }
    }
}
