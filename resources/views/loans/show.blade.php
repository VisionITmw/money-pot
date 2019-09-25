@extends('sys')


@section('title')
    <title>Money Pot | Loan Info</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-coins"></i>&nbsp;Loan Information
        </h4>

        <div class="scheme-details grid">
            <div class="row">
                <div class="cell-lg-3">
                    <div class="card">
                        <div class="card-header p-1 bg-darkCyan fg-white">
                            <i class="mif mif-user"></i>&nbsp;Client
                        </div>
                        <img src="{{asset('img/avatar.png')}}" class="w-100" alt="avatar image">
                        <div class="card-header bg-darkCyan fg-white">
                            <strong>{{$loan->client->name}}</strong>
                        </div>
                        <div class="card-content p-2 bd-default border-bottom">
                            <div>
                                <strong>{{$loan->client->email ? $loan->client->email : "<Not Available>"}} </strong>
                                <small class="place-right">
                                    <i class="mif mif-envelop"></i>
                                </small>
                            </div>

                            <div>
                                <strong> {{$loan->client->phone}} %</strong>
                                <small class="place-right">
                                    <i class="mif mif-phone"></i>
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('clients.show',$loan->client->id)}}" class="button primary fg-white">
                                <i class="mif mif-info"></i>&nbsp;Profile
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cell-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <i class="mif mif-coins"></i>&nbsp;Loan Details
                        </div>
                        <div class="card-content p-2">
                            <table class="table striped table-border">
                                <tbody>
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
                                    <td>{{$loan->date}}</td>
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

                    <div class="card">
                        <div class="card-header">
                            <i class="mif mif-info"></i>&nbsp;Addition Details
                        </div>
                        @if($loan->details)
                            <div class="card-content p-2">
                                {{$loan->details}}
                            </div>
                        @else
                            <div class="card-content p-5 bg-light text-center">
                                Not Available
                            </div>
                        @endif

                    </div><!-- ./controls -->

                        <div class="card">
                            <div class="card-content p-2 ">
                                <button class="button primary">
                                    <i class="mif mif-pencil"></i>&nbsp;Update
                                </button>
                                <button class="button bg-red fg-white">
                                    <i class="mif mif-bin"></i>&nbsp;Write Off
                                </button>
                                <button class="button bg-red fg-white">
                                    <i class="mif mif-checkmark"></i>&nbsp;Mark as Repaid
                                </button>
                                <button class="button bg-red fg-white">
                                    <i class="mif mif-bell"></i>&nbsp;Send Reminder
                                </button>

                                <div class="place-right">
                                    <a href="{{route('loans.index')}}" class="button dark fg-white">
                                        <i class="mif mif-backspace"></i>&nbsp;Back
                                    </a>
                                </div>
                            </div>

                        </div><!-- ./controls -->


                </div>
            </div>

        </div>
    </div>

@stop
