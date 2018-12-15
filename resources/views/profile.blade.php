@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        </div>
        <div class="col-md-6">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:15; height:150px;float:left;border-radius:50%;margin-right:25px;">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 style="text-align:center;"> {{$user->name}}</h2>
        </div>
    </div>
    <div class="row justify-content-center mt-3">
        {{-- <div class="col-md-4"></div> --}}
        <div class="col-md-4">
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Name</b></div>
                <div class="col-md-6">{{$user->name}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Popularity</b></div>
                <div class="col-md-6">
                    <h5><span class="badge large badge-success mr-2" style="float:left;">+ {{$user->popularity_positive}}</span>
                    <span class="badge large badge-danger mr-2" style="float:left;">- {{$user->popularity_negative}}</span></h5>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Email</b></div>
                <div class="col-md-6">{{$user->email}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Phone</b></div>
                <div class="col-md-6">{{$user->phone}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Birthday</b></div>
                <div class="col-md-6">{{$user->dob}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Gender</b></div>
                <div class="col-md-6">{{$user->gender}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Address</b></div>
                <div class="col-md-6">{{$user->address}}</div>
            </div>
        </div>
        </div>
    </div>
</div>
@auth
@if(Auth::user()->id != $user->id)    
    <div class="row justify-content-center mt-4">
        <div class="col-md-4 ml-4">
            Message
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-4">
            <form method="POST" action="{{ url('message/'.$user->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12 mx-2">
                    <textarea type="text" name="content" class="form-control"></textarea>
                    <button type="submit" class="btn btn-primary mt-4 col-sm-2 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="float: right;">Send</button>
                    @if ($errors->has('content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            </form>
        </div>
    </div>
@endif
@endauth
@endsection
