@extends('backoffice.layouts.master')
@section('content')

<div class="container">
    @if(Session::has('articleSuccess'))
        <div class="alert alert-success mt-10">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            {{Session::get('articleSuccess')}}
        </div>
    @endif
  <div class="card mt-10">
        <div class="card-header">
            <div class="float-left">
                <h5> Articles </h5>
            </div>
            <span class="float-right">
                <a href="{{route('newArticle')}}" class="btn btn-primary">+ Add New Article</a>
            </span>
        </div>

        <div class="card-body ">
        <div class="row">
            @foreach($articles as $article)
            <div class="card col-md-4 mr-2" style="width: 10rem;">
                <img src="{{$article->image_url}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  <p class="card-text">{{$article->intro_text}}</p>
                  <a href="{{route('updateArticle',$article->id)}}" class="btn btn-primary">Update article </a>
                </div>
            </div>
            @endforeach
        </div>
        </div>
  </div>
    
<div>

@endsection