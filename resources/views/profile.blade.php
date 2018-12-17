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
    @if(Auth::user()->id == $user->id)
    <div class="row justify-content-center">
        <a href="{{url('user/'.$user->id.'/edit')}}"><button type="button" class="btn btn-warning btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">edit</i>Edit</button></a>
    </div>
    @endif
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
                    @if($voter_relationship != null && $voter_relationship->vote_giver == Auth::user()->id && 
                        $voter_relationship->vote_receiver == $user->id && 
                        $voter_relationship->type == 1)
                        <a href="{{url('vote/'.Auth::user()->id.'/'.$user->id.'/1')}}" class="btn btn-outline-success mx-3 mb-4"><i class="material-icons">add</i></a>
                    @else
                        <a href="{{url('vote/'.Auth::user()->id.'/'.$user->id.'/1')}}" class="btn btn-success mx-3 mb-4"><i class="material-icons">add</i></a>
                    @endif

                    @if($voter_relationship != null && $voter_relationship->vote_giver == Auth::user()->id && 
                        $voter_relationship->vote_receiver == $user->id && 
                        $voter_relationship->type == 0)
                        <a href="{{url('vote/'.Auth::user()->id.'/'.$user->id.'/0')}}"  class="btn btn-outline-danger mx-3 mb-4"><i class="material-icons">remove</i></a>
                    @else
                        <a href="{{url('vote/'.Auth::user()->id.'/'.$user->id.'/0')}}"  class="btn btn-danger mx-3 mb-4"><i class="material-icons">remove</i></a>
                    @endif
                {{-- </h1> --}}
            </div>
        </div>
    </div>
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
