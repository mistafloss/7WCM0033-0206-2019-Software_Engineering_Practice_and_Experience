@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    <!-- @if(Session::has('propetyUpdateSuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('propetyUpdateSuccess')}}
        </div>
    @endif -->
    <div class="float-left">
        <h5> Partners</h5>
    </div>
    <span class="float-right">
        <a href="{{route('addNewPartner')}}" class="btn btn-primary">+ Add New Partner</a>
    </span>
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Partner Category</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          
            <tr>
              <th scope="row">2</th>
              <td>John</td>
              <td>Doe</td> 
              <td>Tenant</td>
              <td> <span class="badge badge-pill badge-primary"> Yes</span></td>
              <td> <a href="" class="btn btn-success"> Edit </a> </td> 
            </tr>
          </tbody>
        </table>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/properties.js') }}"></script> 
@endsection