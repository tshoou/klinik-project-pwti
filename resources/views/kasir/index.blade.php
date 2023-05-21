@extends('kasir.layouts.master')
@section('title', 'Rumah Sakit Brigham')
@section('section-header')
    <h1>Dashboard</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
              <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg-parallax" data-background="{{asset('assets/img/unsplash/andre-benz-1214056-unsplash.jpg')}}">
                  <div class="hero-inner">
                    <h2 class="text-capitalize">Hello, {{ Auth::user()->pegawai()->first()->nama }} </h2>
                    <p class="lead">Jika anda baru terdaftar, Atur profil anda terlebih dahulu</p>
                    <div class="mt-4">
                      <a href="{{route('kasir.profil', Auth::user()->id_pegawai)}}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Cek Profil</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
@endsection
@push('page-script')
    
@endpush