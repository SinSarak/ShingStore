<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public $primaryKey = 'id';
    protected $table='photos';

    public function phone(){
        return $this->belongsTo('App\Phone');
    }
}
