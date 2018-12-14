@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Data</div>

                <div class="card-body">
                   <form action="{{route('forum.update',$forum->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                        <div class="form-group">
                            <label for="title"> Title</label>
                            <input type="text" name="title" class="form-control" value="{{$forum->title}}">
                        </div>
                        <div class="form-group">
                            <label for="category"> Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="{{$forum->category}}">{{$forum->category}}</option>
                                <option value="Science">Science</option>
                                <option value="Game">Game</option>
                                <option value="K-Drama">K-Drama</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content"> Description</label>
                            <textarea type="text" name="content" class="form-control" placeholder="Description..">{{$forum->content}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>

                            <div class="col-md-6">
                                <input id="open" type="radio"class="radio-inline" @if($forum->status == 'Open') checked @endif name="status" value="Open" required> Open
                                <input id="close" type="radio"class="radio-inline" @if($forum->status == 'Close') checked @endif name="status" value="Close" required> Close

                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                            
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
