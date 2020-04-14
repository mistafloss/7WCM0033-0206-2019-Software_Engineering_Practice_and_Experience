@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
    <!-- CARD BEGIN -->
    <form>
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
                            <input type="text" class="form-control" id="" name="listing_title" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">House number</label>
                            <input type="text" class="form-control" id="" name="house_number" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Street</label>
                            <input type="text" class="form-control" id="" name="street" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">City</label>
                            <input type="text" class="form-control" id="" name="city" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">PostCode</label>
                            <input type="text" class="form-control" id="" name="listing_title" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <select class="form-control" id="" name="country">
                                <option value="United Kingdom"> United Kingdom </option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Features</label>
                            <textarea class="form-control tiny-textarea" name="property_features" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control tiny-textarea" name="property_description" rows="4"></textarea>
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
                            <select class="form-control" id="" name="property_type">
                                <option value="">--Select Property Type--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Property Price</label>
                            <input type="text" class="form-control" id="" name="property_price" placeholder="">
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
                            <input class="form-check-input" type="radio" name="property_status" id="propertyStatusRent" value="For Rent">
                            <label class="form-check-label" for="propertyStatusSale">For Rent</label>
                        </div>
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
                    </div>

                </div>
            </div>
            <hr/>
            <!-- ROW END -->

            <!--ROW -->
            <div class="row">
                <div class="col colPropertyImageControls">
                    <label for="">Upload Property Image</label>
                    <div class="input-group property-image">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="propertyImage[]" required>
                                <label class="custom-file-label" for="propertyImage">Choose file...</label>
                            </div>
                            <span class="input-group-append">
                                <a class="btn btn-outline-danger removeImageUpload"><i class="far fa-minus-square"></i></a>
                            </span>
                    </div>
                </div>

                <div class="col">
                        <a class="btn btn-outline-primary" id="btnAddPropertyImageUpload"><i class="far fa-plus-square"></i></a> 
                </div>
            </div>
            <!-- ROW END -->
        </div>

        <div class="card-footer">
            <button type="submit" style="width:50%; float:right;" class="btn btn-success"> <i class="far fa-save"></i> Save Property</button>
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