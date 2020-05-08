@extends('website.layouts.master')
@section('content')

<main role="main">
    <div class="container">
     <a href="{{route('propertyDetails',$data['id'])}}"><< Back to Property details</a>
        <div class="card mt-2">
        
            <h5 class="card-header text-center">Property information request</h5>
            <div class="card-body">
                    @if(Session::has('requestPropInfoSuccess'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            {{Session::get('requestPropInfoSuccess')}}
                        </div>
                    @endif
                <h5 class="card-title text-center">Enter the details below and an agent will contact you </h5>
                <form method="POST" action="{{route('postRequestPropertyInformation')}}">
                    <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First name</label>
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
                                <div class="form-group">
                                    <label for="">Enquiry</label>
                                    <textarea class="form-control" name="enquiry"></textarea>
                                    <span class="text-danger"> 
                                        @if($errors->has('enquiry'))
                                            {{ $errors->first('enquiry') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for=""><strong>Property details</strong></label><br/>
                                        <span class="text-primary">{{$property->listing_title}}</span><br/>
                                        <span> {{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</span><br/> 
                                        <span> £{{$property->property_price}}{{$property->payment_frequency == 'Monthly' ? 'pm' : '' }}</span>
                                </div>
                                    @foreach($property->images as $image)
                                        @if ($loop->first)
                                                <img src="{{$image->image_url}}" class="card-img" alt="...">
                                            @break
                                        @endif    
                                    @endforeach
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$data['id']}}" name="property_id"/>
                    <input type="hidden" value="{{$data['property_status']}}" name="property_status"/>
                    <input type="submit" class="btn btn-success btn-block" value="Request Property Details" /> 
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