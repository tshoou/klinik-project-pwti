@extends('layouts.master')
@section('title', 'Rumah Sakit Brigham | Detail Dokter')
@section('content')
<div class="main-headerr">
  <div class="container">
      <h1>Fasilitas</h1>
  </div>
</div>
  <div class="container my-5">
    <div class="row d-flex justify-content-center">
      @foreach ($ruangan as $no => $r)
      <div class="col-md-3">
        <div class="cardd">
          <div class="card-body text-center">
          <h4 class="card-title text-capitalize">{{$r->nama_ruang}}</h4>
          <p>{{$r->keterangan_fr}}</p>
          <p>Gedung : {{$r->gedung()->first()->nama_gedung}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection