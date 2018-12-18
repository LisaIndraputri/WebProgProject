@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-12" style="margin-bottom:20px">
    <div class="card">
      <div class="card-header " >
        List of forum
      </div>

      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="text-align: center;">Title</th>
              <th scope="col" style="text-align: center;">Category</th>
              <th scope="col" style="text-align: center;">Owner</th>
              <th scope="col" style="text-align: center;">Description</th>
              <th scope="col" style="text-align: center;">Status</th>
              <th scope="col" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($forums as $i => $forum)
              <tr>
                <th scope="row">{{$i + 1}}</th>
                <td>{{$forum->title}}</td>
                <td>{{$forum->category}}</td>
                <td>{{$forum->user_id}}</td>
                <td>{{$forum->content}}</td>
                <td>{{$forum->status}}</td>
                <td>
                  <a href=""><button type="button" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">close</i></button></a>
                  <a href=""><button type="submit" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">delete</i></button></a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          
      </div>
    </div>
  </div>
</div>
@endsection