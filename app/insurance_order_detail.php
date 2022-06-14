<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\assessment;
class insurance_order_detail extends Model
{
    protected $table = 'insurance_order_detail';
    protected $guarded = [];

    public function question()
    {
        return $this->hasOne(assessment::class,'id','question_id');
    }
}
