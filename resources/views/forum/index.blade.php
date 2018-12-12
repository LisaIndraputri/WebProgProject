@extends('layouts.app')
<style>
    .button {
            background-color : #31B0D5;
            color: white;
            padding: 25px 35px;
            border: 0;
            border-radius: 40px;
            right: 0px;
            bottom: 0px;
            float:right;
            position: sticky;
        }
</style>
@section('content')
<div class="container" >
    <div class="row justify-content-center">
        @if(count($forums) == 0)
            <h1>Ga ada bro</h1>
        @else
            @foreach($forums as $forum)
            <div class="col-md-12" style="margin-bottom:20px ">
                <div class="card" >
                    <div class="card-header " >
                            <h5>{{$forum->title}}</h5>
                            <p>Category: {{$forum->category}} </p>
                            <p>Posted at: {{$forum->created_at}} </p>
                    </div>
                    <div class="col-md-6">
                    <p> {{$forum->content}} </p>
                    <a href="{{url('forum/'.$forum->id.'/edit')}}">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        <div class="row" style="text-align: center;">
                {{$forums->links()}}
        </div>
    </div>
    <a href="{{url('forum/create')}}"><button class="button">+</button></a>
</div>


@endsection