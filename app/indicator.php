<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\evalution;
use App\assessment;
class indicator extends Model
{
    protected $table = 'indicator';
    protected $guarded = [];


    public function evaluation()
    {
        return $this->belongsTo(evalution::class,'evalution_id','evalution_id');
    }
    public function assessment()
    {
        return $this->belongsTo(assessment::class,'id','Indicator_id');
    }
}
