@extends('backoffice.layouts.master')
@section('content')

<div class="container">
                @if($appointment->status == 1)
                    <div class="alert alert-success mt-10">
                        This viewing appointment has been completed
                    </div>
                    @elseif($appointment->status == 2)
                    <div class="alert alert-success">
                        This viewing appointment was cancelled
                    </div>
                @endif
    <div class="card mt-10">
            @if(Session::has('apptUpdateSuccess'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{Session::get('apptUpdateSuccess')}}
                </div>
            @endif
        <div class="card-header">
            <div class="float-left">
                <h5> Appointment details </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p>
                        <strong> Property details </strong><br/>
                        <span>{{$appointment->property->listing_title}}</span><br/>
                        <span>{{$appointment->property->house_number}}, {{$appointment->property->street}}, 
                        {{$appointment->property->city}}. {{$appointment->property->postcode}}</span><br/>
                    </p>
                    <p>
                       <strong> Appointment details </strong><br/>
                       <span>Enquirer name: {{$appointment->first_name}} {{$appointment->last_name}}</span><br/>
                       <span>Email: {{$appointment->email}}</span><br/>
                       <span>Phone: {{$appointment->phone}}</span><br/>
                       <span>Preferred date and time for appointment: {{$appointment->preferred_date}} | {{$appointment->preferred_time}}</span><br/>  
                       <span> Additional information:</span><br/>
                       <span>{{$appointment->additional_information}}</span>
                     </p>  
                </div>
                <div class="col">
                @if($appointment->status == 0)
                    <div class="form-group">
                   
                        <label for="">Note</label>
                        <textarea class="form-control" id="note"></textarea>
                        <span class="text-danger" id="note_error"> </span>
                    </div>
                    <div class="form-group">
                        <div class="loading">
                            <div class="spinner-border text-dark" role="status">
                            </div>
                            <span>Please wait...</span>
                        </div>
                        <input type="hidden" id="property_appt_id" value="{{$appointment->id}}"/>
                        <input type="hidden" id="add_note_url" value="{{route('API_addViewAppointmentNote')}}"/>
                        <button type="button" class="btn btn-primary btn-sm" id="btn_add_note">Add note</button>
                    </div>
                    @endif
                    <div class="" id="notesList">
                        <p><strong>Notes</strong></p>
                        <ul>
                            @foreach($appointment->notes as $note)
                                <li> {{$note->note}} | <span class="text-danger">{{$note->created_at}}</span> </li>
                            @endforeach
                        </ul>    
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if($appointment->status == 0)
                <form action="{{route('changeAppointmentStatus')}}" method="POST" class="float-left mr-2">
                    <input type="hidden" name="id" value="{{$appointment->id}}"/>
                    <input type="hidden" name="status" value="1"/>
                    {{csrf_field()}}
                    <button class="btn btn-success" type="submit" id="btn_complete_appt">Complete appointment</button>
                 </form>   
                 <form action="{{route('changeAppointmentStatus')}}" method="POST">
                    <input type="hidden" name="id" value="{{$appointment->id}}"/>
                    <input type="hidden" name="status" value="2"/>
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit" id="btn_cancel_appt">Cancel appointment</button>
                 </form>   
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

  $('#btn_add_note').click(function(e){
    e.preventDefault(e);
    $('.loading').css('display','block');
    $("#btn_add_note").attr("disabled", true);
    $.ajax({
           type:'POST',
           url:$('#add_note_url').val(),
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           data:{
               note: $('#note').val(),
               property_appointment_id:$('#property_appt_id').val(),
              
           },
           success:function(response){
              $('.loading').css('display','none');
              $("#btn_add_note").attr("disabled", false); 
              console.log(response);
              var notesList = $('#notesList');
              var newNote = '<li>' + response.data.note + " | <span class='text-danger'>"+ response.data.created_at + '</span></li>';
              notesList.append('<ul>'+newNote+'</ul>');
           },
           error: function(response){
            $('.loading').css('display','none');
              $("#btn_add_note").attr("disabled", false); 
              console.log(response.responseJSON.errors);
              var errors = response.responseJSON.errors;
              var note_error_msg = response.responseJSON.errors.note;
              //name
              if(errors.hasOwnProperty('note')){
                  $('#note_error').text(note_error_msg);
              }else{
                  $('#note_error').text('');  
              }
           }
    });
  
  });
  </script>
@endsection