<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        return view('clients.index')->with(['clients'=>Client::all()]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>"required|string|min:2",
            'surname'=>"required|string|min:2",
            'email'=>"email",
            'phone'=>"required|string|min:9|max:9|unique:clients,phone",
        ]);

        Client::create($request->all());
        \Session::flash('success-notification',"Client has been added successfully!");
        return redirect()->route('clients.index');
    }


    public function show(Client $client)
    {
        return view('clients.show')->with(['client'=>$client]);
    }


    public function edit(Client $client)
    {
        return view('clients.edit')->with(['client'=>$client]);
    }

    public function update(Request $request, Client $client)
    {
        $this->validate($request,[
            'firstname'=>"required|string|min:2",
            'surname'=>"required|string|min:2",
            'email'=>"email",
            'phone'=>"required|string|min:9|max:9",
        ]);

        //check if phone has changed
        if($request->input('phone') != $client->phone){
            $this->validate($request,[
               'phone'=>"unique:clients,phone"
            ]);
        }

        $client->update($request->all());
        \Session::flash('success-notification',"Client has been updated successfully!");
        return redirect()->route('clients.index');

    }

    public function destroy(Client $client)
    {
        try{
            $client->delete();
            \Session::flash('success-notification',"Client has beedn deleted!");
        }
        catch(\Exception $exception){
            \Session::flash('error-notification',"Failed to delete client");
        }

        return redirect()->route('clients.index');
    }
}
