@extends('sys')


@section('title')
    <title>Money Pot | Clients</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-users"></i>&nbsp;Clients
        </h4>

        <div class="schemes-table grid">
            <div class="row">
                <div class="cell-sm-full cell-md-12 cell-lg-10 cell-xl-7">
                    <div class="card win-shadow">
                        <div class="card-header ">
                            Clients
                            <div class="place-right">
                                <a href="{{route('clients.create')}}" title="add Client" class="button cycle primary">
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
                                    <th>Name</th>
                                    <th>
                                        <i class="mif mif-envelop"></i>&nbsp;Email
                                    </th>
                                    <th>
                                        <i class="mif mif-phone"></i>&nbsp;Phone
                                    </th>
                                    <th>
                                        <i class="mif mif-coins"></i>&nbsp;Loans
                                    </th>
                                    <th>
                                        <i class="mif mif-wrench"></i>&nbsp;Tools
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{($client->email) ? $client->email : '<Not Available>'}}</td>
                                    <td>+(265)&nbsp;{{$client->phone}}</td>
                                    <td> -- </td>
                                    <td>
                                        <a href="{{route('clients.show',$client->id)}}" class="button fg-white small primary">
                                            <i class="mif mif-info"></i>&nbsp;Profile
                                        </a>
                                        <a href="{{route('clients.edit',$client->id)}}" class="button fg-white small primary">
                                            <i class="mif mif-pencil"></i>&nbsp;Edit
                                        </a>
                                        <a class="button fg-white small bg-red" data-toggle="delete" data-url="{{route('clients.destroy',$client->id)}}"
                                           data-message="Are you sure you want to delete this client : <br><strong>{{$client->name}}</strong><hr> ">
                                            <i class="mif mif-bin"></i>&nbsp;Delete
                                        </a>
                                    </td>
                                </tr><!-- ./ row -->
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @include('partials.delete-confirmation')
@stop


@section('scripts')
    <script src="{{asset('js/delete-confirmation.js')}}"></script>
@stop

