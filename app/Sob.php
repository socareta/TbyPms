<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sob extends Model
{
    protected $fillable=['sob_name'
            ,'sob_website'
            ,'sob_contact_person'
            ,'sob_phone'
            ,'sob_email'
            ,'cs_email'
            ,'cs_phone'
            ,'remark'
    ];
}
