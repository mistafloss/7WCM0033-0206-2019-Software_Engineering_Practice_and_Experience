

@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    Permissions
    <span class="float-right">
      {{-- <a href="{{route('addUser')}}" class="btn btn-primary">+ Add User</a> --}}
    </span>
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Slug</th>
              <th scope="col">Roles</th>
            </tr>
          </thead>
          <tbody>
            @foreach($permissions as $permission)
            <tr>
              <th scope="row">{{$permission->id}}</th>
              <td>{{$permission->name}}</td>
              <td> {{$permission->slug }}</td>
              <td>
                @if($permission->roles->count() >= 1)
                  @foreach($permission->roles as $role)
                   <span class="badge badge-pill badge-primary"> {{$role->name}} </span>
                  @endforeach
                @else  
                   None
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>

</div>
@endsection