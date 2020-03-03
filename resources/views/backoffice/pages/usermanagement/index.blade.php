@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
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
                <td><a href="{{route('addUser')}}" class="btn btn-primary"> Show</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>
</div>
@endsection