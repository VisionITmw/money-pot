@extends('sys')

@section('title')
    <title>Money Pot | New Loan</title>
@stop



@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-coins"></i>&nbsp;New Loan
        </h4>


        <div class="scheme-form-container grid">
            <div class="row">
                <div class="cell-4">
                    <div class="card win-shadow">
                        <div class="card-content p-2">
                            <form action="{{route('loans.store')}}" method="POST" class="form" id="loan-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Client</label>
                                    <select name="client" data-role="select" class="{{$errors->has('client') ? 'invalid' : ''}}">
                                        @foreach($clients as $client)
                                            <option value="{{$client->id}}" {{old('client')==$client->id ? 'selected':''}}>{{$client->name}}</option>
                                        @endforeach
                                    </select>
                                    <small class="invalid_feedback">
                                        {{$errors->first('client')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Scheme Type</label>
                                    <select name="scheme" data-role="select" class="{{$errors->has('scheme') ? 'invalid' : ''}}">
                                        @foreach($schemes as $scheme)
                                            <option value="{{$scheme->id}}" {{old('scheme')==$scheme->id ? 'selected':''}}>{{$scheme->info}}</option>
                                        @endforeach
                                    </select>
                                    <small class="invalid_feedback">
                                        {{$errors->first('scheme')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Amount (MWK)</label>
                                    <input type="number" name="amount" data-role="input" value="{{old('amount')}}" class="{{$errors->has('amount') ? 'invalid' : ''}}" placeholder="Client's firstname">
                                    <small class="invalid_feedback">
                                        {{$errors->first('amount')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Date</label>
                                    <input name="date" data-role="datepicker" value="{{old('date')}}" class="{{$errors->has('date') ? 'invalid' : ''}}" placeholder="Client's firstname">
                                    <small class="invalid_feedback">
                                        {{$errors->first('date')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Addition Details</label>
                                    <textarea name="details" value="{{old('details')}}" class="{{$errors->has('details') ? 'invalid' : ''}}"  rows="5">{{old('details')}}</textarea>
                                    <small class="invalid_feedback">
                                        {{$errors->first('details')}}
                                    </small>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button onclick="document.getElementById('loan-form').submit()" class="button  primary">
                                <i class="mif mif-plus"></i>&nbsp;Save
                            </button>
                            <a href="{{route('loans.index')}}" class="button dark">
                                <i class="mif mif-undo"></i>&nbsp;Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
