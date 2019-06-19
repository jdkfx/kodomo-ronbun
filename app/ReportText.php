<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportText extends Model
{
    protected $fillable = ['report_id','contents_text'];

    public function report(){
        return $this->belongsTo('App\Report');
    }
}
