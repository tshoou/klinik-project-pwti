@extends('dokter.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
<h1>Obat</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('dokter.home')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Obat</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Data Obat</h2>
            <p class="section-lead">
              Data
            </p>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session('message')}}
                        </div>
                    </div>
              @endif
              <div class="row">
                <div class="col-md-6">
                </div>
              <div class="col-md-6">
              <form action="{{route('dokter.obat.search')}}" method="get">
                <div class="input-group">
                  <input type="search" class="form-control" name="search">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </span>
                  <span class="input-group-prepend" style="position: relative; z-index: 0">
                    <a href="{{route('dokter.obat')}}" class="btn btn-warning">Reset</a>
                  </span>
                </div>
              </form>
              </div>
              </div>
              <hr>
              <table class="table" id="data">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Jenis Obat</th>
                        <th scope="col">Kegunaan</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                @foreach ($Obat as $no => $o)
                <tr>
                    <th> {{$Obat->firstItem()+$no}}</th>
                    <th> {{$o->nama_obat}}</th>
                    <th> {{$o->jenis_obat}}</th>
                    <th> {{$o->kegunaan}}</th>
                    <th> {{$o->harga}}</th>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$Obat->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('page-script')
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endpush