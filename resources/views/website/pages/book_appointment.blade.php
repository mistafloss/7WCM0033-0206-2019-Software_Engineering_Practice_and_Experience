@extends('website.layouts.master')
@section('content')

<main role="main">
    <div class="container">
        <div class="card mt-2">
            <h5 class="card-header text-center">Property viewing appointment request</h5>
            <form method="POST" action="{{route('bookPropertyAppointment')}}">
                <div class="card-body">
                    @if(Session::has('bookApptSuccess'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{Session::get('bookApptSuccess')}}
                        </div>
                    @endif
                    <h5 class="card-title text-center">Enter the details below and an agent will contact you with a confirmation</h5>
                    <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">First name</label>
                                    <input type="text" class="form-control" id="" name="first_name" value="{{ old('first_name') }}">
                                    <span class="text-danger"> 
                                        @if($errors->has('first_name'))
                                            {{ $errors->first('first_name') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Last name</label>
                                    <input type="text" class="form-control" id="" name="last_name" value="{{ old('last_name') }}">
                                    <span class="text-danger"> 
                                        @if($errors->has('last_name'))
                                            {{ $errors->first('last_name') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Email address</label>
                                    <input type="email" class="form-control" id="" name="email" value="{{ old('email') }}">
                                    <span class="text-danger"> 
                                        @if($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Telephone number</label>
                                    <input type="text" class="form-control" id="" name="phone" value="{{ old('phone') }}">
                                    <span class="text-danger"> 
                                        @if($errors->has('phone'))
                                            {{ $errors->first('phone') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Preferred date</label>
                                    <input type="text" class="datepicker form-control" name="preferred_date" value="{{ old('preferred_date') }}">
                                    <span class="text-danger"> 
                                        @if($errors->has('preferred_date'))
                                            {{ $errors->first('preferred_date') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Preferred time</label>
                                    <input type="text" class="timepicker form-control" name="preferred_time" value="{{ old('preferred_time') }}">
                                    <span class="text-danger"> 
                                        @if($errors->has('preferred_time'))
                                            {{ $errors->first('preferred_time') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Additional information</label>
                                    <textarea class="form-control" name="additional_information"></textarea>
                                    <span class="text-danger"> 
                                        @if($errors->has('additional_information'))
                                            {{ $errors->first('additional_information') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                    
                    </div>
                </div>
                <div class="card-footer">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$data['id']}}" name="property_id"/>
                    <input type="hidden" value="{{$data['status']}}" name="status"/>
                    <input type="submit" class="btn btn-success btn-block" value="Book Viewing" /> 
                </div>
            </form>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
    });

    $('input.timepicker').timepicker({
        interval: 60,
        minTime: '10',
        maxTime: '6:00pm',
        startTime: '10:00',
       
    });
  });
  </script>

@endsection