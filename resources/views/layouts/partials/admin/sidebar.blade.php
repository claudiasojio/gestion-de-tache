 <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          {{-- <img src="img/logo/logo2.png"> --}}
        </div>
        <div class="sidebar-brand-text mx-3"> <h4>Claho project </h4></div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span class="collapse-item text-primary">Dashboard</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>TACHE A FAIRE</span>
        </a>
        <div id="collapseBootstrap" class="collapse show" aria-labelledby="headingBootstrap"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">tache a faire</h6>
            <a class="collapse-item text-primary" href="{{ route('clientss') }}">Tasks</a>
            
          </div>
        </div>
      
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>