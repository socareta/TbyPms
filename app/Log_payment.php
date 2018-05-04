<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log_payment extends Model
{
    public $timestamps = true;
    protected $fillable=[ 'reservation_id'
                            ,'property_id'
                            ,'payment_type'
                            ,'payment_method'
                            ,'bank_name'
                            ,'amount'
                            ,'balance'
                            ,'cod_balance'
                            ,'remark'
    ];

    public function reservation(){
    	return $this->belongsTo('App\reservation');
    }
}
