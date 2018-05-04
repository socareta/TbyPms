<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SobCollection extends ResourceCollection
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
                'header'=>collect(array(array('text'=>'sob_name','value'=>'sob_name'),
            array('text'=>'sob_contact_person','value'=>'sob_contact_person'),
            array('text'=>'sob_email','value'=>'sob_email'),
            array('text'=>'cs_email','value'=>'sob_email'),
            array('text'=>'cs_phone','value'=>'cs_phone'),
            array('text'=>'sob_website','value'=>'sob_website')))
        ];
    }
}
