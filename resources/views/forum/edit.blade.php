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
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content"> Description</label>
                            <textarea type="text" name="content" class="form-control" placeholder="Description..">{{$forum->content}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right;">Update</button>
                            
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
