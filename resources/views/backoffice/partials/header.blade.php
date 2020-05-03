<header>
    <div class="topHeader" style="height:70px; width:100%">
        <div class="container-fluid">
            <div class="topHeaderLogo">
                <a href=""> Havilah Housing - Backoffice Portal</a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Property Management
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  {{-- @can('can_view_list_of_users')
                  <a class="dropdown-item" href="#">Properties</a>
                  @endcan --}}
                  <a class="dropdown-item" href="{{route('propertyIndex')}}">Properties</a>
                  <a class="dropdown-item" href="{{route('propertyCategoryIndex')}}">Property Types</a>
                  <a class="dropdown-item" href="{{route('getTenancies')}}">Tenancies</a>
                  <a class="dropdown-item" href="{{route('getSales')}}">Sales</a>
                  <a class="dropdown-item" href="{{route('getAppointments')}}">Viewing Appointments</a>
                  <a class="dropdown-item" href="{{route('getPropertyEnquiries')}}">Information Requests</a>
                  <a class="dropdown-item" href="{{route('getValuationAppointments')}}">Valuation appointments</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('partnerIndex')}}">Partners</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarContentMgtDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Content Management
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarContentMgtDropdownMenuLink">
                  <a class="dropdown-item" href="{{route('newsIndex')}}">News</a>
                  <a class="dropdown-item" href="{{route('servicesContent')}}">Services</a>
                  <a class="dropdown-item" href="{{route('feesContent')}}">Fees</a>
                  <a class="dropdown-item" href="{{route('landlordsSellersContent')}}">Landlords & Sellers</a>
              </div>
           </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('usermanagementIndex')}}">User Management</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Roles & Permissions
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('rolesIndex')}}">Roles</a>
              <a class="dropdown-item" href="{{route('permissionsIndex')}}">Permissions</a>
              </div>
           </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Edit Profile</a>
                  <a class="dropdown-item" href="{{route('backOfficelogout')}}">Logout</a>
                </div>
            </li>
          </ul>
        </div>
        
      </nav>
</header>