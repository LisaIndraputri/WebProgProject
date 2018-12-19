@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row justify-content-center">    
        
        @if(count($messages) == 0)
            <h4>You have no message</h4>
        @else
            @foreach($messages as $i=>$message)
            <div class="col-sm-12" style="margin-bottom:20px">
                <div class="card">
                    <div class="card-header " >
                        <h5 class="mt-2">
                        <div>
                            {{$message_id}}
                            <a href="{{url('message/'.$message->id.'/delete')}}"><button type="submit" class="btn btn-danger ml-1 mr-1" style="float: right;"><i class="small material-icons">delete</i>Delete</button></a>
                            <a href="{{url('message/reply/'.$message->receiver->id.'/'.$i)}}"><button type="submit" class="btn btn-primary ml-1 mr-1" style="float: right;"><i class="small material-icons">reply</i>Reply</button></a>
                        </div>
                        <a href="{{url('profile/'.$message->sender->id)}}">{{$message->sender->name}}</a>
                        </h5>
                            {{$message->created_at}} 
                    </div>
                    <div class="col-xs-12 ml-3 mt-3 mb-1" >
                        <p class = "mt-1 ml-3"> {{$message->content}} </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-12" style="text-align: center;">
                {{$messages->links()}}
            </div>
        @endif
 
    </div>
</div>


@endsection