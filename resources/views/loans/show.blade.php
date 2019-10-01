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


                        </div><!-- ./details -->

                    </div>
                    @if($loan->writeOff)
                        <div class="card ">
                            <div class="card-header py-2">
                                <strong>Loan has been written off </strong>
                            </div>
                            <div class="card-content p-2">
                                {{$loan->writeOff->reason}}
                            </div>
                        </div>
                    @endif

                    @if(count($loan->repayments)>0)
                        <div class="card ">
                            <div class="card-header py-2">
                                <strong>Repayments </strong>
                            </div>
                            <div class="card-content p-2">
                                <p>
                                    Balance : <strong>{{number_format($loan->balance,2)}}</strong>
                                </p>
                                <hr>
                               @if($loan->fullyRepaid())
                                   <i class="mif mif-checkmark"></i>&nbsp; Full Payment
                               @else

                                    <i class="mif mif-star-half"></i>&nbsp; Partial Payment


                                @endif

                                <span class="place-right">
                                    <a href="{{route('loans.repayments',$loan->id)}}" class="button small primary">Repayments</a>
                                </span>
                            </div>
                        </div>
                    @endif
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
                            @if(!$loan->fullyPaid())
                                <a href="{{route('loans.edit',$loan->id)}}" class="button primary ">
                                    <i class="mif mif-pencil"></i>&nbsp;Update
                                </a>

                                <a href="{{route('write-offs.create',$loan->id)}}" class="button bg-red fg-white ">
                                    <i class="mif mif-bin"></i>&nbsp;Write Off
                                </a>
                                <a href="{{route('repayments.create',$loan->id)}}" class="button bg-red fg-white ">
                                    <i class="mif mif-plus"></i>&nbsp;Repayment
                                </a>

                                <button class="button bg-red fg-white ">
                                    <i class="mif mif-bell"></i>&nbsp;Send Reminder
                                </button>
                                <div class="place-right">
                                    <a href="{{route('loans.index')}}" class="button dark fg-white ">
                                        <i class="mif mif-backspace"></i>&nbsp;Back
                                    </a>
                                </div>
                            @else
                                <small>
                                    Loan has been rapaid/written off
                                </small>
                                <div class="">
                                    <a href="{{route('loans.index')}}" class="button dark fg-white ">
                                        <i class="mif mif-backspace"></i>&nbsp;Back
                                    </a>
                                </div>
                            @endif

                        </div>

                    </div><!-- ./controls -->


                </div>
            </div>

        </div>
    </div>

@stop
