@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    @if(Session::has('apptUpdateSuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('apptUpdateSuccess')}}
        </div>
    @endif
    <div class="float-left">
        <h5> Property Information Requests </h5>
    </div>
 
  </div>
  <div class="card-body">
     <!-- DISPLAY IN ACCORDION with content inside acordion and button to say request processed. when that is clicked the status is changed and the request is removed fro the list -->
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/properties.js') }}"></script> 
@endsection