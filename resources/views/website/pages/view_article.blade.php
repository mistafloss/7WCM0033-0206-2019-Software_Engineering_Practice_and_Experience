@extends('website.layouts.master')
@section('content')
<main role="main">
    <div class="article-image" style="background-image:url('{{$article->image_url}}'); height:600px;  background-size:100% 100%;">   
    </div>
<div class="container">
        <h5 class="text-center display-4 text-primary mt-10">{{$article->title}}</h5>
        <div class="row">
            <div class="col-md-12">
                {!!$article->content!!}
            </div>
        </div>
</div>

</div>