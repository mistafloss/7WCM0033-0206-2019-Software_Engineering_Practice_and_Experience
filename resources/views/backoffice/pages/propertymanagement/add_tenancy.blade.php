@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
        <form action="{{route('activateNewTenancy')}}" method="POST">
            <div class="card mt-10">
                <div class="card-header">
                    <div class="float-left">
                        <h5> Add New Tenancy</h5>
                    </div>
                    <span class="float-right">
                        <a href="{{route('getTenancies')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Tenancies</a>
                    </span>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Select Property*</label>
                            <select name="property_id" class="form-control" id="">
                                <option value="">--Select Property--</option>
                                @foreach($propertiesToLet as $property)
                                    @if (old('property_id') == $property->id)
                                        <option value="{{ $property->id }}" selected>{{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</option>
                                    @else
                                        <option value="{{ $property->id }}">{{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</option>
                                    @endif
                                @endforeach   
                            </select>
                            <span class="text-danger"> 
                                @if($errors->has('property_id'))
                                    {{ $errors->first('property_id') }}
                                @endif
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Select Principal Tenant*</label>
                            <select name="partner_id" class="form-control" id="">
                                <option value="">--Select Principal Tenant--</option>
                                @foreach($partners as $partner)
                                    @if (old('partner_id') == $partner->id)
                                        <option value="{{ $partner->id }}" selected>{{$partner->first_name}} {{$partner->last_name}}</option>
                                    @else
                                        <option value="{{ $partner->id }}">{{$partner->first_name}} {{$partner->last_name}}</option>
                                    @endif
                                @endforeach   
                            </select>
                            <span class="text-danger"> 
                                @if($errors->has('partner_id'))
                                    {{ $errors->first('partner_id') }}
                                @endif
                            </span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Start date*</label>
                            <input type="text" class="datepicker form-control" name="start_date" value="{{ old('start_date') }}">
                            <span class="text-danger"> 
                                @if($errors->has('start_date'))
                                    {{ $errors->first('start_date') }}
                                @endif
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">End date*</label>
                            <input type="text" class="datepicker form-control" name="end_date" value="{{ old('end_date') }}">
                            <span class="text-danger"> 
                                @if($errors->has('end_date'))
                                    {{ $errors->first('end_date') }}
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Deposit amount(£)*</label>
                            <input type="text" class="form-control" name="deposit" value="{{ old('deposit') }}">
                            <span class="text-danger"> 
                                @if($errors->has('deposit'))
                                    {{ $errors->first('deposit') }}
                                @endif
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    {{csrf_field()}}
                    <button type="submit" style="width:50%; float:right;" class="btn btn-success" id=""> <i class="far fa-save"></i> Activate Tenancy</button>
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