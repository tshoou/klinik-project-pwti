@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
<h1>Dokter</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Dokter</a></div>
  </div>    
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Data Dokter</h2>
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
                <form action="{{route('admin.dokter.search')}}" method="get">
                  <div class="input-group">
                    <input type="search" class="form-control" name="search">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                    <span class="input-group-prepend" style="position: relative; z-index: 0">
                      <a href="{{route('admin.dokter')}}" class="btn btn-warning">Reset</a>
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
                          <th scope="col">NIP</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Opsi</th>
                      </tr>
                  </thead>
                  <tbody style="text-transform: capitalize;">
                  @foreach ($dokter as $no => $dok)
                  <tr>
                      <th> {{$dokter->firstItem()+$no}}</th>
                      <th> {{$dok->nip}}</th>
                      <th> {{$dok->nama}}</th>
                      <th>
                        <a href="{{route('resepsionist.pegawai.detail',$dok->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                      </a>
                      </th>
                  </tr>
                  @endforeach
                  </tbody>
                  </table>
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
@push('after-script')
<script src="{{ asset('assets/node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
<script>
    // "use strict";
    // $(".confirmation").click(function(e) {
    //     var id = e.target.dataset.id;
    // swal({  
    //     title: 'Apa kamu yakin ingin menghapus?',
    //     text: 'Jika kamu menghapus, data akan hilang',
    //     icon: 'warning',
    //     buttons: true,
    //     dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //     if (willDelete) {
    //     swal('Data berhasil di hapus', {
    //         icon: 'success',
    //     });
    //     $(`#hapus${id}`).submit();
    //     } else {
    //     swal('Data kamu tidak jadi dihapus');
    //     }
    //     });
    // });
</script>
@endpush