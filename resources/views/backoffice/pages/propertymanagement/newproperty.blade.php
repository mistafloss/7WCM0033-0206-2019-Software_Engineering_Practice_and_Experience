@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
    <form id="createPropertyForm" enctype="multipart/form-data" method="POST">    
        <div class="card mt-10">
            <div class="card-header">
                <div class="float-left">
                    <h5> Add New Property</h5>
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
                                <input type="text" class="form-control" id="listingTitle" name="listing_title" placeholder="">
                                <span class="text-danger" id="listingTitle_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="">House number</label>
                                <input type="text" class="form-control" id="houseNumber" name="house_number" placeholder="">
                                <span class="text-danger" id="houseNumber_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Street</label>
                                <input type="text" class="form-control" id="street" name="street" placeholder="">
                                <span class="text-danger" id="street_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="">
                                <span class="text-danger" id="city_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Post Code</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="">
                                <span class="text-danger" id="postcode_error"> </span>
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
                                <textarea class="form-control tiny-textarea" id="propertyFeatures" name="property_features" rows="4"></textarea>
                                <span class="text-danger" id="propertyFeatures_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control tiny-textarea" id="propertyDescription" name="property_description" rows="4"></textarea>
                                <span class="text-danger" id="propertyDescription_error"> </span>
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
                                    <option value="">--Select Property Type--</option>
                                    <option value="1">Bungalow</option>
                                </select>
                                <span class="text-danger" id="propertyType_error"> </span>
                            </div>
                            <div class="form-group">
                                <label for="">Property Price</label>
                                <input type="text" class="form-control" id="propertyPrice" name="property_price" placeholder="">
                                <span class="text-danger" id="propertyPrice_error"> </span>
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Property Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="property_status" id="propertyStatusSale" value="For Sale">
                                <label class="form-check-label" for="propertyStatusSale">For Sale</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="property_status" id="propertyStatusRent" value="To Let">
                                <label class="form-check-label" for="propertyStatusSale">For Rent</label>
                            </div>
                            <span class="text-danger" id="propertyStatus_error"> </span>
                        </div>

                        <div class="form-group">
                            <label for="">Publish Property on Website</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publish_property" id="publishPropertyYes" value="1">
                                <label class="form-check-label" for="publishPropertyYes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="publish_property" id="publishPropertyNo" value="0">
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
                    <div class="col colPropertyImageControls">
                        <label for="">Upload Property Images</label>
                        <div class="input-group property-image">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="propertyImages" name="property_images[]" multiple >
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
                <div class="loading">
                    <div class="spinner-border text-dark" role="status">
                    </div>
                    <span>Please wait...</span>
                </div>
                <input type="hidden" value="{{route('API_createProperty')}}" id="actionUrl" />
                <button type="submit" style="width:50%; float:right;" class="btn btn-success" id="btn_save_property"> <i class="far fa-save"></i> Save Property</button>
            </div>
        </div>
    </form>
    <!-- CARD END -->
</div>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/u172uoi4atzuwml8mdg1mmll9ju6rlj6h74g30lbqcn160xv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/properties.js') }}"></script> 
<script>
      tinymce.init({
        selector: '.tiny-textarea'
      });
    </script>
@endsection