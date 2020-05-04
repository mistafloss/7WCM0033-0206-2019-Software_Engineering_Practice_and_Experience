@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
      @if(Session::has('success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{Session::get('success')}}
      </div>
    @elseif(Session::has('fail'))
      <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          {{Session::get('fail')}}
      </div>
    @endif
    <div class="card-header">
      USERS
      <span class="float-right">
        <a href="{{route('addUser')}}" class="btn btn-primary">+ Add User</a>
      </span>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
              <th scope="row">{{$user->id}}</th>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>
                  @foreach($user->roles as $role)
                   <span class="badge badge-pill badge-primary"> {{$role->name}} </span>
                  @endforeach
                </td>  
                <td><a href="{{route('viewUser',$user->id)}}" class="btn btn-primary"> Show</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
@endsection