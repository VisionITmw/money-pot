<?php

namespace App\Http\Controllers;

use App\Client;
use App\Loan;
use App\Repayment;
use Illuminate\Http\Request;

class SysController extends Controller
{
    public function index()
    {

        $data = [
            'clients' => [
                'metric' => Client::all()->count(),
                'increase' => '--'
            ],
            'loans' => [
                'metric' => Loan::all()->count(),
                'increase' => '--'
            ],
            'overdue' =>[
                'metric'=>10,
                'increase'=>'-'
            ],
            'repayments' =>[
                'metric'=>number_format(collect(Repayment::all())->sum('amount'),2),
                'increase'=>'--'
            ]
        ];
        return view('dashboard')->with(['data'=>$data]);
    }
}
