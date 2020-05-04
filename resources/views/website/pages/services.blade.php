@extends('website.layouts.master')
@section('content')
<main role="main">
<div class="jumbotron" style="">
    <div class="container">
        <h3 class="display-4 text-primary text-center">Services</h3>
    </div>
</div>
<div class="container">
    {!!$content['node_1']!!}

    <div class="row">
        <div class="col-md-6 mx-auto" >
            <a href="{{route('getPropertyEvaluation')}}" class="btn btn-primary float-right">Book your property valuation appointment today</a>
        </div>
    </div>
</div>

</main>

@endsection