@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
 <!-- CARD BEGIN -->
 <form id="editPartner" enctype="multipart/form-data" method="POST" action="{{route('updatePartner')}}"> 
    <div class="card mt-10">
        <div class="card-header">
            <div class="float-left">
                <h5> Add New Partner</h5>
            </div>
            <span class="float-right">
                <a href="{{route('partnerIndex')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Partners </a>
            </span>
        </div>
        <form>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" id="" name="first_name" value="{{$partner->first_name}}">
                        <span class="text-danger"> 
                            @if($errors->has('first_name'))
                                {{ $errors->first('first_name') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" id="" name="last_name" value="{{$partner->last_name}}">
                        <span class="text-danger"> 
                            @if($errors->has('last_name'))
                                {{ $errors->first('last_name') }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="" name="email" value="{{$partner->email}}">
                        <!-- <span class="text-danger"> 
                            @if($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </span> -->
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Phone</label>
                        <input type="number" class="form-control" id="" name="phone" value="{{$partner->phone}}">
                        <span class="text-danger"> 
                            @if($errors->has('phone'))
                                {{ $errors->first('phone') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Partner Category</label>
                        <select name="partner_category_id" class="form-control" id="">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"  {{ $partner->partner_category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                            @endforeach   
                        </select>
                        <span class="text-danger"> 
                            @if($errors->has('partner_category_id'))
                                {{ $errors->first('partner_category_id') }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="">House number</label>
                        <input type="text" class="form-control" id="" name="house_number" value="{{$partner->house_number}}">
                        <span class="text-danger"> 
                            @if($errors->has('house_number'))
                                {{ $errors->first('house_number') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Street</label>
                        <input type="text" class="form-control" id="" name="street" value="{{$partner->street}}">
                        <span class="text-danger"> 
                            @if($errors->has('street'))
                                {{ $errors->first('street') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">City</label>
                        <input type="text" class="form-control" id="" name="city" value="{{$partner->city}}">
                        <span class="text-danger"> 
                            @if($errors->has('city'))
                                {{ $errors->first('city') }}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" id="" name="postcode" value="{{$partner->postcode}}">
                        <span class="text-danger"> 
                            @if($errors->has('postcode'))
                                {{ $errors->first('postcode') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Country</label>
                        <select name="country" class="form-control" id="">
                            <option value="United Kingdom"> United Kingdom </option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Uploaded documents</label><br/>
                       
                        @foreach($partner->documents as $document)
                        
                          <strong>{{$document->document_title}}</strong> : <a href="{{$document->document_url}}" target="_blank"> {{$document->document_file}}</a><br/>
                        @endforeach
                       
                    </div>
                    <div class="form-group col-md-6">
                            <label for="">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="partnerStatusYes" value="1" @if($partner->status == '1') checked="true" @endif>
                                <label class="form-check-label" for="partnerStatusYes">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="partnerStatusNo" value="0" @if($partner->status == '0') checked="true" @endif>
                                <label class="form-check-label" for="partnerStatusNo">Inactive</label>
                            </div>
                            <span class="text-danger" id="publishProperty_error"> </span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Update Proof of identity</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="proof_of_identity" name="proof_of_identity">
                            <label class="custom-file-label" for="proof_of_identity">Choose file...</label>
                        </div>
                        <div id="proof_of_identity_preview"></div>
                        <span class="text-danger"> 
                            @if($errors->has('proof_of_identity'))
                                {{ $errors->first('proof_of_identity') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Update Proof of address</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="proof_of_address" name="proof_of_address">
                            <label class="custom-file-label" for="proof_of_address">Choose file...</label>
                        </div>
                        <div id="proof_of_address_preview"></div>
                        <span class="text-danger"> 
                            @if($errors->has('proof_of_address'))
                                {{ $errors->first('proof_of_address') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{csrf_field()}}
                <input type="hidden" value="{{$partner->id}}" name="partner_id" />
                <button type="submit" style="width:50%; float:right;" class="btn btn-success" id="btn_save"> <i class="far fa-save"></i> Update Partner details </button>
            </div>
        </form>
    </div>
 </form>

</div>

@endsection

@section('scripts')

<script src="{{ asset('js/partner.js') }}"></script> 

@endsection