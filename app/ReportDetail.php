<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    protected $fillable = ['report_id','category_id','thumbnail'];

    public function report(){
        return $this->belongsTo('App\Report');
    }
}
