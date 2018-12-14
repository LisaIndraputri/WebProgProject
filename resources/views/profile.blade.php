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
                <div class="col-md-6">{{Auth::user()->name}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Popularity</b></div>
                <div class="col-md-6">
                    <h5><span class="badge large badge-success mr-2" style="float:left;">+ {{Auth::user()->popularity_positive}}</span>
                    <span class="badge large badge-danger mr-2" style="float:left;">+ {{Auth::user()->popularity_negative}}</span></h5>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Email</b></div>
                <div class="col-md-6">{{Auth::user()->email}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Phone</b></div>
                <div class="col-md-6">{{Auth::user()->phone}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Birthday</b></div>
                <div class="col-md-6">{{Auth::user()->dob}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Gender</b></div>
                <div class="col-md-6">{{Auth::user()->gender}}</div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-3"><b>Address</b></div>
                <div class="col-md-6">{{Auth::user()->address}}</div>
            </div>
        </div>
        </div>
    </div>
    @if(Auth::user()->id != $user->id)    
        <div class="row justify-content-center mt-5">
            <div class="col-md-2 border border-dark" style="text-align:center;">
                <div class="row justify-content-center ">
                    <div class="col-md-12 mt-2">
                        Give Popularity
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    {{-- <h1> --}}
                        <a href="#" class="btn btn-success mx-3 mb-4"><i class="material-icons">add</i></a>
                        <a href="#" class="btn btn-danger mx-3 mb-4"><i class="material-icons">remove</i></a>
                    {{-- </h1> --}}
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
