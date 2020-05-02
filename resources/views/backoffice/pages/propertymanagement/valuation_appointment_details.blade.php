@extends('backoffice.layouts.master')
@section('content')

<div class="container">
    <div class="card mt-10">
            @if(Session::has('valuationUpdateSuccess'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{Session::get('valuationUpdateSuccess')}}
                </div>
            @endif
        <div class="card-header">
            <div class="float-left">
                <h5> Property valuation appointment details </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p>
                       <strong>Appointment details </strong><br/>
                       <span>Enquirer name: {{$appointment->first_name}} {{$appointment->last_name}}</span><br/>
                       <span>Email: {{$appointment->email}}</span><br/>
                       <span>Phone: {{$appointment->phone}}</span><br/>  
                       <span>Postcode: {{$appointment->postcode}}</span><br/> 
                       <span>Type of Enquiry: {{$appointment->type_of_enquiry}}</span><br/> 
                       <span> Additional Information:</span><br/>
                       <span>{{$appointment->aditional_information}}</span>
                    </p>                     
                </div>
               
            </div>
        </div>
        <div class="card-footer">
            @if($appointment->status == 0)
                <form action="{{route('changeValuationStatus')}}" method="POST" class="float-left mr-2">
                    <input type="hidden" name="id" value="{{$appointment->id}}"/>
                    <input type="hidden" name="status" value="1"/>
                    {{csrf_field()}}
                    <button class="btn btn-success" type="submit" id="btn_complete_appt">Mark as complete</button>
                </form>     
             @else
                <button class="btn btn-warning" disabled id="btn_complete_appt">Appointment completed</button>
            @endif    
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    
  });
  </script>
@endsection