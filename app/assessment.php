<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\indicator;
class assessment extends Model
{
    protected $table = 'question_name';
    protected $guarded = [];


    public function indicator()
    {
        return $this->belongsTo(indicator::class,'Indicator_id','id');
    }
    

}
