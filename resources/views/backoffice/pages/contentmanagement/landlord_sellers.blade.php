@extends('backoffice.layouts.master')
@section('content')

<div class="container">
    @if(Session::has('contentSuccess'))
        <div class="alert alert-success mt-10">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('contentSuccess')}}
        </div>
    @endif
  <div class="card mt-10">
        <div class="card-header">
            <div class="float-left">
                <h5> Content Management >> Landlords & Sellers  </h5>
            </div>
        </div>
        <form method="POST" action="{{route('postLandlordSellersContent')}}">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Page Content</label>
                        <textarea class="form-control tiny-textarea" id="" name="landlord_sellers_content_node_1" rows="10">{{$content['landlord_sellers_content_node_1']}}</textarea>
                        <span class="text-danger"> 
                            @if($errors->has('landlord_sellers_content_node_1'))
                                {{ $errors->first('landlord_sellers_content_node_1') }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {{csrf_field()}}
                <input type="hidden" name="page_id" value="2"/>
                <button type="submit" style="width:50%; float:right;" class="btn btn-success"> <i class="far fa-save"></i> Submit</button>
            </div>
        </form>
  </div>
</div>  

@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/u172uoi4atzuwml8mdg1mmll9ju6rlj6h74g30lbqcn160xv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
 
<script>
      tinymce.init({
        selector: '.tiny-textarea',
        plugins: [
        "advlist lists"
        ],
        menubar: 'file edit view insert format tools table tc help',
        toolbar: "undo redo | bold italic underline strikethrough | bullist numlist | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | insertfile image media pageembed template link anchor codesample ",
        height: 600,
        image_advtab: true,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
      });
    </script>
@endsection