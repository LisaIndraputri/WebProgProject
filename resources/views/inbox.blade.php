@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row justify-content-center">    
        
        @if(count($messages) == 0)
            <h4>You have no message</h4>
        @else
            @foreach($messages as $message)
            <div class="col-sm-12" style="margin-bottom:20px">
                <div class="card">
                    <div class="card-header " >
                        <h4 class="mt-2">
                                {{$message->user_id_receiver}} <br>
                                {{$message->created_at}} <br>
                        </h4>
                    </div>
                    <div class="col-xs-12 ml-3 mt-3 mb-1" >
                        
                        <p class = "mt-1 ml-3"> {{$message->content}} </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-sm-12" style="text-align: center;">
                {{$forums->links()}}
            </div>
        @endif
 
    </div>
</div>


@endsection