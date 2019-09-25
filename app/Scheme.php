<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    protected $guarded = [];

    public function getInfoAttribute()
    {
        return $this->name.'('.$this->interest.'%)';
    }

    public function getRateAttribute()
    {
        return floor(($this->interest + 100 ) / 100);
    }
}
