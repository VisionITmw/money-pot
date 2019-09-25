<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function getNameAttribute()
    {
        return ucfirst($this->firstname).' '.ucfirst($this->surname);
    }

}
