

@extends('backoffice.layouts.master')
@section('content')

<div class="container ">
<div class="card mt-10">
  <div class="card-header">
    <div class="float-left">
        <h5> Property Categories</h5>
    </div>
    <span class="float-right">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPropertyCategoryModal">
            + Add Category
        </button>
    </span>
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <th scope="row">{{$category->id}}</th>
              <td>{{$category->name}}</td>
              <td><button type="button" class="btn btn-primary" data-toggle="modal" data-id="{{$category->id}}" data-target="#editPropertyCategoryModal">
              <input type="hidden" id="cat_view_url_{{$category->id}}" value="{{route('API_viewPropertyCategory', $category->id )}}"/>
                Show
              </button>
             
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
  </div>
</div>



    <!-- Modal Create Property Category -->
    <div class="modal fade" id="addPropertyCategoryModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPropertyCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addPropertyCategoryModalLabel">Add New Property Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
              <div class="loading">
                <div class="spinner-border text-dark" role="status">
                </div>
                <span>Loading...</span>
              </div>
                <form>

                    <div class="form-group">
                      <label for="propertyCategoryName">Name</label>
                      <input type="text" class="form-control" id="propertyCategoryName">
                      <span class="text-danger" id="propertyCategoryName_error"> </span>
                    </div>
                    <div class="form-group">
                      <label for="propertyCategoryDescription">Description</label>
                      <textarea class="form-control" id="propertyCategoryDescription" rows="3"></textarea>
                    
                      <input type="hidden" value="{{route('API_createPropertyCategory')}}" id="actionUrl" />
                      <input type="hidden" value="{{route('propertyCategoryIndex')}}" id="propertyCategoriesListUrl"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="btnCancelPropertyCategoryCreate" data-dismiss="modal">Cancel</button>
            <button type="submit" id="btnCreatePropertyCategory" class="btn btn-success">Submit</button>
            </div>
        </div>
        </div>
    </div>
        <!-- Modal Edit Property Category-->
        <div class="modal fade" id="editPropertyCategoryModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editPropertyCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="editPropertyCategoryModalLabel">Edit Property Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                  <div class="loading">
                    <div class="spinner-border text-dark" role="status">
                    </div>
                    <span>Loading...</span>
                  </div>
                    <form>
                        <div class="form-group">
                          <label for="propertyCategoryName">Name</label>
                          <input type="text" class="form-control" id="propertyCategoryName_edit">
                          <span class="text-danger" id="editPropertyCategoryName_error"> </span>
                        </div>
                        <div class="form-group">
                          <label for="propertyCategoryDescription">Description</label>
                          <textarea class="form-control" id="propertyCategoryDescription_edit" rows="3"></textarea> 
                          <input type="hidden" id="propertyCategoryId_edit"/>
                          <input type="hidden" value="{{route('API_editPropertyCategory')}}" id="editActionUrl" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="btnCancelPropertyCategoryEdit" data-dismiss="modal">Cancel</button>
                  <button type="submit" id="btnEditPropertyCategory" class="btn btn-success">Submit</button>
                </div>
            </div>
            </div>
        </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/property_categories.js') }}"></script> 
@endsection
