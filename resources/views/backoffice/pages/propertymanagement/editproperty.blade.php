@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
    <form action="{{route('updateProperty')}}" enctype="multipart/form-data" method="POST">    
        <div class="card mt-10">
            <div class="card-header">
                <div class="float-left">
                    <h5> Edit Property - {{$property->house_number}} {{$property->street}}, {{$property->city}}. {{$property->postcode}}</h5>
                </div>
                <span class="float-right">
                    <a href="{{route('propertyIndex')}}" class="btn btn-danger"> <i class="far fa-arrow-alt-circle-left"></i>Back to Property Listing</a>
                </span>
            </div>

            <div class="card-body">
                <!-- ROW -->
                <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Listing Title</label>
                                <input type="text" class="form-control" id="listingTitle" name="listing_title" value="{{$property->listing_title}}">
                                <span class="text-danger"> 
                                    @if($errors->has('listing_title'))
                                        {{ $errors->first('listing_title') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">House number</label>
                                <input type="text" class="form-control" id="houseNumber" name="house_number" value="{{$property->house_number}}">
                                <span class="text-danger"> 
                                    @if($errors->has('house_number'))
                                        {{ $errors->first('house_number') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Street</label>
                                <input type="text" class="form-control" id="street" name="street" value="{{$property->street}}">
                                <span class="text-danger"> 
                                    @if($errors->has('street'))
                                        {{ $errors->first('street') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{$property->city}}">
                                <span class="text-danger"> 
                                    @if($errors->has('city'))
                                        {{ $errors->first('city') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Post Code</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" value="{{$property->postcode}}">
                                <span class="text-danger"> 
                                    @if($errors->has('postcode'))
                                        {{ $errors->first('postcode') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Country</label>
                                <select class="form-control" id="country" name="country">
                                    <option value="United Kingdom"> United Kingdom </option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Features</label>
                                <textarea class="form-control tiny-textarea" id="propertyFeatures" name="property_features" rows="4">{{$property->features}}</textarea>
                                <span class="text-danger"> 
                                    @if($errors->has('property_features'))
                                        {{ $errors->first('property_features') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control tiny-textarea" id="propertyDescription" name="property_description" rows="4">{{$property->description}}</textarea>
                                <span class="text-danger">
                                    @if($errors->has('property_description'))
                                        {{ $errors->first('property_description') }}
                                    @endif
                                </span>
                            </div>
                            
                        </div>
                </div>
                <!-- ROW END -->
                <hr/>
                <!-- ROW -->
                <div class="row">
                    <div class="col">
                            <div class="form-group">
                                <label for="">Property Type</label>
                                <select class="form-control" id="propertyType" name="property_category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"  {{ $property->property_category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                    @endforeach    
                                </select>
                                <span class="text-danger">
                                    @if($errors->has('property_category_id'))
                                        {{ $errors->first('property_category_id') }}
                                    @endif
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Property Price (£)</label>
                                <input type="text" class="form-control" id="propertyPrice" name="property_price" value="{{$property->property_price}}">
                                <span class="text-danger">
                                    @if($errors->has('property_price'))
                                        {{ $errors->first('property_price') }}
                                    @endif
                                </span>
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Property Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="property_status" id="propertyStatusSale" value="For Sale" @if($property->status == 'For Sale') checked="true" @endif>
                                <label class="form-check-label" for="propertyStatusSale">For Sale</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="property_status" id="propertyStatusRent" value="To Let" @if($property->status == 'To Let') checked="true" @endif>
                                <label class="form-check-label" for="propertyStatusSale">For Rent</label>
                            </div>
                            <span class="text-danger" id="propertyStatus_error"> </span>
                        </div>

                        <div class="form-group">
                            <label for="">Publish Property on Website</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publish_property" id="publishPropertyYes" value="1" @if($property->visibility == '1') checked="true" @endif>
                                <label class="form-check-label" for="publishPropertyYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publish_property" id="publishPropertyNo" value="0" @if($property->visibility == '0') checked="true" @endif>
                                <label class="form-check-label" for="publishPropertyNo">No</label>
                            </div>
                            <span class="text-danger" id="publishProperty_error"> </span>
                        </div>

                    </div>
                </div>
                <hr/>
                <!-- ROW END -->

                <!--ROW -->
                <div class="row">
                    <div class="col">
                        <label for="">Uploaded Property Images</label><br/>
                            <!-- @if(Session::has('imageDeleteSuccess'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{Session::get('imageDeleteSuccess')}}
                                </div>
                            @endif -->
                        @foreach($property->images as $image)
                            <img src="{{$image->image_url}}"  width="150px;" height="100px">
                            <a class="btn btn-danger" data-imageid="{{$image->id}}" href="#" class="" data-toggle="modal" data-target="#deleteImageModal"><i class="far fa-trash-alt"></i></a>
                        @endforeach
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col colPropertyImageControls">
                        <label for="">Upload More Property Images</label>
                        <div class="input-group property-image">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="propertyImages" name="property_images[]" multiple accept="image/*" >
                                    <label class="custom-file-label" for="propertyImage">Choose file...</label>
                                </div>
                                <!-- <span class="input-group-append">
                                    <a class="btn btn-outline-danger removeImageUpload"><i class="far fa-minus-square"></i></a>
                                </span> -->
                        </div>
                        <span class="text-danger" id="propertyImages_error"> </span>
                    </div>

                    <div class="col">
                            <!-- <a class="btn btn-outline-primary" id="btnAddPropertyImageUpload"><i class="far fa-plus-square"></i></a>  -->
                            <label for="">Selected Images</label>
                            <div id="selectedImagesList">

                            </div>
                    </div>
                </div>
                <!-- ROW END -->
            </div>

            <div class="card-footer">
                <input type="hidden" value="{{$property->id}}" name="property_id" />
                {{csrf_field()}}
                <button type="submit" style="width:50%; float:right;" class="btn btn-success" id="btn_save_property"> <i class="far fa-save"></i> Update Property</button>
            </div>
        </div>
    </form>
    <!-- CARD END -->
</div>

<!--Delete Image Modal -->
<div class="modal fade" id="deleteImageModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this property image?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form action="{{route('deleteImage')}}" method="post">
        {{csrf_field()}}
      <div class="modal-body">
         By clicking continue, you permanently remove this photo. This action cannot be undone.
         <input type="hidden" name="image_id" id="image_id" value=""/>
         <input type="hidden" name="property_id" value="{{$property->id}}"/>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Continue</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/u172uoi4atzuwml8mdg1mmll9ju6rlj6h74g30lbqcn160xv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/edit_property.js') }}"></script> 
<script>
      tinymce.init({
        selector: '.tiny-textarea',
        plugins: [
        "advlist lists"
        ],
        toolbar: "undo redo | bold italic underline strikethrough | bullist numlist | fontselect fontsizeselect formatselect",
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
      });
    </script>
@endsection