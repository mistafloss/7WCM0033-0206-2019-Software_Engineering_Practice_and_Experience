@extends('website.layouts.master')
@section('content')
<main role="main">
<div class="container">
    <h1>Property</h1>
    @foreach($properties as $property)
    {{$property->listing_title}}
    @endforeach
</div>
 
</main>
@endsection