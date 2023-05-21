<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dokter.home') }}">Reovelnt</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dokter.home') }}">RV</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('dokter.home') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Menu</li>
          <li><a class="nav-link" href="{{ route('dokter.rekammedis',  Auth::user()->pegawai()->first()->id_pegawai) }}"><i class="fas fa-user fa-4x"></i> <span>Pasien Saya</span></a></li>
          <li><a class="nav-link" href="{{ route('dokter.obat') }}"><i class="fas fa-pills"></i><span>Data Obat</span></a></li>
    </aside>
  </div>