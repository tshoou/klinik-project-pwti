@extends('layouts.master')
@section('title', 'Klinik Reovelnt | Detail Dokter')
@section('content')
<div class="main-headerr">
  <div class="container">
      <h1>Hubungi Kami</h1>
  </div>
</div>
  <div class="sec-contact container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 informasi-kontak d-flex flex-column justify-content-center">
        <h3>
            Informasi kontak
        </h3>
        <p>Buat Janji Temu Gratis dengan Mengunjungi atau menelepon Kami!</p>
        <div class="wrapper-informasi-rs">
            <div class="informasi-rs d-flex align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="fas fa-phone-square"></i>
                </div>
                <p>+62(12) 8726 661</p>
            </div>
            <div class="informasi-rs d-flex align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="fas fa-envelope-square"></i>
                </div>
                <p>reovelnt.mc@gmail.com</p>
            </div>
            <div class="informasi-rs d-flex align-items-center">
                <div class="icon d-flex justify-content-center align-items-center">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <p>Jl. Lodaya I 78, RT.03/RW.07, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</p>
            </div>
        </div>
        <div class="sosmed d-flex mt-5">
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
        </div>
      </div>
      <div class="message col-md-6">
          <h4>Kirim pesan kepada kami</h4>
          @if (session('message'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            <h5>
                            {{session('message')}}
                        </h5>
                        </div>
                    </div>
              @endif
            <form action="{{route('webprofil.kontak.kirim')}}" class="mt-5" method="post">
                @csrf
            <div class="group">      
                <input type="text" name="nama" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Nama Lengkap</label>
            </div>
            <div class="group">      
                <input type="text" name="notelp" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>No Telfon</label>
            </div>
            <div class="group">      
                <input type="text" name="email" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>Email</label>
            </div>
            <div class="group">      
                <textarea name="pesan" id="" cols="20" rows="3" placeholder="Pesan anda" required></textarea>
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
            <div class="button float-right">
                <button class="btn main-button mt-3" type="submit">Kirim</button>
              </div>
          </form>
        </div>
    </div>
  </div>
  <div class="peta">
      <div class="row">
          <div class="col-md-12">
            <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.8597437322367!2d106.80537302918643!3d-6.592234567464034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5d1fd5547f5%3A0xcba6ade0a92dd4cc!2sJl.%20Lodaya%20I%2078%2C%20RT.03%2FRW.07%2C%20Babakan%2C%20Kecamatan%20Bogor%20Tengah%2C%20Kota%20Bogor%2C%20Jawa%20Barat%2016128!5e0!3m2!1sid!2sid!4v1617594992777!5m2!1sid!2sid"
            width="100%"
            height="400"
            frameborder="0"
            style="border: 0"
            allowfullscreen=""
            aria-hidden="false"
            tabindex="0"
          ></iframe>
          </div>
      </div>
  </div>
@endsection