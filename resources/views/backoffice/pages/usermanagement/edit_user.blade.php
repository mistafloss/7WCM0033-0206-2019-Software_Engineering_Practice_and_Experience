@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
    <div class="card-header">
        <div class="float-left">
         <h5>UPDATE USER</h5>
        </div>
        <form action="{{route('API_userUpdate')}}" method="post">
            <span class="float-right">
                <a href="{{route('usermanagementIndex')}}" class="btn btn-secondary"><i class="far fa-arrow-alt-circle-left"></i>Back to Users</a>
                <input type="submit" id="btn_save" class="btn btn-success" value="Save">
                <a href="{{route('usermanagementIndex')}}" class="btn btn-danger"> Cancel </a>
            </span>
    </div>
    <div class="card-body">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{$user->first_name}}">
                <p class="text-danger">
                    @if($errors->has('first_name'))
                        {{ $errors->first('first_name') }}
                    @endif
                </p>
            </div>

            <div class="form-group">
                <label for="last_name">Surname</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
                <p class="text-danger">
                    @if($errors->has('last_name'))
                        {{ $errors->first('last_name') }}
                    @endif
                </p>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                <p class="text-danger">
                    @if($errors->has('username'))
                        {{ $errors->first('username') }}
                    @endif
                </p>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role_id" name="role_id">
                    <option value="">--Select User Role--</option>
                    <option value="1" {{ ( $user->role_id == 1 ) ? 'selected' : '' }}> Developer </option>
                    <option value="2" {{ ( $user->role_id == 2 ) ? 'selected' : '' }}> Primary Admin </option>
                    <option value="3" {{ ( $user->role_id == 3 ) ? 'selected' : '' }}> Manager </option>
                    <option value="4" {{ ( $user->role_id == 4 ) ? 'selected' : '' }}> Staff </option>
                </select>
                <p class="text-danger">
                    @if($errors->has('role_id'))
                        {{ $errors->first('role_id') }}
                    @endif
                </p>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                <p class="text-danger">
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </p>
                {{ csrf_field()}}
            <input type="hidden" name="id" value="{{$user->id}}"/>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')

<script type="application/javascript">

</script>

@endsection