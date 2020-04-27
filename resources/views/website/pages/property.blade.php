@extends('website.layouts.master')
@section('content')
<main role="main">
<div class="container">
    <h1>Properties</h1>
        <div class="row">
            <div class="col-4">
                <div class="list-group list-group-horizontal-md" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-torent-list" data-toggle="list" href="#list-torent" role="tab" aria-controls="home">Rent</a>
                    <a class="list-group-item list-group-item-action" id="list-tobuy-list" data-toggle="list" href="#list-tobuy" role="tab" aria-controls="profile">Buy</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-torent" role="tabpanel" aria-labelledby="list-torent-list">
                        <form method="GET" action="{{url('property-search')}}">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="location" placeholder="Location or postcode">
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control">
                                        <option value=""> Type</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control">
                                        <option value=""> Any Price</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control">
                                        <option value=""> Any Bedrooms</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <input type="hidden" value="rent" name="intent"/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="list-tobuy" role="tabpanel" aria-labelledby="list-tobuy-list">
                    <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" name="location" placeholder="Location or postcode">
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control">
                                        <option value=""> Type</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control">
                                        <option value=""> Any Price</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control">
                                        <option value=""> Any Bedrooms</option>
                                        <option></option>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <input type="hidden" value="buy" name="intent"/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    
    @if($properties->count() > 0)
        @foreach($properties as $property)
        <div class="card mb-2" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="..." class="card-img" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">  {{$property->listing_title}}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="row mr-1">
                        <div class="col-md-12 mb-2 mt-2">
                            <a href="#" class="btn btn-success btn-block">More Information</a>
                        </div>
                    </div>
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

        @endforeach
    @else
        <h2> No search result returned </h2>
    @endif    
</div>
 
</main>
@endsection