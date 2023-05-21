<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Reovelnt</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">RV</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li><a class="nav-link" href="{{ route('resepsionist.home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('resepsionist.pasien') }}"><i class="fas fa-user-injured"></i><span>Data Pasien</span></a></li>
          <li><a class="nav-link" href="{{route('resepsionist.rekammedis')}}"><i class="fas fa-clipboard-list"></i><span>Data Rekam Medis</span></a></li>
          <li><a class="nav-link" href="{{route('resepsionist.pegawai')}}"><i class="fas fa-list-ul"></i> <span>Data Pegawai</span></a></li>
          <li><a class="nav-link" href="{{route('resepsionist.dokter')}}"><i class="fas fa-user-md"></i><span>Data Dokter</span></a></li>
          <li><a class="nav-link" href="{{ route('resepsionist.obat') }}"><i class="fas fa-pills"></i><span>Data Obat</span></a></li>
          <li><a class="nav-link" href="{{ route('resepsionist.gedung') }}"><i class="fas fa-hospital-alt"></i> <span>Data Gedung</span></a></li>
          <li><a class="nav-link" href="{{ route('resepsionist.ruang') }}"><i class="fas fa-bed"></i> <span>Data Ruangan</span></a></li>
    </aside>
  </div>