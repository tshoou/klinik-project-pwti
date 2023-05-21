@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('resepsionist.home')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pegawai</a></div>
      </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Data Pegawai</h2>
            <p class="section-lead">
              Data
            </p>
            <div class="row">
                <div class="col-12 col-md-4 col-sm-12">
                          <div class="card">
                            <div class="card-header">
                              <h4>Total Pegawai</h4>
                            </div>
                            <div class="card-body">
                              <div class="empty-state">
                                <div class="empty-state-icon">
                                  <h1 class="text-white">{{$Pegawai->count()}}</h1>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
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
              <form action="{{route('resepsionist.pegawai.search')}}" method="get">
                <div class="input-group">
                  <input type="search" class="form-control" name="search">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </span>
                  <span class="input-group-prepend" style="position: relative; z-index: 0">
                    <a href="{{route('resepsionist.pegawai')}}" class="btn btn-warning">Reset</a>
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
                        <th scope="col">Jabatan</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                @foreach ($Pegawai as $no => $peg)
                <tr>
                    <th> {{$Pegawai->firstItem()+$no}}</th>
                    <th> {{$peg->nip}}</th>
                    <th>{{$peg->nama}}</th>
                    <th>{{$peg->jabatan()->first()->nama_jabatan}}</th>
                    <th>
                        <a href="{{route('resepsionist.pegawai.detail',$peg->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                    </th>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$Pegawai->links()}}
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
