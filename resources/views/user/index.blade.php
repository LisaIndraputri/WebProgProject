@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
  <div class="col-sm-12" style="margin-bottom:20px">
    <div class="card">
      <div class="card-header " >
        <div>
            <a href="{{url('user/create')}}"><button type="submit" class="btn btn-success btn-sm ml-1 mr-1" style="float: right;">Add new User</button></a>
        </div>
        List of user
      </div>

      <div class="card-body">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col" style="text-align: center;">ID</th>
              <th scope="col" style="text-align: center;">Photo</th>
              <th scope="col" style="text-align: center;">Name</th>
              <th scope="col" style="text-align: center;">Role</th>
              <th scope="col" style="text-align: center;">Email</th>
              <th scope="col" style="text-align: center;">Phone</th>
              <th scope="col" style="text-align: center;">Address</th>
              <th scope="col" style="text-align: center;">Birthday</th>
              <th scope="col" style="text-align: center;">Gender</th>
              <th scope="col" style="text-align: center;">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach($users as $i => $user)
              <tr>
                <th scope="row">{{$i + 1}}</th>
                <td><img src="/uploads/avatars/{{$user->avatar}}" style="width:32px; height:32px;border-radius:50%"></td>
              <td><a href="{{url('profile/'.$user->id)}}">{{$user->name}}</a></td>
                <td>@if($user->admin) Admin @else Member @endif</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->gender}}</td>
                <td>
                  <a href="{{url('/')}}"><button type="button" class="btn btn-warning btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">edit</i></button></a>
                  <a href="{{url('user/'.$user->id.'/delete')}}"><button type="submit" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">delete</i></button></a>
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