@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <img src="/uploads/avatars/{{$user->avatar}}" style="width:15; height:150px;float:left;border-radius:50%;margin-right:25px;">
            <h2> {{$user->name}}'s Profile</h2>
        </div>
    </div>
</div>
@endsection
