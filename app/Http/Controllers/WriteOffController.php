<?php

namespace App\Http\Controllers;

use App\Loan;
use App\WriteOff;
use Illuminate\Http\Request;

class WriteOffController extends Controller
{


    public function create(Loan $loan)
    {
        return view('loans.write-off')->with([
            'loan' => $loan
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'loan_id' => 'required|numeric|exists:loans,id',
            'reason' => 'required|string'
        ]);

        $writeoff = WriteOff::create($request->all());

        $writeoff->loan->repaid = True;
        $writeoff->loan->save();

        \Session::flash('success-notification', "Loan has been written off!");
        return redirect()->route('loans.show', $writeoff->loan->id);

    }

}
