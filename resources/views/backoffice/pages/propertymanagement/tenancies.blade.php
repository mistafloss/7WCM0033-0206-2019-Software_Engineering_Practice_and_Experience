@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    @if(Session::has('tenancySuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('tenancySuccess')}}
        </div>
    @endif
    <div class="float-left">
        <h5> Tenancies </h5>
    </div>
    <span class="float-right">
        <a href="{{route('addNewTenancy')}}" class="btn btn-primary">+ Add New Tenancy</a>
    </span>
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Property Location</th>
              <th scope="col">Rent (PCM)</th>
              <th scope="col">Start date</th>
              <th scope="col">End date</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($properties as $property)
                @if(!empty($property->tenancies))
                    @foreach($property->tenancies as $tenancy)
                    <tr>
                        <th scope="row">{{$tenancy->id}}</th>
                        <td>{{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</td>
                        <td>£{{$property->property_price}}</td>
                        <td>{{ \Carbon\Carbon::parse($tenancy->start_date)->format('d/m/Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($tenancy->end_date)->format('d/m/Y')}}</td>
                        <td>
                            @if($tenancy->status == 1)
                            <span class="badge badge-pill badge-success"> Active</span>
                            @else
                            <span class="badge badge-pill badge-danger"> Expired </span>
                            @endif
                        </td>
                        <td> <a href="{{route('showTenancy',$tenancy->id)}}" class="btn btn-success"> View </a> </td> 
                    </tr>
                    @endforeach
                @endif    
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