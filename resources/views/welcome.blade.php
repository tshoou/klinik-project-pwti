@extends('layouts.master')
@section('title', 'Klinik Reovelnt | Beranda')
@section('content')
<div class="main-header d-flex align-items-center container">
  <div class="row">
    <div class="col-md-6 d-flex flex-column justify-content-center">
      <h3 class="text-blue">Medical Center</h3>
      <h1 class="title">Your Health Is Happiness For Us.</h1>
      <p class="desc">
        simply dummy text of the printing and typesetting industry. Lorem
        Ipsum has been the industry's standard dummy text ever since the
        1500s, when an unknown printer took a galley of type and scrambled
        it to make a type specimen
      </p>
      <div class="button">
        <a href="{{route('webprofil.dokter')}}" class="btn main-button mt-3">lihat dokter</a>
      </div>
    </div>
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="img">
        <img
          src="{{asset('assets/img/national-cancer-institute-701-FJcjLAQ-unsplash.jpg')}}"
          alt=""
        />
      </div>
    </div>
  </div>
</div>
<div class="about container">
  <div class="row">
    <div class="col-md-6">
      <div class="img-about">
        <img src="{{asset('assets/img/locations-bwh-main_700x400.jpg')}}" alt="" />
      </div>
    </div>
    <div class="col-md-6">
      <div class="titlee d-flex">
        <div class="line"></div>
        <p class="title-section text-orange">tentang kami</p>
      </div>
      <h1 class="title">Klinik Reovelnt</h1>
      <p class="desc-section">
        Klinik Reovelnt adalah perusahaan yang bergerak dalam bidang layanan Kesehatan (healthcare) sebagai pengembangan dari PT. Sarana Usaha Sejahtera InsanPalapa (Rasapala) yang didirikan oleh YAKES Telkom pada bulan November Tahun 2008. Pada tahun 2017 Klinik Reovelnt diakuisisi oleh AdMedika yang menguasai 75% sahamnya sedangkan 25% saham dikuasai YAKES.
      </p>
      <div class="tabulation-2 mt-4">
        <ul class="nav nav-pills nav-fill d-md-flex d-block">
          <li class="nav-item mb-md-0 mb-2">
            <a class="nav-link active py-2" data-toggle="tab" href="#home1"
              >Misi</a
            >
          </li>
          <li class="nav-item px-lg-2 mb-md-0 mb-2">
            <a class="nav-link py-2" data-toggle="tab" href="#home2"
              >Visi</a
            >
          </li>
        </ul>
        <div class="tab-content mt-2">
          <div class="tab-pane container active" id="home1">
            <p>Memberikan layanan kesehatan komprehensif dengan fokus pada pasien dan membangun manusia</p>
          </div>
          <div class="tab-pane container fade" id="home2">
            <p>Menjadi Partner Layanan Kesehatan Kebanggaan Nasional.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="layanan align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-5">
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <div class="left">
              <p class="title-card">Layanan darurat</p>
              <p class="desc-card">+62(12) 8726 661</p>
            </div>
            <div class="right">
              <i class="fas fa-phone-volume"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-5">
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <div class="left">
              <p class="title-card">Buka</p>
              <p class="desc-card">
                <span>7.00AM - 10.00PM</span>
              </p>
            </div>
            <div class="right">
              <i class="fab fa-openid"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-5">
          <div
            class="card-body d-flex justify-content-between align-items-center"
          >
            <div class="left">
              <p class="title-card">Dokter</p>
              <p class="desc-card">10++</p>
            </div>
            <div class="right">
              <i class="fas fa-user-md"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="about location container mb-5">
  <div class="row">
    <div class="col-md-6 d-flex flex-column justify-content-center">
      <div class="titlee d-flex">
        <div class="line"></div>
        <p class="title-section text-orange">alamat</p>
      </div>
      <h1 class="title">Lokasi</h1>
      <p class="desc-section">
        Jl. Lodaya I 78, RT.03/RW.07, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128
      </p>
    </div>
    <div class="col-md-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.8597437322367!2d106.80537302918643!3d-6.592234567464034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d1fd5547f5%3A0xcba6ade0a92dd4cc!2sJl.%20Lodaya%20I%2078%2C%20RT.03%2FRW.07%2C%20Babakan%2C%20Kecamatan%20Bogor%20Tengah%2C%20Kota%20Bogor%2C%20Jawa%20Barat%2016128!5e0!3m2!1sid!2sid!4v1617594992777!5m2!1sid!2sid"width="500"
      height="400"
      frameborder="0"
      style="border: 0"
      allowfullscreen=""
      aria-hidden="false"
      tabindex="0"></iframe>
    </div>
  </div>
</div>
@endsection