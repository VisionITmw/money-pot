<?php

namespace App\Http\Middleware;

use App\Loan;
use App\Repayment;
use App\Scheme;
use Closure;

class AdminData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \View::share([
            'loan_count'=>Loan::all()->count(),
            'repayments_count'=>Repayment::all()->count(),
            'schemes_count'=>Scheme::all()->count(),
            'penalties_count'=>0,
        ]);
        return $next($request);
    }
}
