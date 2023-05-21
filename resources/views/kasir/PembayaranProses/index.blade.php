@extends('kasir.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Data Pembayaran</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pembayaran Proses</a></div>
      </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Pembayaran Proses & Pembayaran Selesai</h2>
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
                    <form action="{{ route('kasir.pembayaranProses.search') }}" method="get">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search">
                            <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            </span>
                            <span class="input-group-prepend" style="position: relative; z-index: 0">
                            <a href="" class="btn btn-warning">Reset</a>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('kasir.pembayaranProses') }}" class="btn btn-primary mr-3">Proses Pembayaran</a>
                        <form action="{{route('kasir.pembayaranProses.filter')}}" method="get">
                                <input hidden type="search" class="form-control" name="search" value="selesai">
                                <span class="input-group-prepend">
                                <button type="submit" class="btn btn-warning">Selesai Pembayaran</button>
                                </span>
                        </form>
                      </div>
                </div>
              </div>
              <hr>
              <table class="table" id="data">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                @foreach ($rekammedis as $no => $rm)
                <tr>
                    <th> {{$rekammedis->firstItem()+$no}}</th>
                    <th> {{$rm->pasien()->first()->nama_pasien}}</th>
                    <th> {{$rm->tgl_masuk}}</th>
                    @if ($rm->ket_proses === 'pembayaran_proses')
                    <th>
                        <a href="{{route('kasir.pembayaranProses.detail', $rm->id_rekam_medis)}}" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-info-circle"></i> Detail</a>
                    </th>
                    @else
                    <th>
                        <a href="{{route('kasir.pembayaranProses.detail', $rm->id_rekam_medis)}}" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-info-circle"></i> Detail</a>
                    </th>
                    @endif
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$rekammedis->links()}}
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
@endpush