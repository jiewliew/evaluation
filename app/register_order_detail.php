<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\assessment;
class register_order_detail extends Model
{
    protected $table = 'register_order_detail';
    protected $guarded = [];

    public function question()
    {
        return $this->hasOne(assessment::class,'id','question_id');
    }
}
