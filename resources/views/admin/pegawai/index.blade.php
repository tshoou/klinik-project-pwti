@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('admin.home')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pegawai</a></div>
      </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Data Pegawai</h2>
            <p class="section-lead">
              Mengatur Data
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
                  <a href="{{route('admin.pegawai.tambah')}}" class="btn btn-primary">Tambah Data</a>
                  <a href="{{route('admin.pegawai.exportExcel')}}" class="btn btn-warning">Export Data</a>
                </div>
              <div class="col-md-6">
              <form action="{{route('admin.pegawai.search')}}" method="get">
                <div class="input-group">
                  <input type="search" class="form-control" name="search">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </span>
                  <span class="input-group-prepend" style="position: relative; z-index: 0">
                    <a href="{{route('admin.pegawai')}}" class="btn btn-warning">Reset</a>
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

                    @if ($peg->jabatan()->first()->nama_jabatan == 'admin')    
                    <th>
                    <a href="{{route('admin.pegawai.detail',$peg->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                    <a href="#" data-id="{{$peg->id_pegawai}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <form style="display: none" action="{{route('admin.pegawai.hapus', $peg->id_pegawai)}}" method="POST" id="hapus{{$peg->id_pegawai}}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <i class="fas fa-times"></i>
                    </a>
                    </th>
                    @elseif($peg->jabatan()->first()->nama_jabatan == 'resepsionist')
                    <th>
                      <a href="{{route('admin.pegawai.detail',$peg->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                      <a href="#" data-id="{{$peg->id_pegawai}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                          <form style="display: none" action="{{route('admin.pegawai.hapus', $peg->id_pegawai)}}" method="POST" id="hapus{{$peg->id_pegawai}}">
                              @csrf
                              @method('DELETE')
                          </form>
                          <i class="fas fa-times"></i>
                      </a>
                      </th>
                    @elseif($peg->jabatan()->first()->nama_jabatan == 'kasir')
                    <th>
                      <a href="{{route('admin.pegawai.detail',$peg->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                      <a href="#" data-id="{{$peg->id_pegawai}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                          <form style="display: none" action="{{route('admin.pegawai.hapus', $peg->id_pegawai)}}" method="POST" id="hapus{{$peg->id_pegawai}}">
                              @csrf
                              @method('DELETE')
                          </form>
                          <i class="fas fa-times"></i>
                      </a>
                      </th>
                    @else
                    <th>
                        <a href="{{route('admin.pegawai.detail',$peg->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                                            <a href="{{route('admin.pegawai.edit', $peg->id_pegawai)}}" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="#" data-id="{{$peg->id_pegawai}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                            <form style="display: none" action="{{route('admin.pegawai.hapus', $peg->id_pegawai)}}" method="POST" id="hapus{{$peg->id_pegawai}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <i class="fas fa-times"></i>
                        </a>
                        </th>
                    @endif
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