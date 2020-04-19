@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
        <form>
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
                            <label for="">Select Property</label>
                            <select name="property_id" class="form-control" id="">
                                <option value="">--Select Property--</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</option>
                                @endforeach   
                            </select>
                            <span class="text-danger"> 
                                @if($errors->has('property_id'))
                                    {{ $errors->first('property_id') }}
                                @endif
                            </span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Select Principal Tenant</label>
                            <select name="partner_id" class="form-control" id="">
                                <option value="">--Select Principal Tenant--</option>
                                @foreach($partners as $partner)
                                    <option value="{{ $partner->id }}">{{$partner->first_name}} {{$partner->last_name}}</option>
                                @endforeach   
                            </select>
                            <span class="text-danger"> 
                                @if($errors->has('partner_id'))
                                    {{ $errors->first('partner_id') }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </form>
    <!-- END CARD -->
</div>

@endsection