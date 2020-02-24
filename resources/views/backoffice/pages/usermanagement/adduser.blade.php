@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
    <div class="card-header">
       ADD USER
      <span class="float-right">
        <button id="btn_save" class="btn btn-success"> Save</button>
        <a href="#" class="btn btn-danger"> Cancel </a>
      </span>
    </div>
    <div class="card-body">
        <form class="form-signin col-sm">
            <div class="form-group invisible" id="loading">
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
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control" id="role_id" name="role_id">
                    <option>--Select User Role--</option>
                    <option value="1"> Developer </option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <input type="hidden" value="{{route('API_userCreate')}}" id="action_url" />
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
         },
         error: function(response){
            $('#loading').addClass('invisible');
            $("#btn_save").attr("disabled", false); 
         }
      });

});

</script>

@endsection