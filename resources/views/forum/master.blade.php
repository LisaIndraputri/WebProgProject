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
                
                <td>{{$forum->title}}</td>
                <td style="text-align: center;">{{$forum->category}}</td>
                <td style="text-align: center;">{{$forum->user->name}}</td>
                <td style="text-align: center;">{{$forum->content}}</td>
                <td style="text-align: center;">{{$forum->status}}</td>
                <td style="text-align: center;">
                    <a href="{{url('forum/'.$forum->id.'/delete')}}"><button type="button" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">delete</i>Delete</button></a>
                    @if($forum->status=='open')
                        <a href="{{url('forum/'.$forum->id.'/close')}}"><button type="button" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;"><i class="small material-icons">close</i>Close</button></a>
                    @else
                    <button type="button" class="btn btn-danger btn-sm ml-1 mr-1" style="float: right;" disabled ><i class="small material-icons">close</i>Close</button>
                    @endif
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