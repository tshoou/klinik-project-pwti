<header>
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        {{-- <img src="{{asset('assets/img/bwh-logo.svg')}}" class="logo" alt="" /> --}}
        <h3 class="logo">Reo<span>velnt</span></h3>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('webprofil.dokter')}}">temukan dokter</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('webprofil.fasilitas')}}">fasilitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('webprofil.kontak')}}">kontak</a>
            </li>
          </ul>
          <ul class="navbar-nav pull-sm-right d-flex align-items-center">
            <li class="nav-item">
              <a class="nav-link" href=""><i class="fab fa-twitter"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""><i class="fab fa-instagram"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""><i class="fab fa-youtube"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=""><i class="fas fa-envelope"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>