@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    @if(Session::has('propertyUpdateSuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('propertyUpdateSuccess')}}
        </div>
    @endif
    <div class="float-left">
        <h5> Listed Properties</h5>
    </div>
    <span class="float-right">
        <a href="{{route('addNewProperty')}}" class="btn btn-primary">+ Add New Property</a>
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
            @foreach($properties as $property)
            <tr>
              <th scope="row">{{$property->id}}</th>
              <td>{{$property->category->name}}</td>
              <td>{{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</td> 
              <td>{{$property->status}}</td>
              <td> 
                @if($property->visibility == 1 && ($property->status == 'To Let' || $property->status == 'For Sale'))
                  <span class="badge badge-pill badge-primary"> YES</span>
                @else
                  <span class="badge badge-pill badge-danger"> NO</span>
                @endif
              </td>
              <td> @if($property->status == 'To Let' || $property->status == 'For Sale')
                      <a href="{{route('showProperty',$property->id)}}" class="btn btn-success"> Edit </a> 
                    @endif
              </td> 
            </tr>
            @endforeach
            <!-- <tr>
              <th scope="row">2</th>
              <td>House</td>
              <td>Nile Road, Southampton. SO32 5AD </td> 
              <td>For Rent</td>
              <td> <span class="badge badge-pill badge-danger"> NO</span></td>
              <td> <a href="" class="btn btn-primary"> View </a> | <a href="" class="btn btn-success"> Edit </a> </td> 
            </tr> -->
          </tbody>
        </table>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/properties.js') }}"></script> 
@endsection