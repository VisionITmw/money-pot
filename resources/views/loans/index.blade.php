@extends('sys')


@section('title')
    <title>Money Pot | Loans</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-coints"></i>&nbsp;Loans
        </h4>

        <div class="loans-table grid">
            <div class="row">
                <div class="cell-sm-full cell-md-12 cell-lg-12 cell-xl-12">
                    <div class="card win-shadow">
                        <div class="card-header ">
                            Loans
                            <div class="place-right">
                                <a href="{{route('loans.create')}}" title="New loan" class="button cycle primary">
                                    <i class="mif mif-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <table class="table striped table-border" data-role="table"
                                   data-show-search="true"
                                   data-show-table-info="false"
                                   data-show-rows-steps="false"
                                   data-show-pagination="false">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>
                                        <i class="mif mif-user"></i>&nbsp;Name
                                    </th>
                                    <th>
                                        <i class="mif mif-phone"></i>&nbsp;Phone
                                    </th>
                                    <th>
                                        <i class="mif mif-calendar"></i>&nbsp;Date
                                    </th>
                                    <th>
                                        <i class="mif mif-calendar"></i>&nbsp;Due
                                    </th>
                                    <th>
                                        <i class="mif mif-coins"></i>&nbsp;Amount
                                    </th>
                                    <th>
                                        <i class="mif mif-money"></i>&nbsp;Interest
                                    </th>
                                    <th>
                                        <i class="mif mif-coins"></i>&nbsp;Repayable
                                    </th>
                                    <th>
                                        <i class="mif mif-wrench"></i>&nbsp;Tools
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($loans as $loan)
                                    <tr>
                                        <td>{{$loan->id}}</td>
                                        <td>{{$loan->client->name}}</td>
                                        <td>+(265)&nbsp;{{$loan->client->phone}}</td>
                                        <td>{{$loan->date}}</td>
                                        <td>{{$loan->due}}</td>
                                        <td>{{number_format($loan->amount,2)}}</td>
                                        <td>{{$loan->interest}} %</td>
                                        <td>{{$loan->repayable}}</td>
                                        <td>
                                            <a href="{{route('loans.show',$loan->id)}}" class="button fg-white small primary">
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

