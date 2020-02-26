@extends('backoffice.layouts.master')
@section('content')
<div class="row">
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
</div>
<h1> DASHBOARD </h1>

@endsection