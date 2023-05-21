@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
<h1>Edit Data</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="">Pasien</a></div>
      <div class="breadcrumb-item"><a href="#">Edit</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{route('resepsionist.pasien.update', $pasien->id_pasien)}}" method="POST">
                  @csrf
                  @method('patch')
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
                      <input type="text" class="form-control" @if (old('nama_pasien')) 
                      value="{{old('nama_pasien')}}" @else value="{{$pasien->nama_pasien}}" 
                      @endif name="nama_pasien">
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
                      <input type="date" class="form-control" @if (old('tgl_lahir')) 
                      value="{{old('tgl_lahir')}}" @else value="{{$pasien->tgl_lahir}}" 
                      @endif name="tgl_lahir">
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
                            <select name="jenis_kelamin" id="" class="form-control">
                              @if ($pasien->jenis_kelamin)
                          <option value="{{$pasien->jenis_kelamin}}" selected>{{$pasien->jenis_kelamin}}</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-laki">Laki-Laki</option>
                          @else
                          <option value="choose">-Pilih-</option>
                          <option value="Perempuan">Perempuan</option>
                          <option value="Laki-laki">Laki-Laki</option>
                          @endif
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
                        <input type="text" class="form-control" @if (old('no_telfon')) 
                        value="{{old('no_telfon')}}" @else value="{{$pasien->no_telfon}}" 
                        @endif name="no_telfon">
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
                          @if ($pasien->gol_darah)
                          <option value="{{$pasien->gol_darah}}" selected>{{$pasien->gol_darah}}</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>    
                          @else
                            <option value="#">-pilih-</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>    
                          @endif
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
                            <select name="jenis_kelamin" id="" class="form-control">
                              @if ($pasien->status_nikah)
                          <option value="{{$pasien->status_nikah}}" selected>{{$pasien->status_nikah}}</option>
                                <option value="Sudah">Sudah</option>
                                <option value="Belum">Belum</option>
                          @else
                          <option value="choose">-Pilih-</option>
                          <option value="Sudah">Sudah</option>
                          <option value="Belum">Belum</option>
                          @endif
                            </select>
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
                        <textarea class="form-control" name="alamat" rows="3">{{$pasien->alamat}}</textarea>
                        </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{route('resepsionist.pasien')}}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush