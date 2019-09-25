@extends('sys')


@section('title')
    <title>Money Pot | Client Info</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-user"></i>&nbsp;Client Information
        </h4>

        <div class="scheme-details grid">
            <div class="row">
                <div class="cell-lg-3">
                    <div class="card">
                        <img src="{{asset('img/avatar.png')}}" class="w-100" alt="avatar image">
                        <div class="card-header bg-darkCyan fg-white">
                            <strong>{{$client->name}}</strong>
                        </div>
                        <div class="card-content p-2 bd-default border-bottom">
                            <div>
                                <strong>{{$client->email ? $client->email : "<Not Available>"}} </strong>
                                <small class="place-right">
                                    <i class="mif mif-envelop"></i>
                                </small>
                            </div>

                            <div>
                                <strong> {{$client->phone}} %</strong>
                                <small class="place-right">
                                    <i class="mif mif-phone"></i>
                                </small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('clients.edit',$client->id)}}" class="button primary fg-white">
                                <i class="mif mif-pencil"></i>&nbsp;Edit
                            </a>
                            <a href="{{route('clients.index')}}" class="button dark fg-white">
                                <i class="mif mif-undo"></i>&nbsp;Return
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cell-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <i class="mif mif-info"></i>&nbsp;Addition Details
                        </div>
                        <div class="card-content bg-light p-2">
                            {{ ($client->details) ? $client->details : '<Not Available>' }}
                        </div>

                    </div><!-- ./details -->
                    <div class="card">
                        <div class="card-header">
                            <i class="mif mif-checkmark"></i>&nbsp;Recomendations
                        </div>
                        <div class="card-content bg-light p-2">
                            <i class="mif mif-info"></i>&nbsp;This client has no bad debts!
                        </div>

                    </div><!-- ./ recommendations-->
                    <div class="card">
                        <div class="card-header">
                           <i class="mif mif-coins"></i>&nbsp;Previous Loans
                        </div>
                        <div class="card-content bg-light p-10">
                            <i class="mif mif-info"></i>&nbsp;This client has not taken any loan before!
                        </div>

                    </div><!-- ./loans -->


                </div>
            </div>

        </div>
    </div>

@stop
