<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    protected $guarded = ['repaid'];


    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }

    public function getDueAttribute($due)
    {
        return Carbon::parse($due)->calendar();
    }
    public function getDateAttribute($due)
    {
        return Carbon::parse($due)->calendar();
    }

    public function getRepayableAttribute()
    {
        return number_format((($this->interest+100)/100)*$this->amount,2);
    }

}
