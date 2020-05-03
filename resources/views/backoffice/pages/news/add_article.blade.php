@extends('backoffice.layouts.master')
@section('content')

<div class="container">
  <div class="card mt-10">
        <div class="card-header">
            <div class="float-left">
                <h5> New Article </h5>
            </div>
            <span class="float-right">
                <a href="{{route('newsIndex')}}" class="btn btn-primary">+ Back to Articles</a>
            </span>
        </div>
        <form method="POST" action="{{route('postNewArticle')}}" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="">Title</label>
                        <input type="text" value="{{old('title')}}" name="title" class="form-control"/> 
                        <span class="text-danger"> 
                            @if($errors->has('title'))
                                {{ $errors->first('title') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Slug</label>
                        <input type="text" value="{{old('slug')}}" name="slug" class="form-control"/> 
                        <span class="text-danger"> 
                            @if($errors->has('slug'))
                                {{ $errors->first('slug') }}
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label> Article display text </label> 
                        <textarea class="form-control" name="intro_text">{{old('intro_text')}}</textarea>
                        <span class="text-danger"> 
                            @if($errors->has('intro_text'))
                                {{ $errors->first('intro_text') }}
                            @endif
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Article image</label>
                        <div class="custom-file">
                            <input type="file" class="form-control-file" id="image_file" name="image_file">
                            
                        </div>
                        <span class="text-danger"> 
                            @if($errors->has('image_file'))
                                {{ $errors->first('image_file') }}
                            @endif
                        </span>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Content</label>
                        <textarea class="form-control tiny-textarea" id="" name="content" rows="10">{{old('content')}}</textarea>
                        <span class="text-danger"> 
                            @if($errors->has('content'))
                                {{ $errors->first('content') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{csrf_field()}}
                <button type="submit" style="width:50%; float:right;" class="btn btn-success" id="btn_save"> <i class="far fa-save"></i> Submit</button>
            </div>
        </form>    
  </div>
    
<div>

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/u172uoi4atzuwml8mdg1mmll9ju6rlj6h74g30lbqcn160xv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 
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