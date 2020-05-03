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
</div>

</main>

@endsection