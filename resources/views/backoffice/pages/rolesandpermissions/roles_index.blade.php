

@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
    <div class="card-header">
      Roles
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
                <th scope="col">Permissions</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($roles as $role)
              <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                <td>
                  @if($role->permissions->count() >= 1)
                    @foreach($role->permissions as $permission)
                     <span class="badge badge-pill badge-primary"> {{$permission->name}} </span>
                    @endforeach
                  @else  
                     None
                  @endif
                </td>
                <td><a href="{{route('viewRole', $role->id)}}" class="btn btn-primary"> Show</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</div>


</div>
@endsection