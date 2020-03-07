@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
    <div class="card-header">
       ADD USER
      <span class="float-right">
        <button id="btn_save" class="btn btn-success"> Save</button>
        <a href="{{route('usermanagementIndex')}}" class="btn btn-danger"> Cancel </a>
      </span>
    </div>
    <div class="card-body">
        <form class="form-signin col-sm">
            <div class="invisible" id="loading">
                <div class="spinner-border text-dark" role="status">
                </div>
                <span>Loading...</span>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name">
                <span class="text-danger" id="first_name_error"> </span>
            </div>

            <div class="form-group">
                <label for="last_name">Surname</label>
                <input type="text" class="form-control" id="last_name" name="last_name">
                <span class="text-danger" id="last_name_error"> </span>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <span class="text-danger" id="username_error"> </span>
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role_id" name="role_id">
                    <option value="">--Select User Role--</option>
                    <option value="1"> Developer </option>
                    <option value="2"> Primary Admin </option>
                    <option value="3"> Manager </option>
                    <option value="4"> Staff </option>
                </select>
                <span class="text-danger" id="role_error"> </span>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <span class="text-danger" id="email_error"> </span>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span class="text-danger" id="password_error"> </span>
                <input type="hidden" value="{{route('API_userCreate')}}" id="action_url" />
                <input type="hidden" value="{{route('usermanagementIndex')}}" id="users_list_url"/>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

@section('scripts')

<script type="application/javascript">

$('#btn_save').click(function(e){
    e.preventDefault(e);
    $('#loading').removeClass('invisible');
    $("#btn_save").attr("disabled", true);

    $.ajax({
         type:'POST',
         url:$('#action_url').val(),
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         data:{
             first_name: $('#first_name').val(),
             last_name:$('#last_name').val(),
             email: $('#email').val(),
             username: $('#username').val(),
             role_id:$('#role_id').val(),
             password:$('#password').val()
         },
         success:function(response){
            $('#loading').addClass('invisible');
             $("#btn_save").attr("disabled", false); 
            console.log(response);
            var users_list_url = $('#users_list_url').val();
            $(location).attr('href', users_list_url)
         },
         error: function(response){
            $('#loading').addClass('invisible');
            $("#btn_save").attr("disabled", false); 
            console.log(response.responseJSON.errors);

            var errors = response.responseJSON.errors;
            var first_name_error_msg = response.responseJSON.errors.first_name;
            var last_name_error_msg = response.responseJSON.errors.last_name;
            var username_error_msg = response.responseJSON.errors.username;
            var email_error_msg = response.responseJSON.errors.email;
            var password_error_msg = response.responseJSON.errors.password;
            var role_error_msg = response.responseJSON.errors.role_id;
            
            
            //first_name
            if(errors.hasOwnProperty('first_name')){
                $('#first_name_error').text(first_name_error_msg)
            }else{
                $('#first_name_error').text('')  
            }

            //last_name
            if(errors.hasOwnProperty('last_name')){
                $('#last_name_error').text(last_name_error_msg)
            }else{
                $('#last_name_error').text('')  
            }

            //username
            if(errors.hasOwnProperty('username')){
                $('#username_error').text(username_error_msg)
            }else{
                $('#username_error').text('')  
            }
            
            //email
            if(errors.hasOwnProperty('email')){
                $('#email_error').text(email_error_msg)
            }else{
                $('#email_error').text('')  
            }

            //password
            if(errors.hasOwnProperty('password')){
                $('#password_error').text(password_error_msg)
            }else{
                $('#password_error').text('')  
            }

            //role
            if(errors.hasOwnProperty('role_id')){
                $('#role_error').text(role_error_msg)
            }else{
                $('#role_error').text('')  
            }
         }
      });

});

</script>

@endsection