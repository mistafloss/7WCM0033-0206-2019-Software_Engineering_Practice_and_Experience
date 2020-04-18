@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    @if(Session::has('partnerSuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('partnerSuccess')}}
        </div>
    @endif
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
          @foreach($partners as $partner)
            <tr>
              <th scope="row">{{$partner->id}}</th>
              <td>{{$partner->first_name}}</td>
              <td>{{$partner->last_name}}</td> 
              <td>{{$partner->category->name}}</td>
              <td> 
                @if($partner->status == 1)
                  <span class="badge badge-pill badge-primary"> YES</span>
                @else
                  <span class="badge badge-pill badge-danger"> NO</span>
                @endif
              </td>
              <td> <a href="{{route('showPartner', $partner->id)}}" class="btn btn-success"> Edit </a> </td> 
            </tr>
          @endforeach  
          </tbody>
        </table>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/properties.js') }}"></script> 
@endsection