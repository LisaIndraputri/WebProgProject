@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-bottom:20px">
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header " >
                    Add new Category
                </div>
                <div class="card-body" style="text-align: center;">
                    <form action="{{ url('category') }}" method="POST">
                    {{csrf_field()}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success" >Add</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header " >
                    List of Category
                </div>
                <div class="card-body">
                        @if(count($categories) == 0)
                        <h4>You have no Category</h4>
                        @else
                        <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col" style="text-align: center;">ID</th>
                                    <th scope="col" style="text-align: center;">Name</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $i => $category)
                                    <tr>
                                      <th scope="row" style="text-align: center;">{{$i + 1}}</th>
                                      <td style="text-align: center;">{{$category->name}}</td>
                                      <td style="text-align: center;">
                                        <a href="{{url('category/'.$category->id.'/delete')}}"><button type="button" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">delete</i></button></a>
                                        <a href="{{url('category/'.$category->id.'/edit')}}"><button type="button" class="btn btn-warning btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">edit</i></button></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                        <div class="col-md-8" style="text-align: center;">
                            {{$categories->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection