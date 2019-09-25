<?php

namespace App\Http\Controllers;

use App\Scheme;
use Illuminate\Http\Request;

class SchemeController extends Controller
{

    public function index()
    {
        return view('schemes.index')->with(['schemes'=>Scheme::all()]);
    }

    public function create()
    {
        return view('schemes.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>"required|string|min:5|unique:schemes,name",
            'duration'=>"required|numeric",
            'interest'=>"required|numeric",
        ]);

        Scheme::create($request->all());
        \Session::flash('success-notification',"Payment Scheme added successfully!");
        return redirect()->route('schemes.index');
    }

    public function show(Scheme $scheme)
    {
        return view('schemes.show')->with(['scheme'=>$scheme]);
    }

    public function edit(Scheme $scheme)
    {
        return view('schemes.edit')->with(['scheme'=>$scheme]);
    }

    public function update(Request $request, Scheme $scheme)
    {
        $this->validate($request,[
            'name'=>"required|string|min:5",
            'duration'=>"required|numeric",
            'interest'=>"required|numeric",
        ]);

        //if name has changed - check its uniqueness
        if($request->input('name') != $scheme->name){
            $this->validate($request,[
                'name'=>"unique:schemes.name"
            ]);
        }

       $scheme->update($request->all());
        \Session::flash('success-notification',"Payment Scheme was updated successfully!");
        return redirect()->route('schemes.index');
    }

    public function destroy(Scheme $scheme)
    {
        try{
            $scheme->delete();
            \Session::flash('success-notification',"The scheme has been deleted!");
        }
        catch(\Exception $exception){
            \Session::flash('error-notification',"THe scheme could not be deleted!");
        }

        return redirect()->route('schemes.index');

    }
}
