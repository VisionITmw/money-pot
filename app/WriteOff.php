<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WriteOff extends Model
{
    protected  $guarded = [];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
