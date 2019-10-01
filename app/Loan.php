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

    public function writeOff()
    {
        return $this->hasOne(WriteOff::class);
    }

    public function repayments()
    {
        return $this->hasMany(Repayment::class);
    }

    public function fullyPaid()
    {
        return (($this->repaid && $this->writeOff) || $this->fullyRepaid());
    }

    public function getBalanceAttribute()
    {
        return str_replace(',','',$this->repayable)-collect($this->repayments)->sum('amount');
    }

    public function getDueAttribute($due)
    {
        return Carbon::parse($due)->calendar();
    }
    public function getDateAttribute($date)
    {
        return Carbon::parse($date);
    }

    public function getRepayableAttribute()
    {
        return number_format((($this->interest+100)/100)*$this->amount,2);
    }

    public function fullyRepaid()
    {
        return collect($this->repayments)->sum('amount') >= str_replace(',','',$this->repayable);
    }


}
