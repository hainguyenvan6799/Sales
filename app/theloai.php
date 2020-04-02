<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    //
    protected $table = "theloai";
    public function loaisanpham(){
    	return $this->hasMany('App\loaisanpham', 'id_theloai', 'id');
    }
    public function sanpham(){
    	return $this->hasManyThrough('App\sanpham', 'App\loaisanpham', 'id_theloai', 'id_loaisanpham', 'id');
    }
}
