<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <figure class="avatar mr-2 avatar-sm">
          @if (Auth::user()->pegawai()->first()->foto)
            <img src="{{url('uploads/'. Auth::user()->pegawai()->first()->foto)}}" alt="...">
          @else
            <img src="{{asset('assets/img/avatar/avatar-1.png')}}" alt="...">
          @endif
          <i class="avatar-presence online"></i>
        </figure>
      <div class="d-sm-none d-lg-inline-block text-capitalize">Hi, {{Auth::user()->pegawai()->first()->nama}}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{route('resepsionist.profil', Auth::user()->id_pegawai)}}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </div>
      </li>
    </ul>
  </nav>