<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'report_id', 'message'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function report()
    {
        return $this->belongsTo('App\Report');
    }
}
