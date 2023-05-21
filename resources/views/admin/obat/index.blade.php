@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Obat</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('admin.home')}}">Dashboard</a></div>
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
                    <a type="button" class="btn btn-primary text-white" data-target="#modalInsert" data-toggle="modal">Tambah Data</a>
                </div>
              <div class="col-md-6">
              <form action="{{route('admin.obat.search')}}" method="get">
                <div class="input-group">
                  <input type="search" class="form-control" name="search">
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </span>
                  <span class="input-group-prepend" style="position: relative; z-index: 0">
                    <a href="{{route('admin.obat')}}" class="btn btn-warning">Reset</a>
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
                        <th scope="col">Opsi</th>
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
                    <th>
                        <a href="{{route('admin.obat.edit', $o->id_obat)}}" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="#" data-id="{{$o->id_obat}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <form style="display: none" action="{{route('admin.obat.hapus', $o->id_obat)}}" method="POST" id="hapus{{$o->id_obat}}">
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
                {{$Obat->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bb-1">
          <h5 class="modal-title" id="modalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('admin.obat.simpan')}}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label @error('nama_obat')
                      class="text-danger"
                  @enderror>Nama Obat @error('nama_obat')
                      | {{$message}}
                  @enderror</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-signature"></i>
                      </div>
                    </div>
                <input type="text" class="form-control" value="{{old('nama_obat')}}" name="nama_obat">
                </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Jenis Obat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-signature"></i>
                      </div>
                    </div>
                  <select name="jenis_obat" id="" class="form-control">
                  <option value="Pil">Pil</option>
                  <option value="Tablet">Tablet</option>
                  <option value="Kaplet">Kaplet</option>
                  <option value="Syrup">Syrup</option>
                  <option value="Injeksi/Suntik">Injeksi/Suntik</option>
                  <option value="Salep">Salep</option>
                  </select>
                </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label @error('kegunaan')
                      class="text-danger"
                  @enderror>Kegunaan @error('kegunaan')
                      | {{$message}}
                  @enderror</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-signature"></i>
                      </div>
                    </div>
                  <textarea class="form-control" value="{{old('kegunaan')}}" name="kegunaan" rows="3"></textarea>
                </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label @error('harga')
                      class="text-danger"
                  @enderror>Harga @error('harga')
                      | {{$message}}
                  @enderror</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                      </div>
                    </div>
                <input type="text" class="form-control" value="{{old('harga')}}" name="harga">
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