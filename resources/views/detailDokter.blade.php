@extends('layouts.master')
@section('title', 'Klinik Reovelnt | Detail Dokter')
@section('content')
<div class="main-headerr">
  <div class="container">
  <h1 class="text-capitalize">Dr. {{$dokter->nama}}</h1>
  </div>
</div>
<div class="my-5 container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="title-sec">Tentang Dokter</h1>
          <div class="card-detail">
              <div class="row">
            <div class="col-md-4">
                <div class="img">
                    @if ($dokter->foto)    
                    <img src="{{url('uploads/'.$dokter->foto)}}" class="card-img-top" alt="...">
                    @else
                    <img src="{{asset('assets/img/unsplash/ani-kolleshi-7jjnJ-QA9fY-unsplash.jpg')}}" class="card-img-top" alt="...">
                    @endif
                  </div>
            </div>
            <div class="col-md-8 d-flex flex-column justify-content-lg-center">
                <div class="desc-dok ml-5">
                    <h1 class="titlee text-capitalize">Dr. {{$dokter->nama}}</h1>
                    <p class="desc">{{$dokter->pendidikan}}</p>
                  </div>
                  <div class="desc-rs ml-5 mt-5">
                      <div class="item d-flex">
                        <i class="fas fa-phone-square"></i>
                        <p class="title">phone :</p>
                        <p>+62(12) 8726 661</p>
                      </div>
                      <div class="item d-flex">
                        <i class="fas fa-envelope-square"></i>
                        <p class="title">email :</p>
                        @if ($dokter->email == '-')
                          <p>reovelnt.mc@gmail.com</p>
                        @elseif($dokter->email == null)
                          <p>reovelnt.mc@gmail.com</p>
                        @else
                          <p>{{$dokter->email}}</p>
                        @endif
                      </div>
                      <div class="item d-flex">
                        <i class="fas fa-map-marker-alt"></i>
                        <p class="title">alamat :</p>
                        <p>Jl. Lodaya I 78, RT.03/RW.07, Babakan, Kecamatan Bogor Tengah, Kota Bogor, Jawa Barat 16128</p>
                      </div>
                  </div>
            </div>
        </div>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="jadwal col-md-12">
            <h1 class="title-sec">jadwal praktik</h1>
              <table class="mt-5">
                  <thead>
                    <tr>
                        <th>hari</th>
                        <th>jam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="hari">Senin</td>
                        @if ($dokter->dokter()->first()->senin == '-')
                          <td class="jam">Tidak ada jadwal</td>
                        @elseif($dokter->dokter()->first()->senin == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->senin}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="hari">Selasa</td>
                        @if ($dokter->dokter()->first()->selasa == '-')
                          <td class="jam">Tidak ada jadwal</td>
                          @elseif($dokter->dokter()->first()->selasa == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->selasa}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="hari">Rabu</td>
                        @if ($dokter->dokter()->first()->rabu == '-')
                          <td class="jam">Tidak ada jadwal</td>
                          @elseif($dokter->dokter()->first()->rabu == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->rabu}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="hari">Kamis</td>
                        @if ($dokter->dokter()->first()->kamis == '-')
                          <td class="jam">Tidak ada jadwal</td>
                          @elseif($dokter->dokter()->first()->kamis == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->kamis}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="hari">Jumat</td>
                        @if ($dokter->dokter()->first()->jumat == '-')
                          <td class="jam">Tidak ada jadwal</td>
                          @elseif($dokter->dokter()->first()->jumat == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->jumat}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="hari">Sabtu</td>
                        @if ($dokter->dokter()->first()->sabtu == '-')
                          <td class="jam">Tidak ada jadwal</td>
                          @elseif($dokter->dokter()->first()->sabtu == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->sabtu}}</td>
                        @endif
                    </tr>
                    <tr>
                        <td class="hari">Minggu</td>
                        @if ($dokter->dokter()->first()->minggu == '-')
                          <td class="jam">Tidak ada jadwal</td>
                          @elseif($dokter->dokter()->first()->minggu == null)
                          <td class="jam">Tidak ada jadwal</td>
                        @else
                          <td class="jam">{{$dokter->dokter()->first()->minggu}}</td>
                        @endif
                    </tr>
                </tbody>
              </table>
          </div>
      </div>
</div>
@endsection