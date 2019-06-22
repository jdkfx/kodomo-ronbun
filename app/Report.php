<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['title','user_id'];

    public function report_text(){
        return $this->hasOne('App\ReportText');
    }

    public function report_abstract(){
        return $this->hasOne('App\ReportAbstract');
    }
}
