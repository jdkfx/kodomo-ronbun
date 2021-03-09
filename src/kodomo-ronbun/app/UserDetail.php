<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = ['user_id','display_name','status','birthday','profile_image','profile_text'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
