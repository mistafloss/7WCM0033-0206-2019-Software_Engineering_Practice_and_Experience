@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    <div class="float-left">
        <h5> Listed Properties</h5>
    </div>
    <span class="float-right">
        <a href="#" class="btn btn-primary">+ Add New Property</a>
    </span>
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Property Type</th>
              <th scope="col">Location</th>
              <th scope="col">Status</th>
              <th scope="col">Is Active</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            
            <tr>
              <th scope="row">1</th>
              <td>Bungalow</td>
              <td>Nile Road, Southampton. SO32 5AD </td> 
              <td>For Sale</td>
              <td> <span class="badge badge-pill badge-primary"> YES</span></td>
              <td> <a href="" class="btn btn-primary"> View </a> | <a href="" class="btn btn-success"> Edit </a> </td> 
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>House</td>
              <td>Nile Road, Southampton. SO32 5AD </td> 
              <td>For Rent</td>
              <td> <span class="badge badge-pill badge-danger"> NO</span></td>
              <td> <a href="" class="btn btn-primary"> View </a> | <a href="" class="btn btn-success"> Edit </a> </td> 
            </tr>
          </tbody>
        </table>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/property_categories.js') }}"></script> 
@endsection