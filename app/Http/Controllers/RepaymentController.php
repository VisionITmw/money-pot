<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Repayment;
use Illuminate\Http\Request;

class RepaymentController extends Controller
{
    public function index()
    {
        return view('repayments.index')->with(['repayments'=>Repayment::all()]);
    }

    public function create(Loan $loan)
    {
        return view('loans.repay')->with([
            'loan' => $loan
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'loan_id' => 'required|numeric|exists:loans,id',
            'amount' => 'required|numeric',
            'details' => 'required|string'
        ]);

        $repayment = Repayment::create($request->all());

        $repayment->loan->repaid = True;
        $repayment->loan->save();

        \Session::flash('success-notification', "Loan has been repaid!");
        return redirect()->route('loans.show', $repayment->loan->id);
    }


    public function destroy(Repayment $repayment)
    {
        //
    }
}
