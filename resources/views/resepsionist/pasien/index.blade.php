@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Pasien</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('resepsionist.home')}}">Dashboard</a></div>
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
                  <a type="button" class="btn btn-primary text-white" data-target="#modalInsert" data-toggle="modal">Tambah Data</a>
                </div>
              <div class="col-md-6">
              <form action="{{route('resepsionist.pasien.search')}}" method="get">
                  <div class="input-group">
                    <input type="search" class="form-control" name="search">
                    <span class="input-group-prepend">
                      <button type="submit" class="btn btn-primary">Cari</button>
                    </span>
                    <span class="input-group-prepend" style="position: relative; z-index: 0">
                      <a href="{{route('resepsionist.pasien')}}" class="btn btn-warning">Reset</a>
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
                      <a href="{{route('resepsionist.pasien.detail',$pasiens->id_pasien)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Details"><i class="fas fa-info"></i></a>
                        <a href="{{route('resepsionist.pasien.edit', $pasiens->id_pasien)}}" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                        <a href="#" data-id="{{$pasiens->id_pasien}}" class="btn btn-icon btn-danger confirmation" data-toggle="tooltip" data-placement="top" title="Hapus">
                        <form style="display: none" action="{{route('resepsionist.pasien.hapus', $pasiens->id_pasien)}}" method="POST" id="hapus{{$pasiens->id_pasien}}">
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
      <form action="{{route('resepsionist.pasien.simpan')}}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label @error('nama_pasien')
                    class="text-danger"
                @enderror>Nama Lengkap @error('nama_pasien')
                    | {{$message}}
                @enderror</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-signature"></i>
                    </div>
                  </div>
              <input type="text" class="form-control" value="{{old('nama_pasien')}}" name="nama_pasien" required>
              </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label @error('tgl_lahir')
                    class="text-danger"
                @enderror>Tanggal Lahir @error('tgl_lahir')
                    | {{$message}}
                @enderror</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-calendar-alt"></i>
                    </div>
                  </div>
              <input type="date" class="form-control" value="{{old('tgl_lahir')}}" name="tgl_lahir" required>
              </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-venus-mars"></i>
                        </div>
                      </div>
                    <select name="jenis_kelamin" id="" class="form-control" required>
                        <option value="#">-Pilih-</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Laki-laki">Laki-Laki</option>
                    </select>
                  </div>
                  </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label @error('gol_darah')
                    class="text-danger"
                @enderror>Golongan Darah @error('gol_darah')
                    | {{$message}}
                @enderror</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-signature"></i>
                    </div>
                  </div>
                <select name="gol_darah" id="" class="form-control" required>
                    <option value="#">-pilih-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
              </div>
              </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label @error('status_nikah')
                  class="text-danger"
              @enderror>Status Nikah @error('status_nikah')
                  | {{$message}}
              @enderror</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-signature"></i>
                  </div>
                </div>
            <select name="status_nikah" id="" class="form-control" required>
              <option value="#">-pilih-</option>
              <option value="Sudah">Sudah</option>
              <option value="Belum">Belum</option>
            </select>
            </div>
            </div>
        </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label @error('no_telfon')
                      class="text-danger"
                  @enderror>No Telfon @error('no_telfon')
                      | {{$message}}
                  @enderror</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-phone"></i>
                      </div>
                    </div>
                <input type="text" class="form-control" value="{{old('no_telfon')}}" name="no_telfon" required>
                </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label @error('alamat')
                      class="text-danger"
                  @enderror>Alamat @error('alamat')
                      | {{$message}}
                  @enderror</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-signature"></i>
                      </div>
                    </div>
                <textarea class="form-control" name="alamat" rows="3" required></textarea>
                </div>
                </div>
              </div>
          </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
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