@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
 <!-- CARD BEGIN -->
 <form id="addNewPartner" enctype="multipart/form-data" method="POST"> 
    <div class="card mt-10">
        <div class="card-header">
            <div class="float-left">
                <h5> Add New Partner</h5>
            </div>
            <span class="float-right">
                <a href="{{route('partnerIndex')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Partners </a>
            </span>
        </div>
        <div class="card-body">
        
        </div>
        <div class="card-footer">
        
        </div>
    </div>
 </form>

</div>

@endsection

@section('scripts')

<script src="{{ asset('js/add_property.js') }}"></script> 

@endsection