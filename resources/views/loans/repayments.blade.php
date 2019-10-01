@extends('sys')


@section('title')
    <title>Money Pot | Loan Repayments</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-money"></i>&nbsp;Loan Repayments
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
                                <strong> {{$loan->client->phone}} </strong>
                                <small class="place-right">
                                    <i class="mif mif-phone"></i>
                                </small>
                            </div>
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
                </div>
                <div class="cell-lg-9">

                    <div class="card ">
                        <div class="card-header py-2">
                            <strong>Repayments </strong>
                        </div>
                        <div class="card-content p-2">
                            <p>
                                Balance : <strong>{{number_format($loan->balance,2)}}</strong>
                            </p>
                            <table class="table striped table-border" data-role="table"
                                   data-show-search="false"
                                   data-show-table-info="false"
                                   data-show-rows-steps="false"
                                   data-show-pagination="false">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>
                                        <i class="mif mif-calendar"></i>&nbsp;Date
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loan->repayments as $repayment)
                                    <tr>
                                        <td>{{number_format($repayment->amount,2)}}</td>
                                        <td>{{$repayment->created_at}} </td>
                                    </tr><!-- ./ row -->
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content p-2 ">
                            <div class="">
                                <a href="{{route('loans.show',$loan->id)}}" class="button dark fg-white ">
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
