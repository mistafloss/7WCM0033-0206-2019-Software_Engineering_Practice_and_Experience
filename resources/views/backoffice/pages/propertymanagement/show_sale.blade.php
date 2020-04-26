@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
        <form action="" method="POST">
            <div class="card mt-10">
                <div class="card-header">
                    <div class="float-left">
                        <h5> Property Sale detail</h5>
                    </div>
                    <span class="float-right">
                        <a href="{{route('getSales')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Sales</a>
                    </span>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for=""><strong>Property details</strong></label>
                           <p> {{$sale->property->house_number}}, {{$sale->property->street}}, 
                               {{$sale->property->city}}, {{$sale->property->postcode}}.</p>
                               <p>£{{$sale->property->property_price}}</p>
                        </div>
                    </div>

                   <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for=""><strong>Seller Name</strong></label>
                            <p>{{$sale->seller->first_name}} {{$sale->seller->last_name}}</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""><strong>Buyer Name</strong></label>
                            <p>{{$sale->buyer->first_name}} {{$sale->buyer->last_name}}</p>
                        </div>
                   </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for=""><strong>Date of sale</strong></label>
                            <p>{{ \Carbon\Carbon::parse($sale->date_sold)->format('d/m/Y')}}</p>
                        </div>
                        <div class="form-group col-md-6">
                       
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{csrf_field()}}
                    <button type="submit" style="width:50%; float:right;" class="btn btn-success" id=""> <i class="far fa-save"></i> Unlock Property for re-sale</button>
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