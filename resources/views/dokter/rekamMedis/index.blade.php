@extends('dokter.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Pasien</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('dokter.home')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pasien</a></div>
      </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Data Pasien</h2>
    <p class="section-lead">
        Mengatur Data
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
              <div class="d-flex justify-content-end">
                <a href="{{ route('dokter.rekammedis',  Auth::user()->pegawai()->first()->id_pegawai) }}" class="btn btn-primary mr-3">Proses Periksa</a>
                <form action="{{route('dokter.rekammedis.search', Auth::user()->pegawai()->first()->id_pegawai)}}" method="get">
                        <input hidden type="search" class="form-control" name="search" value="selesai">
                        <span class="input-group-prepend">
                        <button type="submit" class="btn btn-warning">Pasien Selesai</button>
                        </span>
                </form>
              </div>
              <table class="table mt-3" id="data">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pasien</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                </tbody>
                @foreach ($rekama as $no => $r)
                <tr>
                    <th> {{$rekama->firstItem()+$no}}</th>
                    <th> {{$r->pasien()->first()->nama_pasien}}</th>
                    <th> {{$r->tgl_masuk}}</th>
                    @if ($r->ket_proses == 'selesai')
                    <th><a href="{{route('dokter.rekammedis.detail',$r->id_rekam_medis)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Detail"><i class="fas fa-info"></i></a></th>
                    @else
                    <th><a href="{{route('dokter.rekammedis.periksa',$r->id_rekam_medis)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Periksa"><i class="fas fa-stethoscope"></i></a></th>
                    @endif
                </tr>
                @endforeach
                </table>
                {{$rekama->links()}}
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
        text: 'Jika kamu menghapus, data akan hilang',
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
        swal('Data kamu tidak jadi dihapus');
        }
        });
    });
</script>
@endpush