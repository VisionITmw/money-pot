<?php

namespace App\Http\Controllers;

use App\Client;
use App\Loan;
use App\Scheme;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{

    public function index()
    {
        return view('loans.index')->with(['loans'=>Loan::all()]);
    }

    public function create()
    {
        return view('loans.create')->with([
            'clients'=>Client::all(),
            'schemes'=>Scheme::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'amount'=>"required|numeric",
            'client'=>"required|numeric|exists:clients,id",
            'scheme'=>"required|numeric|exists:schemes,id",
            'date'=>"required|date",
        ]);


        $scheme = Scheme::findOrFail(request('scheme')); //

        $data = [
            'scheme_id'=>request('scheme'),
            'client_id'=>request('client'),
            'date'=>request('date'),
            'due'=>Carbon::parse(request('date'))->addDays($scheme->duration), // calc days payable
            'amount'=>request('amount'),
            'interest'=>$scheme->interest
        ];

        Loan::create($data);

        \Session::flash('success-notification',"Loan entry has been added");

        return redirect()->route('loans.index');
    }

    public function show(Loan $loan)
    {
        return view('loans.show')->with(['loan'=>$loan]);
    }

    public function edit(Loan $loan)
    {
        return view('loans.edit')->with([
            'loan'=>$loan,
            'clients'=>Client::all(),
            'schemes'=>Scheme::all()
        ]);
    }


    public function update(Request $request, Loan $loan)
    {
        $this->validate($request,[
            'amount'=>"required|numeric",
            'client'=>"required|numeric|exists:clients,id",
            'scheme'=>"required|numeric|exists:schemes,id",
            'date'=>"required|date",
        ]);


        $scheme = Scheme::findOrFail(request('scheme')); //

        $data = [
            'scheme_id'=>request('scheme'),
            'client_id'=>request('client'),
            'date'=>request('date'),
            'due'=>Carbon::parse(request('date'))->addDays($scheme->duration), // calc days payable
            'amount'=>request('amount'),
            'interest'=>$scheme->interest
        ];

        $loan->update($data);

        \Session::flash('success-notification',"Loan entry has been updated");

        return redirect()->route('loans.show',$loan->id);
    }

    public function destroy(Loan $loan)
    {
        try{
            $loan->delete();
            \Session::flash('success-notification',"Loan entry has been trashed");
        }
        catch(\Exception $exception){
            \Session::flash('error-notification',"Failed to delete loan entry");
        }

        return redirect()->route('loans.index');
    }

    public function repayments(Loan $loan)
    {
        return view('loans.repayments')->with([
            'loan'=>$loan
        ]);
    }
}
