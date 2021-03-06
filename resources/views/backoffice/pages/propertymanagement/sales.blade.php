@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    @if(Session::has('saleSuccess'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('saleSuccess')}}
        </div>
    @endif
    <div class="float-left">
        <h5> Sales </h5>
    </div>
    <span class="float-right">
        <a href="{{route('addNewSale')}}" class="btn btn-primary">+ Add New Property Sale</a>
    </span>
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Property Location</th>
              <th scope="col">Amount(£)</th>
              <th scope="col">Status</th>
              <th scope="col">Date Sold</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <th scope="row">{{$sale->id}}</th>
                        <td>{{$sale->property->house_number}}, {{$sale->property->street}}, {{$sale->property->city}}. {{$sale->property->postcode}}</td>
                        <td>£{{$sale->property->property_price}}</td>
                        <td>
                            @if($sale->status == 1)
                            <span class="badge badge-pill badge-success"> Completed</span>
                            @else
                            <span class="badge badge-pill badge-danger"> Unlocked </span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($sale->date_sold)->format('d/m/Y')}}</td>
                        <td> <a href="{{route('showSale',$sale->id)}}" class="btn btn-success"> View </a> </td> 
                    </tr>
                @endforeach
          </tbody>
        </table>
  </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('js/properties.js') }}"></script> 
@endsection