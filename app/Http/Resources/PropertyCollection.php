<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection,
            'header'=>collect(array(array('text'=>'property_name','value'=>'property_name'),
            array('text'=>'website','value'=>'website'),
            array('text'=>'reservation_email','value'=>'reservation_email'),
            array('text'=>'sales_person','value'=>'sales_person'),
            array('text'=>'sales_contact','value'=>'sales_contact'),
            array('text'=>'sales_email','value'=>'sales_email')))
        ];
    }
}
