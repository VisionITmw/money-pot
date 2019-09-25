@extends('sys')

@section('title')
    <title>Money Pot | Add Client</title>
@stop



@section('content')
    <div class="container-fluid">
        <h4>
            <i class="mif mif-user"></i>&nbsp;Add Client
        </h4>


        <div class="scheme-form-container grid">
            <div class="row">
                <div class="cell-4">
                    <div class="card win-shadow">
                        <div class="card-content p-2">
                            <form action="{{route('clients.store')}}" method="POST" class="form" id="scheme-form">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Firstname</label>
                                    <input type="text" name="firstname" value="{{old('firstname')}}" class="{{$errors->has('firstname') ? 'invalid' : ''}}" placeholder="Client's firstname">
                                    <small class="invalid_feedback">
                                        {{$errors->first('firstname')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Surname</label>
                                    <input type="text" name="surname" value="{{old('surname')}}" class="{{$errors->has('surname') ? 'invalid' : ''}}" placeholder="Client's surname">
                                    <small class="invalid_feedback">
                                        {{$errors->first('surname')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="{{$errors->has('email') ? 'invalid' : ''}}" placeholder="Client's email address">
                                    <small class="invalid_feedback">
                                        {{$errors->first('email')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="text" name="phone" data-role="input" data-prepend="+265" value="{{old('phone')}}" class="{{$errors->has('phone') ? 'invalid' : ''}}" placeholder="Client's contact phone number">
                                    <small class="invalid_feedback">
                                        {{$errors->first('phone')}}
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="name">Addition Details</label>
                                    <textarea name="details" value="{{old('details')}}" class="{{$errors->has('details') ? 'invalid' : ''}}"  rows="5">{{old('details')}}</textarea>
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
