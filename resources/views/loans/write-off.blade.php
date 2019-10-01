@extends('sys')


@section('title')
    <title>Money Pot | Write Off</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-coins"></i>&nbsp;Write Off
        </h4>

        <div class="sec-container grid">
            <div class="row">

                <div class="cell-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="mif mif-coins"></i>&nbsp;Loan Details
                        </div>
                        <div class="card-content p-2">
                            <table class="table striped table-border">
                                <tbody>
                                <tr>
                                    <td>Client</td>
                                    <td>{{$loan->client->name}}</td>
                                </tr><!-- ./ row -->
                                <tr>
                                    <td>Amount</td>
                                    <td>{{$loan->amount}}</td>
                                </tr><!-- ./ row -->

                                <tr>
                                    <td>Repayable</td>
                                    <td>{{$loan->repayable}}</td>
                                </tr><!-- ./ row -->
                                <tr>
                                    <td>Date</td>
                                    <td>{{$loan->date->calendar()}}</td>
                                </tr><!-- ./ row -->
                                <tr>
                                    <td>Due</td>
                                    <td>{{$loan->due}}</td>
                                </tr><!-- ./ row -->
                                <tr>
                                    <td>Interest</td>
                                    <td>{{$loan->interest}}&nbsp;%</td>
                                </tr><!-- ./ row -->

                                </tbody>
                            </table>
                        </div>

                    </div><!-- ./details -->
                    <div class="card win-shadow">
                        <div class="card-content p-2">
                            <form action="{{route('write-offs.store')}}" method="POST" class="form" id="loan-form">
                                @csrf
                                <input type="hidden" name="loan_id" value="{{$loan->id}}">
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <textarea name="reason" value="{{old('reason')}}"
                                              class="{{$errors->has('reason') ? 'invalid' : ''}}"
                                              rows="5">{{old('reason') ? old('reason'): 'Loan Default'}}</textarea>
                                    <small class="invalid_feedback">
                                        {{$errors->first('reason')}}
                                    </small>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button onclick="document.getElementById('loan-form').submit()" class="button  bg-red fg-white">
                                <i class="mif mif-warning"></i>&nbsp;Write Off
                            </button>
                            <a href="{{route('loans.show',$loan->id)}}" class="button dark">
                                <i class="mif mif-undo"></i>&nbsp;Cancel
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@stop
