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
        <h5> Property Viewing Appointments </h5>
    </div>
 
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Location</th>
              <th scope="col">Preferred date and time</th>
              <th scope="col">Date created</th>
              <th scope="col">Appointment status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($appointments as $appointment)
            <tr>
              <th scope="row">{{$appointment->id}}</th>
              <td>{{$appointment->property->house_number}}, {{$appointment->property->street}}, {{$appointment->property->city}}. {{$appointment->property->postcode}}</td> 
              <td>{{$appointment->preferred_date}} | {{$appointment->preferred_time}}</td>
              <td>{{$appointment->created_at}}</td>
              <td> 
                @if($appointment->status == 1)
                  <span class="badge badge-pill badge-primary"> Completed</span>
                @elseif($appointment->status == 2)
                  <span class="badge badge-pill badge-danger"> Cancelled</span>
                @else
                <span class="badge badge-pill badge-warning"> Awaiting completion </span>
                @endif
              </td>
              <td> <a href="{{route('getAppointmentDetails',$appointment->id)}}" class="btn btn-success"> View  </a> </td> 
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>


@endsection

