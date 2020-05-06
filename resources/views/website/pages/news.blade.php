@extends('website.layouts.master')
@section('content')
<main role="main">
<div class="jumbotron" style="background-image:url('{{ asset('images/18.jpg')}}'); background-size:100% 100%;">
    <div class="container">
        <h3 class="display-4">News</h3>
    </div>
</div>
<div class="container-fluid">
        <ul class="pagination">  {{ $articles->links() }} </ul>
        <div class="row">
            @foreach($articles as $article)
            <div class="card col-md-4 mr-2" style="width: 10rem;">
                <img src="{{$article->image_url}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  <p>{{\Carbon\Carbon::parse($article->created_at)->format('d/m/Y')}} </p>
                  <p class="card-text">{{$article->intro_text}}</p>
                  <a href="{{route('getArticleBySlug',$article->slug)}}" class="btn btn-primary">Read more </a>
                </div>
            </div>
            @endforeach
        </div>
        
</div>

</div>