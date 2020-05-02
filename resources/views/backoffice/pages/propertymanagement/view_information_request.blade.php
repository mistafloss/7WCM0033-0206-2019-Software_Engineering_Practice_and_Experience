@extends('backoffice.layouts.master')
@section('content')

<div class="container">
    <div class="card mt-10">
            @if(Session::has('enquiryUpdateSuccess'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    {{Session::get('enquiryUpdateSuccess')}}
                </div>
            @endif
        <div class="card-header">
            <div class="float-left">
                <h5> Property enquiry details </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p>
                        <strong> Property details </strong><br/>
                        <span>{{$enquiry->property->listing_title}}</span><br/>
                        <span>{{$enquiry->property->house_number}}, {{$enquiry->property->street}}, 
                        {{$enquiry->property->city}}. {{$enquiry->property->postcode}}</span><br/>
                        <span> £{{$enquiry->property->property_price}} {{$enquiry->property->payment_frequency == 'Monthly' ? 'pm' : '' }}</span><br/>
                        <span><strong>Description</strong><br/>
                        <span> {!!$enquiry->property->description!!}</span><br/>
                        <span><strong>Features</strong></span>
                        <span>{!!$enquiry->property->features!!}</span><br/>

                    </p>
                    
                </div>
                <div class="col">
                    <p>
                       <strong>Property Information request details </strong><br/>
                       <span>Enquirer name: {{$enquiry->first_name}} {{$enquiry->last_name}}</span><br/>
                       <span>Email: {{$enquiry->email}}</span><br/>
                       <span>Phone: {{$enquiry->phone}}</span><br/>  
                       <span> Enquiry text:</span><br/>
                       <span>{{$enquiry->enquiry}}</span>
                     </p> 
                </div>
            </div>
        </div>
        <div class="card-footer">
            @if($enquiry->status == 0)
                <form action="{{route('changeEnquiryStatus')}}" method="POST" class="float-left mr-2">
                    <input type="hidden" name="id" value="{{$enquiry->id}}"/>
                    <input type="hidden" name="status" value="1"/>
                    {{csrf_field()}}
                    <button class="btn btn-success" type="submit" id="btn_complete_appt">Mark as complete</button>
                 </form>     
             @else
             <button class="btn btn-warning" disabled id="btn_complete_appt">Enquiry response completed</button>
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