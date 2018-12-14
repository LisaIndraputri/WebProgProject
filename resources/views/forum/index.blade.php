@extends('layouts.app')
<style>
    .button {
            background-color : #31B0D5;
            color: white;
            width: 50px;
            height: 50px;
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
            <h4>No forum(s) available</h4>
        @else
            @foreach($forums as $forum)
            <div class="col-sm-12" style="margin-bottom:20px">
                <div class="card">
                    <div class="card-header " >
                        <h4 class="mt-2">
                            <a href="{{url('thread/'.$forum->id)}}">
                                <b>{{$forum->title}}</b>
                            </a>
                        </h4>
                        @if($forum->status == 'open')
                            <span class="badge badge-success" style="float:right;">Open</span>
                        @else
                            <span class="badge badge-danger" style="float:right;">Close</span>
                        @endif
                        
                        Category: {{$forum->category}}
                        <br>
                        Posted at: {{$forum->created_at}}
                    </div>

                    <div class="col-xs-12 ml-3 mt-3" >
                        <p > {{$forum->content}} </p>
                    </div>
                        {{-- <div class="col-sm-12"> --}}
                    {{-- </div> --}}
                </div>
            </div>
            @endforeach
            <div class="col-sm-12" style="text-align: center;">
                {{$forums->links()}}
            </div>
        @endif
 
    </div>
    @auth
        <a href="{{url('forum/create')}}"><button class="button mb-5" style="font-size: 30px;">+</button></a>
    @endauth
</div>


@endsection