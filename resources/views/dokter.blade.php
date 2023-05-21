@extends('layouts.master')
@section('title', 'Klinik Reovelnt | Dokter')
@section('content')
<div class="main-headerr mb-5">
  <div class="container">
      <h1>Dokter</h1>
  </div>
  </div>
<div class="min-height-100vh my-5 container-fluid">
  <h1 class="title-sec">Temukan dokter</h1>
  <div class="row mt-5 d-flex justify-content-between">
    <div class="col-md-3">
        <div class="poli">
            <form action="{{route('searchdokter')}}" method="get">
              <div class="input-group">
                <input type="search" class="input-search form-control" name="search" placeholder="Nama Dokter" required>
                <span class="input-group-prepend">
                  <button type="submit" class="btn btn-search text-light">Cari</button>
                </span>
              </div>
            </form>
        </div>
        <div class="button mt-4">
          <a href="{{route('webprofil.dokter')}}" class="btn main-button">Kembali</a>
        </div>
    </div>
    <div class="col-md-9">
      <div class="row d-flex justify-content-center">
        @if ($dokter)
        @foreach ($dokter as $no => $dok)
        <div class="col-md-4">
          <div class="cardd mb-5 d-flex flex-column align-items-center">
            <div class="img">
              @if ($dok->foto)    
              <img src="{{url('uploads/'.$dok->foto)}}" class="card-img-top" alt="...">
              @else
              <img src="../assets/img/unsplash/ani-kolleshi-7jjnJ-QA9fY-unsplash.jpg" class="card-img-top" alt="...">
              @endif
            </div>
            <div class="card-body text-center">
              <h5 class="card-title text-capitalize">Dr. {{$dok->nama}}</h5>
              <div class="button">
                <a href="{{route('webprofil.detailDokter', $dok->id_pegawai)}}" class="btn main-button mt-3">selengkapnya</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
            <h1>Data tidak ditemukan</h1>
        @endif
      </div>  
    </div>
  </div>
</div>
@endsection