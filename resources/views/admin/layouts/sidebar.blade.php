<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('admin.home') }}">Reovelnt</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('admin.home') }}">RV</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('admin.home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('admin.jabatan') }}"><i class="fas fa-map-pin"></i> <span>Data Jabatan</span></a></li>
          <li><a class="nav-link" href="{{ route('admin.akun') }}"><i class="fas fa-user fa-4x"></i> <span>Data Akun</span></a></li>
          <li><a class="nav-link" href="{{route('admin.pegawai')}}"><i class="fas fa-list-ul"></i> <span>Data Pegawai</span></a></li>
          <li><a class="nav-link" href="{{route('admin.dokter')}}"><i class="fas fa-user-md"></i><span>Data Dokter</span></a></li>
          <li><a class="nav-link" href="{{route('admin.pasien')}}"><i class="fas fa-user-injured"></i><span>Data Pasien</span></a></li>
          <li><a class="nav-link" href="{{route('admin.rekammedis')}}"><i class="fas fa-clipboard-list"></i><span>Data Rekam Medis</span></a></li>
          <li><a class="nav-link" href="{{ route('admin.gedung') }}"><i class="fas fa-hospital-alt"></i> <span>Data Gedung</span></a></li>
          <li><a class="nav-link" href="{{route('admin.ruang')}}"><i class="fas fa-building"></i></i><span>Data Ruangan</span></a></li>
          <li><a class="nav-link" href="{{ route('admin.obat') }}"><i class="fas fa-pills"></i><span>Data Obat</span></a></li>
          <li><a class="nav-link" href="{{ route('admin.pesan') }}"><i class="fas fa-comment-dots"></i><span>Data Pesan</span></a></li>
    </aside>
  </div>