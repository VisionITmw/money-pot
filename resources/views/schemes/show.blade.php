@extends('sys')


@section('title')
    <title>Money Pot | Scheme Info</title>
@stop


@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-suitcase"></i>&nbsp;Scheme Information
        </h4>

        <div class="scheme-details grid">
            <div class="cell-lg-4">
                <div class="card">
                    <div class="card-header bg-darkCyan fg-white">
                       <strong>{{$scheme->name}}</strong>
                    </div>
                    <div class="card-content p-2 bd-default border-bottom">
                       <div>
                           <strong>{{$scheme->duration}} days </strong>
                           <small class="place-right">
                               <i class="mif mif-watch"></i>&nbsp;Duration
                           </small>
                       </div>

                        <div>
                            <strong> {{$scheme->interest}} %</strong>
                            <small class="place-right">
                                <i class="mif mif-stack"></i>&nbsp;Interest
                            </small>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        {{ ($scheme->details) ? $scheme->details : 'No details available' }}
                        <br>
                        <hr>
                        <small >
                            <i class="mif mif-info"></i>&nbsp;Details
                        </small>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('schemes.edit',$scheme->id)}}" class="button primary fg-white">
                            <i class="mif mif-pencil"></i>&nbsp;Edit
                        </a>
                        <a href="{{route('schemes.index')}}" class="button dark fg-white">
                           <i class="mif mif-undo"></i>&nbsp;Return
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
