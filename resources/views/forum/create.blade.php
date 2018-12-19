@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Data</div>

                <div class="card-body">
                   <form action="{{route('forum.store')}}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group">
                            <label for="title"> Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title..">
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
                            <textarea type="text" name="content" class="form-control" placeholder="Description.."></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Add</button>
                            
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
