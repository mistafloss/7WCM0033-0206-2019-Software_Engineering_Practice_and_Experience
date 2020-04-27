@extends('website.layouts.master')
@section('content')
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h3 class="display-4">What are you looking for?</h3>
        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-torent-list" data-toggle="list" href="#list-torent" role="tab" aria-controls="home">Properties to rent</a>
                    <a class="list-group-item list-group-item-action" id="list-tobuy-list" data-toggle="list" href="#list-tobuy" role="tab" aria-controls="profile">Properties to buy</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-torent" role="tabpanel" aria-labelledby="list-torent-list">
                        <form method="GET" action="{{url('property-search')}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="location" placeholder="Type a location or postcode">
                                    <input type="hidden" value="rent" name="intent"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary">Search properties to rent</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="list-tobuy" role="tabpanel" aria-labelledby="list-tobuy-list">
                        <form  method="GET" action="{{url('property-search')}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="location" placeholder="Type a location or postcode">
                                    <input type="hidden" value="buy" name="intent"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary">Search properties to buy</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Simple transparent fees</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>About Havilah Housing</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Free home valuation</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

@endsection