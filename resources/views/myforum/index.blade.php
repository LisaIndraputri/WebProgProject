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
            cursor: pointer;
        }
</style>

@section('content')
<div class="container" >
    <div class="row justify-content-center">    
        <form role="search" method="POST" action="{{url("/searchcontent")}}" class="col-md-12">
        @csrf
            <div class= "input-group custom-search-form" style="margin-bottom:20px ">
                    <input type="text" class="form-control" name="search" placeholder="Title or Category..">
                    <span class="input-group-btn">
                      <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="material-icons">search</i></button>
                      </span>
                    </span>
            </div>
        </form>
        
        @if(count($forums) == 0)
            <h1>Ga ada bro</h1>
        @else
            @foreach($forums as $forum)
            <div class="col-sm-12" style="margin-bottom:20px">
                <div class="card">
                    <div class="card-header " >
                            @if($forum->status == 'Open')
                                <h5>{{$forum->title}} <span class="badge badge-success" style="float:right;">{{$forum->status}}</span></h5>
                            @else
                                <h5>{{$forum->title}} <span class="badge badge-danger" style="float:right;">{{$forum->status}}</span></h5>
                            @endif
                            <p>Category: {{$forum->category}} </p>
                            <p>Posted at: {{$forum->created_at}} </p>
                            <p></p>
                    </div>
                    <div class="col-xs-12 ml-3 mt-3 mb-3" >
                        <p > {{$forum->content}} </p>
                        <a href="{{url('forum/'.$forum->id.'/edit')}}">Edit</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-12" style="text-align: center;">
                {{$forums->links()}}
            </div>
        @endif
 
    </div>
    @auth
        <a href="{{url('forum/create')}}"><button class="button">+</button></a>
    @endauth
</div>


@endsection