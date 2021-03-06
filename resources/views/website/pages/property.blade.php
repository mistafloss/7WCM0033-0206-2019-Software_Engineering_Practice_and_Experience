@extends('website.layouts.master')
@section('content')
<main role="main">
<div class="container">
    <h1>Properties</h1>
        <div class="row">
            <div class="col-4">
                <div class="list-group list-group-horizontal-md" id="list-tab" role="tablist">
                    @if(app('request')->input('intent') == 'rent' || app('request')->input('intent') == 'buy')
                    <a class="list-group-item list-group-item-action {{ app('request')->input('intent') == 'rent' ? 'active' : '' }}" id="list-torent-list" data-toggle="list" href="#list-torent" role="tab" aria-controls="home">Rent</a>
                    <a class="list-group-item list-group-item-action {{ app('request')->input('intent') == 'buy' ? 'active' : '' }}" id="list-tobuy-list" data-toggle="list" href="#list-tobuy" role="tab" aria-controls="profile">Buy</a>
                    @else
                    <a class="list-group-item list-group-item-action" id="list-torent-list" data-toggle="list" href="#list-torent" role="tab" aria-controls="home">Rent</a>
                    <a class="list-group-item list-group-item-action" id="list-tobuy-list" data-toggle="list" href="#list-tobuy" role="tab" aria-controls="profile">Buy</a>
                    @endif
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade  {{ app('request')->input('intent') == 'rent' ? 'active show' : '' }}" id="list-torent" role="tabpanel" aria-labelledby="list-torent-list">
                        <form method="GET" action="{{url('property-search')}}">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <input type="text" class="form-control" value="{{app('request')->input('location')}}" name="location" required placeholder="Location or postcode">
                                    
                                </div>
                                <div class="form-group col-md-4">
                                    <select class="form-control" name="type">
                                        <option value="all">Any Property type</option>
                                        @foreach($propertyCategories as $category)
                                            <option value="{{$category->id}}" {{ app('request')->input('type') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                             
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="bedrooms">
                                        <option value="all"> Any Bedrooms</option>
                                        <option value="1" {{ app('request')->input('bedrooms') == '1' ? 'selected' : ''}}>1</option>
                                        <option value="2" {{ app('request')->input('bedrooms') == '2' ? 'selected' : ''}}>2</option>
                                        <option value="3" {{ app('request')->input('bedrooms') == '3' ? 'selected' : ''}}>3</option>
                                        <option value="4" {{ app('request')->input('bedrooms') == '4' ? 'selected' : ''}}>4</option>
                                        <option value="5" {{ app('request')->input('bedrooms') == '5' ? 'selected' : ''}}>5</option>
                                        <option value="6" {{ app('request')->input('bedrooms') == '6' ? 'selected' : ''}}>6</option>
                                        <option value="7" {{ app('request')->input('bedrooms') == '7' ? 'selected' : ''}}>7</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <input type="hidden" value="rent" name="intent"/>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade {{ app('request')->input('intent') == 'buy' ? 'active show' : '' }}" id="list-tobuy" role="tabpanel" aria-labelledby="list-tobuy-list">
                        <form method="GET" action="{{url('property-search')}}">
                            <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control" value="{{app('request')->input('location')}}" name="location" required placeholder="Location or postcode">
                                            
                                        </div>
                                        <div class="form-group col-md-4">
                                            <select class="form-control" name="type">
                                                <option value="all"> Any Property type</option>
                                                @foreach($propertyCategories as $category)
                                                    <option value="{{$category->id}}" {{ app('request')->input('type') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <select class="form-control" name="bedrooms">
                                                <option value="all"> Any Bedrooms</option>
                                                <option value="1" {{ app('request')->input('bedrooms') == '1' ? 'selected' : ''}}>1</option>
                                                <option value="2" {{ app('request')->input('bedrooms') == '2' ? 'selected' : ''}}>2</option>
                                                <option value="3" {{ app('request')->input('bedrooms') == '3' ? 'selected' : ''}}>3</option>
                                                <option value="4" {{ app('request')->input('bedrooms') == '4' ? 'selected' : ''}}>4</option>
                                                <option value="5" {{ app('request')->input('bedrooms') == '5' ? 'selected' : ''}}>5</option>
                                                <option value="6" {{ app('request')->input('bedrooms') == '6' ? 'selected' : ''}}>6</option>
                                                <option value="7" {{ app('request')->input('bedrooms') == '7' ? 'selected' : ''}}>7</option>
                                            </select>
                                        </div>
                                        <div class="form-group col">
                                            <input type="hidden" value="buy" name="intent"/>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                            </div>
                        </form>
                    </div>
                
            </div>    
        </div>
		 @if( !app('request')->input('intent') && !app('request')->input('location') && !app('request')->input('type') && !app('request')->input('bedrooms') )
			<div class="mx-auto" style="width:200px;">{{ $properties->links("pagination::bootstrap-4") }}</div>
		 @endif
    @if($properties->count() > 0)
        @foreach($properties as $property)
        <div class="card mb-2" style="">
            <div class="row no-gutters">
                <div class="col-md-4">
                @foreach($property->images as $image)
                    @if ($loop->first)
                            <img src="{{$image->image_url}}" class="card-img" alt="...">
                        @break
                    @endif    
                @endforeach
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">  {{$property->listing_title}}</h5>
                           <div class="container"> 
                                <p class="card-text">
                                  {!! ($property->brief_description)!!}
                                </p>
                            </div>
                        </p>
                        <p class="card-text"><small class="text-muted"></small></p>
                    </div>
                </div>
                @if($property->status == 'To Let')
                    @php
                        $bookviewingSlug = 'to-rent'
                    @endphp
                @elseif($property->status == 'For Sale')
                    @php
                        $bookviewingSlug = 'for-sale'
                    @endphp
                @endif
                <div class="col-sm-2">
                    <div class="row mr-1">
                        <div class="col-md-12 mb-2 mt-2">
                            <a href="{{route('propertyDetails',$property->id)}}" class="btn btn-success btn-block">More Information</a>
                        </div>
                    </div>
                    <div class="row mr-1">
                        <div class="col-md-12 mb-2">
                            <a href="{{route('requestPropertyInformation',[$bookviewingSlug,$property->id])}}" class="btn btn-primary btn-block">Request details</a>
                        </div>
                    </div>
                    <div class="row mr-1">
                        <div class="col-md-12">
                            <a href="{{route('bookViewing',[$bookviewingSlug,$property->id])}}" class="btn btn-success btn-block">Book viewing</a>
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