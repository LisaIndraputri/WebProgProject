@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12" style="margin-bottom:20px">
      <div class="card">
        <div class="card-header " >
            <h4 class="mt-2">
                <b>{{$forum->title}}</b>
              </h4>
              @if($forum->status == 'Open' || $forum->status == 'open')
                  <span class="badge badge-success" style="float:right;">Open</span>
              @else
                  <span class="badge badge-danger" style="float:right;">Close</span>
              @endif
              Category : {{$forum->category}}
              <br>
              Owner : {{$forum->user->name}}
              <br>
              Posted at : {{$forum->created_at}}
              <br>
              <br>
              Description : 
              <br>
              {{$forum->content}}
              
              {{-- <form class="mt-3" role="search" method="POST" action="{{url('thread/'.$forum->id.'?search_keyword='.$search)}}" class="col-md-12"> --}}
              <form class="mt-3" role="search" method="POST" action="{{url('thread/'.$forum->id.'/searchthread')}}" class="col-md-12">
                @csrf
                  <div class= "input-group custom-search-form" style="margin-bottom:20px ">
                    <input type="text" class="form-control" name="search" placeholder="Search this Forum's thread by Content or Owner">
                    <span class="input-group-btn">
                      <span class="input-group-btn">
                          <button class="btn btn-primary btn-sm" type="submit"><i class="material-icons">search</i></button>
                      </span>
                    </span>
                  </div>
              </form>
          </div>

          <div class="col-xs-12 ml-3 mt-3" >
            @if(count($threads) == 0)
              <h6 class="mt-1 mb-3">This forum does not have any thread</h6>
            @else
                @foreach($threads as $thread)
                <div class="col-sm-12" style="margin-bottom:20px">
                    <div class="card">
                        <div class="card-header " >
                            <h5 class="mt-2">
                                {{-- <a href="{{url('thread/'.$forum->id)}}"> --}}
                                <b>{{$thread->user->name}}</b>
                                {{-- </a> --}}
                            </h5>
                            Posted at: {{$thread->created_at}}
                        </div>

                        <div class="col-xs-12 ml-3 mt-3" >
                            <p > {{$thread->content}} </p>
                        </div>
                            {{-- <div class="col-sm-12"> --}}
                        {{-- </div> --}}
                    </div>
                </div>
                @endforeach
                <div class="col-sm-12" style="text-align: center;">
                    {{$threads->links()}}
                </div>
            @endif
          </div>

        </div>
        <div class="card mt-5">
            <div class="card-header " >
              Post New Thread
            </div>
            <div class="card-body">
              <div class="col-xs-12 ml-2 mt-1" >
                <h6><b>Content</b></h6>
              </div>
              
              <form method="POST" action="{{ url('thread/'.$forum->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mx-2">
                        <textarea type="text" name="content" class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-4 col-sm-1 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="float: right;">Post</button>
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
    </div>
  </div>
</div>
@endsection