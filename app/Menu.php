<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
 protected $fillable=['title','type','descrption','status','image','user_id'];

 public function user(){
 	return $this->belongsTo('App\User');
 }
}
