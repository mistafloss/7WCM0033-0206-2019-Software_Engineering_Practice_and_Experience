@extends('website.layouts.master')
@section('content')
<main role="main">
    <div class="container">
        <h1 class="text-primary">Property Information</h1>
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($property->images as $key => $image )
                 <li data-target="#carouselExampleCaptions" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : '' }}"></li> 
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($property->images as $key => $image )
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img src="{{$image->image_url}}" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{$property->listing_title}}</h5>
                                <p>£{{$property->property_price}}</p>
                            </div>
                        </div>
                @endforeach
            </div>
            
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="row" style="margin-top:60px;">
            <div class="col">
                <h2> £{{$property->property_price}}{{$property->payment_frequency == 'Monthly' ? 'pm' : '' }}</h2>
                <h3 class="text-primary">{{$property->listing_title}}</h3>
                <h4> {{$property->house_number}}, {{$property->street}}, {{$property->city}}. {{$property->postcode}}</h4>
                <hr/>
                <h5 class="text-primary"> Key Features </h5>
                <p> 
                    {!! ($property->features)!!}
                </p>
                <hr/>
                <p>
                    {!! ($property->description)!!}
                </p>
            </div>
            <div class="col">
                    <div class="row mr-1">
                        <div class="col-md-12 mb-2">
                            <a href="#" class="btn btn-primary btn-block">Request details</a>
                        </div>
                    </div>
                    <div class="row mr-1">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-success btn-block">Book viewing</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</main>
@endsection