@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
        <form action="{{route('updateTenancy')}}" method="POST">
            <div class="card mt-10">
                <div class="card-header">
                    <div class="float-left">
                         @if($tenancy->status == 1)<h5> Update Tenancy</h5>@else<h5> Expired Tenancy</h5>@endif
                    </div>
                    <span class="float-right">
                        <a href="{{route('getTenancies')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Tenancies</a>
                    </span>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for=""><strong>Property details</strong></label>
                           <p> {{$tenancy->property->listing_title}}</p>
                           <p> {{$tenancy->property->house_number}}, {{$tenancy->property->street}}, 
                               {{$tenancy->property->city}}, {{$tenancy->property->postcode}}.</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Principal Tenant</label>
                            @if($tenancy->status == 1)
                                <select name="partner_id" class="form-control" id="">
                                        @foreach($partners as $partner)
                                            <option value="{{ $partner->id }}"  {{ $tenancy->partner_id == $partner->id ? 'selected' : '' }}>{{$partner->first_name}} {{$partner->last_name}}</option>
                                        @endforeach    
                                </select>
                                <span class="text-danger"> 
                                    @if($errors->has('partner_id'))
                                        {{ $errors->first('partner_id') }}
                                    @endif
                                </span>
                            @else
                            <input type="text" readonly class="form-control" name="" value="{{$tenancy->partner->first_name}} {{$tenancy->partner->last_name}}">
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Start date</label>
                            <input type="text" readonly class="form-control" name="start_date" value="{{ $tenancy->start_date }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">End date</label>
                            @if($tenancy->status == 1)
                                <input type="text" class="datepicker form-control" name="end_date" value="{{ $tenancy->end_date }}">
                                <span class="text-danger"> 
                                    @if($errors->has('end_date'))
                                        {{ $errors->first('end_date') }}
                                    @endif
                                </span>
                            @else
                                <input type="text" readonly class="form-control" name="" value="{{ $tenancy->end_date }}">
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Deposit amount(£)</label>
                            <input type="text" readonly class="form-control" name="deposit" value="{{ $tenancy->deposit }}">
                        </div>
                        <div class="form-group col-md-6">
                            @if($tenancy->status == 1)
                                <label for="">Change tenancy status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusActive" value="1" @if($tenancy->status == '1') checked="true" @endif>
                                    <label class="form-check-label" for="statusActive">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="statusExpired" value="0" @if($tenancy->status == '0') checked="true" @endif>
                                    <label class="form-check-label" for="statusActive">No</label>
                                    
                                    <span class="text-danger"> 
                                        Selecting this option expires the tenancy agreement. The action cannot be undone.
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{csrf_field()}}
                    <input type="hidden" value="{{$tenancy->id}}" name="tenancy_id" />
                    <input type="hidden" value="{{$tenancy->property_id}}" name="property_id" />
                    @if($tenancy->status == 1)
                        <button type="submit" style="width:50%; float:right;" class="btn btn-success" id=""> <i class="far fa-save"></i> Update Tenancy</button>
                    @else
                        <button type="button" class="btn btn-lg btn-danger" disabled>This tenancy has expired</button>
                    @endif    
                </div>
            </div>
        </form>
    <!-- END CARD -->
</div>

@endsection

@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
    });
  });
  </script>

@endsection