<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evalution extends Model
{
    protected $table = 'evalution';
    protected $guarded = [];

    public function indicator()
    {
        return $this->hasMany(indicator::class,'evalution_id','evalution_id');
    }
}
