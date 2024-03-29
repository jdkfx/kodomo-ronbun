<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['title','user_id'];

    public function report_detail(){
        return $this->hasOne('App\ReportDetail');
    }

    public function report_text(){
        return $this->hasOne('App\ReportText');
    }

    public function report_abstract(){
        return $this->hasOne('App\ReportAbstract');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
