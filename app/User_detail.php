<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_detail extends Model
{
    protected $fillable = ['user_id','display_name','email','status','birthday','profile_image','profile_text'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
