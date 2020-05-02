@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    @if(Session::has('enquiryUpdateSuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('enquiryUpdateSuccess')}}
        </div>
    @endif
    <div class="float-left">
        <h5> Property Information Requests </h5>
    </div>
 
  </div>
  <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Property Location</th>
              <th scope="col">Date created</th>
              <th scope="col">Enquiry status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($enquiries as $enquiry)
            <tr>
              <th scope="row">{{$enquiry->id}}</th>
              <td>{{$enquiry->property->house_number}}, {{$enquiry->property->street}}, {{$enquiry->property->city}}. {{$enquiry->property->postcode}}</td> 
              <td>{{$enquiry->created_at}}</td>
              <td> 
                @if($enquiry->status == 1)
                  <span class="badge badge-pill badge-primary"> Response completed</span>
                @else
                <span class="badge badge-pill badge-warning"> Awaiting Response from agenet </span>
                @endif
              </td>
              <td> <a href="{{route('getEnquiryDetails',$enquiry->id)}}" class="btn btn-success"> View  </a> </td> 
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>


@endsection

@section('scripts')
<script src></script> 
@endsection