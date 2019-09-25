@extends('sys')


@section('title')
    <title>Money Pot | Schemes</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-suitcase"></i>&nbsp;Payment Schemes
        </h4>

        <div class="schemes-table grid">
            <div class="row">
                <div class="cell-sm-full cell-md-12 cell-lg-7 cell-xl-5">
                    <div class="card win-shadow">
                        <div class="card-header ">
                            Available Schemes
                            <div class="place-right">
                                <a href="{{route('schemes.create')}}" title="add scheme" class="button cycle primary">
                                    <i class="mif mif-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <table class="table striped table-border" data-role="table"
                                   data-show-search="false"
                                   data-show-table-info="false"
                                   data-show-rows-steps="false"
                                   data-show-pagination="false">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>
                                        <i class="mif mif-calendar"></i>&nbsp;Duration
                                    </th>
                                    <th>
                                        <i class="mif mif-money"></i>&nbsp;Interest
                                    </th>
                                    <th>
                                        <i class="mif mif-wrench"></i>&nbsp;Tools
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schemes as $scheme)
                                <tr>
                                    <td>{{$scheme->name}}</td>
                                    <td>{{$scheme->duration}} days</td>
                                    <td>{{$scheme->interest}} %</td>
                                    <td>
                                        <a href="{{route('schemes.show',$scheme->id)}}" class="button fg-white small primary">
                                            <i class="mif mif-info"></i>&nbsp;More Info
                                        </a>
                                        <a href="{{route('schemes.edit',$scheme->id)}}" class="button fg-white small primary">
                                            <i class="mif mif-pencil"></i>&nbsp;Edit
                                        </a>
                                        <a class="button fg-white small bg-red" data-toggle="delete" data-url="{{route('schemes.destroy',$scheme->id)}}"
                                           data-message="Are you sure you want to delete this payment scheme : <br><strong>{{$scheme->name}}</strong><hr> ">
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
    <script>
        $(function(){
            $("[data-toggle='delete']").on('click',function(e){
                var data = $(e.target)
                var url = data.attr('data-url');
                var message = data.attr('data-message');
                $("#delete-message").html(message);
                $("#delete-form").attr({'action':url}); // set action of form to url
                Metro.dialog.open("#delete-dialog")
            });
        })
    </script>
@stop

