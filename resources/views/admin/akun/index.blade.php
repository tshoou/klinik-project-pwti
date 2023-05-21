@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Akun</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('admin.akun') }}">Akun</a></div>
      </div>
@endsection
@section('content')
<div class="section-body">
  <h2 class="section-title">Data Akun</h2>
            <p class="section-lead">
              Mengatur Data
            </p>
  <div class="row">
      <div class="col-12 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Total Akun Terdaftar</h4>
                  </div>
                  <div class="card-body">
                    <div class="empty-state">
                      <div class="empty-state-icon">
                        <h1 class="text-white">{{$akun->count()}}</h1>
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
                <a type="button" class="btn btn-primary text-white" data-target="#modalInsert" data-toggle="modal">Tambah Data</a>
              </div>
              <div class="col-md-6">
                <form action="{{route('admin.akun.search')}}" method="get">
                  <div class="input-group">
                    <input type="search" class="form-control" name="search">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                    <span class="input-group-prepend" style="position: relative; z-index: 0">
                      <a href="{{route('admin.akun')}}" class="btn btn-warning">Reset</a>
                    </span>
                  </div>
                </form>
                </div>
              </div>
                <hr>
              <table class="table" id="data">
                @if ($akun)
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nip</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                  @foreach ($akun as $no => $a)    
                    <tr>
                    <th>{{$akun->firstItem()+$no}}</th>
                    <th>{{$a->nip}}</th>
                    <th>{{$a->pegawai()->first()->nama}}</th>
                    <th>{{$a->jabatan()->first()->nama_jabatan}}</th>
                    <th>
                    <a href="{{route('admin.akun.edit', $a->id_pegawai)}}" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                    <a href="#" data-id="{{$a->id_pegawai}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                      <form style="display: none" action="{{route('admin.akun.hapus', $a->id_pegawai)}}" method="POST" id="hapus{{$a->id_pegawai}}">
                              @csrf
                              @method('delete')
                          </form>
                          <i class="fas fa-times"></i>
                      </a>
                      </th>
                  </tr>
                  @endforeach
                  </tbody>
                @else
                  <h1 class="text-center">Data tidak ditemukan</h1>
                @endif
              </table>
              {{$akun->links()}}
            </div>
          </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bb-1">
        <h5 class="modal-title" id="modalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.akun.simpan')}}" method="POST">
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
                          <input type="text" class="form-control" value="{{old('nama')}}" name="nama">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
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
                        <input type="text" class="form-control" value="{{old('nip')}}" name="nip">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" id="" class="form-control">
                            @foreach ($list as $item)
                            <option value="{{$item->id_golongan}}">{{$item->nama_jabatan}}</option>
                            @endforeach
                        </select>
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