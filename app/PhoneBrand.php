<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneBrand extends Model
{
    //Comment Testing
    protected $primaryKey = 'brand_id';

    public function phones(){
        return $this->hasMany('App\Phone','id');
    }
}
