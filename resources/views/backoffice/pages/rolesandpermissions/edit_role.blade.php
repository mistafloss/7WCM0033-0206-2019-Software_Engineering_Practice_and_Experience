
@extends('backoffice.layouts.master')
@section('content')

<div class="container">

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
    
    <div class="">
        <h3>Edit Role</h3>
    </div>

    <div class="card mt-10">
        <form action="{{route('API_roleUpdate')}}" method="post">
            <div class="card-header">
                {{$role->name}} 
           
                <span class="float-right">
                    <a href="{{route('rolesIndex')}}" class="btn btn-secondary"><i class="far fa-arrow-alt-circle-left"></i>Back to Roles</a>
                    <input type="submit" class="btn btn-success" value="Save Roles"/> 
                </span>
            </div>
            <div class="card-body">
                <h5>Permissions </h5>
            <hr/>
            <ul class="list-group">
                @foreach($permissions as $perm)
                    <li class="list-group-item">
                        <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input form-control " name="permission[]" value="{{$perm->id}}" {{ $role_permissions->contains('id', $perm->id) ? 'checked' : '' }} id="">
                        <label class="form-check-label" for="">{{$perm->name}}</label>
                        </div>
                    </li>
                @endforeach
            </ul> 
            {{ csrf_field()}}
            <input type="hidden" value="{{$role->id}}" name="role_id"/>
            </div>
        </form>
    </div>
</div>

@endsection