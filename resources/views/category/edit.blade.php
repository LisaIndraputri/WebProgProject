@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-bottom:20px">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header " >
                    Update Category
                </div>
                <div class="card-body" style="text-align: center;">
                    <form action="{{url('category/'.$categories->id.'/update')}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{$categories->name}}" required autofocus>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" >Update</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection