@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Tambah Data</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('admin.pegawai') }}">Pegawai</a></div>
      <div class="breadcrumb-item"><a href="#">Tambah</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{route('admin.pegawai.simpan')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
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
                      <input type="text" class="form-control" name="nip">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
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
                      <input type="text" class="form-control" name="nama">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-map-pin"></i>
                            </div>
                          </div>
                        <select name="id_golongan" id="" class="form-control">
                            @foreach ($list as $item)
                            <option value="{{$item->id_golongan}}">{{$item->nama_jabatan}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-venus-mars"></i>
                            </div>
                          </div>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option value="choose">-Pilih-</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-laki">Laki-Laki</option>
                        </select>
                      </div>
                      </div>
                    </div>
                    <div class="col-md-4">
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
                      <input type="date" class="form-control" name="tgl_lahir">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('email')
                            class="text-danger"
                        @enderror>Email @error('email')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-at"></i>
                            </div>
                          </div>
                      <input type="email" class="form-control" name="email">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('pendidikan')
                            class="text-danger"
                        @enderror>Pendidikan @error('pendidikan')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-signature"></i>
                            </div>
                          </div>
                      <input type="text" class="form-control" name="pendidikan">
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
                      <textarea class="form-control" name="alamat" rows="3"></textarea>
                      </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('foto')
                            class="text-danger"
                        @enderror>Foto @error('foto')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-file"></i>
                            </div>
                          </div>
                      <input type="file" class="form-control" name="foto">
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{ route('admin.pegawai') }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush