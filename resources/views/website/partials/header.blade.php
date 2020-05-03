<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
  <a class="navbar-brand" href="{{route('websiteIndex')}}">Havilah Housing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Landlords</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sellers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('allProperties')}}">Properties</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('getAllArticles')}}">News</a>
      </li>
    </ul>
  </div>
</nav>