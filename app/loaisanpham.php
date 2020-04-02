<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    //
    protected $table = "loaisanpham";
    public function sanpham(){
    	return $this->hasMany('App\sanpham', 'id_loaisanpham', 'id');
    }
    public function theloai(){
    	return $this->belongsTo('App\theloai', 'id_theloai', 'id');
    }
}
