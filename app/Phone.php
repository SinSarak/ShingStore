<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';
    public $primaryKey = 'id';

    public  function photos(){
        return $this->hasMany('App\Photo','phone_id');
    }
    public function brand(){
        return $this->belongsTo('App\PhoneBrand','brand_id');
    }

    public function spec(){
        return $this->hasOne('App\Specifications','phone_id');
    }
}
