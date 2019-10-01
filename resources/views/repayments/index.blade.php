@extends('sys')


@section('title')
    <title>Money Pot | Repayments</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-coints"></i>&nbsp;Repayments
        </h4>

        <div class="loans-table grid">
            <div class="row">
                <div class="cell-sm-full cell-md-12 cell-lg-8 cell-xl-8">
                    <div class="card win-shadow">
                        <div class="card-header ">
                            Repayments
                        </div>
                        <div class="card-content p-2">
                            <table class="table striped table-border" data-role="table"
                                   data-show-search="true"
                                   data-show-table-info="false"
                                   data-show-rows-steps="false"
                                   data-show-pagination="true">
                                <thead>
                                <tr>
                                    <th>
                                        <i class="mif mif-user"></i>&nbsp;Client
                                    </th>
                                    <th>
                                        <i class="mif mif-money"></i>&nbsp;Amount
                                    </th>
                                    <th>
                                        <i class="mif mif-coins"></i>&nbsp;Loan #
                                    </th>
                                    <th>
                                        <i class="mif mif-wrench"></i>&nbsp;Tools
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($repayments as $repayment)
                                    <tr>
                                        <td>{{$repayment->loan->client->name}}</td>
                                        <td>{{$repayment->amount}}</td>
                                        <td>{{$repayment->loan->id}}</td>
                                        <td>
                                            <a href="{{route('loans.show',$repayment->id)}}" class="button fg-white small primary">
                                                <i class="mif mif-info"></i>&nbsp;More Info
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><!-- ./ loans-->
            </div>
        </div>

    </div>

    @include('partials.delete-confirmation')
@stop


@section('scripts')
    <script src="{{asset('js/delete-confirmation.js')}}"></script>
@stop

