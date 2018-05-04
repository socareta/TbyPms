<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable=[ 'property_name'
            ,'property_address'
            ,'property_phone'
            ,'reservation_email'
            ,'sales_person'
            ,'sales_contact'
            ,'sales_email'
            ,'website'
            ,'bank_name'
            ,'bank_account'
            ,'account_name'
            ,'remark'
        ];
    public function room(){
        return $this->hasMany('App\Room');
    }
}
