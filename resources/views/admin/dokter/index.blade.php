@extends('admin.layouts.master')
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
                    <a type="button" class="btn btn-primary text-white" data-target="#modalInsert" data-toggle="modal">Tambah Data</a>
                    <a class="btn btn-warning text-white" href="{{route('admin.dokter.exportExcel')}}">Export Excel</a>
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
                        <a href="{{route('admin.pegawai.detail',$dok->id_pegawai)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                        <a href="#" data-id="{{$dok->id_pegawai}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <form style="display: none" action="{{route('admin.dokter.hapus', $dok->id_pegawai)}}" method="POST" id="hapus{{$dok->id_pegawai}}">
                            @csrf
                            @method('delete')
                        </form>
                        <i class="fas fa-times"></i>
                    </a>
                    </th>
                </tr>
                @endforeach
                </tbody>
                </table>
                {{$dokter->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bb-1">
          <h5 class="modal-title" id="modalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.dokter.simpan')}}" method="POST">
          @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label @error('nama')
                              class="text-danger"
                          @enderror>Nama @error('nama')
                              | {{$message}}
                          @enderror</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                        <input type="text" class="form-control" value="{{old('nama')}}" name="nama" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label @error('nip')
                              class="text-danger"
                          @enderror>NIP @error('nip')
                              | {{$message}}
                          @enderror</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('nip')}}" name="nip" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6" hidden>
                        <div class="form-group">
                          <label>Jabatan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-map-pin"></i>
                              </div>
                            </div>
                          <select name="jabatan" id="" class="form-control">
                              <option value="3">Dokter</option>
                          </select>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label @error('senin')
                              class="text-danger"
                          @enderror>Senin @error('senin')
                              | {{$message}}
                          @enderror</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('senin')}}" name="senin" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label @error('selasa')
                              class="text-danger"
                          @enderror>Selasa @error('selasa')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('selasa')}}" name="selasa" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label @error('rabu')
                              class="text-danger"
                          @enderror>Rabu @error('rabu')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('rabu')}}" name="rabu" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label @error('kamis')
                              class="text-danger"
                          @enderror>Kamis @error('kamis')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('kamis')}}" name="kamis" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label @error('jumat')
                              class="text-danger"
                          @enderror>Jumat @error('jumat')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('jumat')}}" name="jumat" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label @error('sabtu')
                              class="text-danger"
                          @enderror>Sabtu @error('sabtu')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('sabtu')}}" name="sabtu" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label @error('minggu')
                              class="text-danger"
                          @enderror>Minggu @error('minggu')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('minggu')}}" name="minggu" placeholder="07:00 - 19:00 / -" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label @error('biaya_jasa')
                              class="text-danger"
                          @enderror>Biaya Jasa @error('biaya_jasa')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-dollar-sign"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" value="{{old('biaya_jasa')}}" name="biaya_jasa" required>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label @error('password')
                              class="text-danger"
                          @enderror>Password @error('password')
                              | {{$message}}
                          @enderror</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-key"></i>
                              </div>
                            </div>
                          <input type="text" class="form-control" name="password" id="password" readonly>
                        </div>
                        </div>
                      </div>
                    </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
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
        text: 'Jika kamu menghapus, data yang berhubungan dengan dokter akan hilang',
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