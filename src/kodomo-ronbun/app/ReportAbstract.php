<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAbstract extends Model
{
    protected $fillable = ['report_id','contents_abstract'];

    public function report(){
        return $this->belongsTo('App\Report');
    }
}
