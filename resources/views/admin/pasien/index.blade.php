@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Pasien</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pasien</a></div>
      </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Data Pasien</h2>
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
                  <a class="btn btn-warning text-white" href="{{route('admin.pasien.exportExcel')}}">Export Excel</a>
                </div>
              <div class="col-md-6">
                <form action="{{route('admin.pasien.search')}}" method="get">
                  <div class="input-group">
                    <input type="search" class="form-control" name="search">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                    <span class="input-group-prepend" style="position: relative; z-index: 0">
                      <a href="{{route('admin.pasien')}}" class="btn btn-warning">Reset</a>
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
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                @foreach ($pasien as $no => $pasiens)
                <tr>
                    <th> {{$pasien->firstItem()+$no}}</th>
                    <th> {{$pasiens->nama_pasien}}</th>
                    <th> {{$pasiens->created_at}}</th>
                    <th>
                        <a href="{{route('admin.pasien.detail',$pasiens->id_pasien)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                        <a href="#" data-id="{{$pasiens->id_pasien}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <form style="display: none" action="{{route('admin.pasien.hapus', $pasiens->id_pasien)}}" method="POST" id="hapus{{$pasiens->id_pasien}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <i class="fas fa-times"></i>
                        </a>
                    </th>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$pasien->links()}}
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
    "use strict";
    $(".confirmation").click(function(e) {
        var id = e.target.dataset.id;
    swal({  
        title: 'Apa kamu yakin ingin menghapus?',
        text: 'Jika kamu menghapus, data yang berhubungan akan hilang',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
        swal('Data berhasil di hapus', {
            icon: 'success',
        });
        $(`#hapus${id}`).submit();
        } else {
        swal('Gagal');
        }
        });
    });
</script>
@endpush