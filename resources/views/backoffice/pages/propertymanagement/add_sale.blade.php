@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
        <form action="{{route('completePropertyPurchase')}}" method="POST">
            <div class="card mt-10">
                <div class="card-header">
                    <div class="float-left">
                        <h5> Add New Property Sale</h5>
                    </div>
                    <span class="float-right">
                        <a href="{{route('getSales')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Sales</a>
                    </span>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Select Property*</label>
                            <select name="property_id" class="form-control" id="">
                                <option value="">--Select Property--</option>
                                @foreach($propertiesForSale as $property)
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
                    </div>

                   <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Select Seller*</label>
                            <select name="seller_id" class="form-control" id="">
                                <option value="">--Select Seller--</option>
                                @foreach($sellers as $seller)
                                    @if (old('seller_id') == $seller->id)
                                        <option value="{{ $seller->id }}" selected>{{$seller->first_name}} {{$seller->last_name}}</option>
                                    @else
                                        <option value="{{ $seller->id }}">{{$seller->first_name}} {{$seller->last_name}}</option>
                                    @endif
                                @endforeach   
                            </select>
                            <span class="text-danger"> 
                                @if($errors->has('seller_id'))
                                    {{ $errors->first('seller_id') }}
                                @endif
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Select Buyer*</label>
                            <select name="buyer_id" class="form-control" id="">
                                <option value="">--Select Buyer--</option>
                                @foreach($buyers as $buyer)
                                    @if (old('buyer_id') == $buyer->id)
                                        <option value="{{ $buyer->id }}" selected>{{$buyer->first_name}} {{$buyer->last_name}}</option>
                                    @else
                                        <option value="{{ $buyer->id }}">{{$buyer->first_name}} {{$buyer->last_name}}</option>
                                    @endif
                                @endforeach   
                            </select>
                            <span class="text-danger"> 
                                @if($errors->has('buyer_id'))
                                    {{ $errors->first('buyer_id') }}
                                @endif
                            </span>
                        </div>
                   </div>

                   

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Date of sale*</label>
                            <input type="text" class="datepicker form-control" name="date_sold" value="{{ old('date_sold') }}">
                            <span class="text-danger"> 
                                @if($errors->has('date_sold'))
                                    {{ $errors->first('date_sold') }}
                                @endif
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                       
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{csrf_field()}}
                    <button type="submit" style="width:50%; float:right;" class="btn btn-success" id=""> <i class="far fa-save"></i> Activate Property Purchase </button>
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