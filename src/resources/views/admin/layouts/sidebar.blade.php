<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">    
    @php $logo = getSetting('logo'); @endphp
    @if(isset($logo) && $logo!=''  && file_exists(public_path().config('constants.SETTING_IMAGE_URL').$logo)) 
    <img width="100" src="{{ asset(config('constants.SETTING_IMAGE_URL').$logo) }}">
    @else
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-futbol"></i>
    </div>
    <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    @endif
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.players.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Players</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.agents.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Agents</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.plans.index') }}">
      <i class="fab fa-product-hunt"></i>
      <span>Plans</span></a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.playerstatistics.index') }}">
      <i class="far fa-chart-bar"></i>
      <span>Player Statistics</span></a>
  </li> -->
  
    <li class="nav-item">
        <a class="nav-link collapsed" href="javascript:;" data-toggle="collapse" data-target="#collapseOfferings" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-cog"></i>
          <span>General Settings</span>
        </a>
        <div id="collapseOfferings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.countries.index') }}">Countries</a>
            <a class="collapse-item" href="{{ route('admin.states.index') }}">States</a>
            <a class="collapse-item" href="{{ route('admin.cities.index') }}">Cities</a>
            <a class="collapse-item" href="{{ route('admin.statistics.index') }}">Statistics</a>
            <a class="collapse-item" href="{{ route('admin.positions.index') }}">Positions</a>
          </div>
        </div>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.banners.index') }}">
        <i class="fas fa-fw fa-image"></i>
        <span>Banners</span></a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pages.index') }}">
        <i class="fas fa-fw fa-list"></i>
        <span>Pages</span></a>
     </li> -->
     <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.reports.contact') }}">
      <i class="fas fa-id-card"></i>
      <span>Contact Us</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.reports.newsletters') }}">
      <i class="fas fa-fw fa-rss"></i>
      <span>Newsletters</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
<!-- End of Sidebar -->