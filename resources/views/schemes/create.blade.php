@extends('sys')

@section('title')
    <title>Money Pot | Add Scheme</title>
@stop



@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-suitcase"></i>&nbsp;Add Scheme
        </h4>


        <div class="scheme-form-container grid">
            <div class="row">
                <div class="cell-4">
                    <div class="card win-shadow">
                        <div class="card-content p-2">
                            <form action="{{route('schemes.store')}}" method="POST" class="form" id="scheme-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="{{$errors->has('name') ? 'invalid' : ''}}" placeholder="scheme name">
                                    <small class="invalid_feedback">
                                        {{$errors->first('name')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Duration</label>
                                    <input type="number" name="duration"  value="{{old('duration')}}" class="{{$errors->has('duration') ? 'invalid' : ''}}" placeholder="repayment duration in days">
                                    <small class="invalid_feedback">
                                        {{$errors->first('duration')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Interest (Percentage)</label>
                                    <input type="number" name="interest" value="{{old('interest')}}" class="{{$errors->has('interest') ? 'invalid' : ''}}" placeholder="repayment interest">
                                    <small class="invalid_feedback">
                                        {{$errors->first('interest')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Addition Details</label>
                                    <textarea name="details" value="{{old('details')}}" class="{{$errors->has('details') ? 'invalid' : ''}}"  rows="5"></textarea>
                                    <small class="invalid_feedback">
                                        {{$errors->first('details')}}
                                    </small>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button onclick="document.getElementById('scheme-form').submit()" class="button  primary">
                                <i class="mif mif-plus"></i>&nbsp;Save
                            </button>
                            <a href="{{route('schemes.index')}}" class="button dark">
                                <i class="mif mif-undo"></i>&nbsp;Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
