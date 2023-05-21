@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
<h1>Profil Saya</h1>
<div class="section-header-breadcrumb">
<div class="breadcrumb-item active"><a href="{{route('resepsionist.home')}}">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Edit</a></div>
</div>
@endsection
@section('content')
<div class="section-body">
    {{-- @foreach ($profil as $data => $d)    --}}
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-12"> 
            <div class="card">
                <div class="card-body">
                    <form action="{{route('resepsionist.profil.update', $profil->id_pegawai)}}" method="post" enctype="multipart/form-data">
                        @csrf
                  @method('patch')
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIP</label>
                            <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-signature"></i>
                        </div>
                      </div>
                            <input type="text" class="form-control"  @if (old('nip'))
                            value="{{old('nip')}}" @else value="{{$profil->nip}}"
                              @endif name="nip" disabled required>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-signature"></i>
                        </div>
                      </div>
                            <input type="text" class="form-control" @if (old('nama'))
                            value="{{old('nama')}}" @else value="{{$profil->nama}}"
                              @endif name="nama">
                        </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-signature"></i>
                        </div>
                      </div>
                    <input type="text" @if (old('alamat'))
                    value="{{old('alamat')}}" @else value="{{$profil->alamat}}"
                      @endif name="alamat" class="form-control">
                </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-venus-mars"></i>
                              </div>
                            </div>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="Laki-Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-at"></i>
                              </div>
                            </div>
                        <input type="email" class="form-control"  @if (old('email'))
                        value="{{old('email')}}" @else value="{{$profil->email}}"
                          @endif name="email" placeholder="email@gmail.com">
                    </div>
                    </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-calendar-alt"></i>
                              </div>
                            </div>
                        <input type="date" class="form-control" @if (old('tgl_lahir'))
                        value="{{old('date2', date('Y-m-d'))}}" @else value="{{$profil->tgl_lahir}}"
                          @endif name="tanggal_lahir">
                    </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Pendidikan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-signature"></i>
                              </div>
                            </div>
                        <input type="text" class="form-control" @if (old('pendidikan'))
                        value="{{old('pendidikan')}}" @else value="{{$profil->pendidikan}}"
                          @endif name="pendidikan">
                    </div>
                    </div>
                    </div>
                </div><br>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                    <a href="{{route('resepsionist.profil', Auth::user()->id_pegawai)}}" class="btn btn-warning">Kembali</a>
                  </div>
                </form>
              </div>
      </div>
    {{-- @endforeach --}}
</div>
@endsection
@push('page-script')
@endpush
@push('after-script')
@endpush