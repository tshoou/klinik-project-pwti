@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Edit Dokter</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{route('admin.home')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('admin.dokter')}}">Dokter</a></div>
      <div class="breadcrumb-item"><a href="#">Edit</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{route('admin.dokter.update', $dokter->id_pegawai)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('nip')
                            class="text-danger"
                        @enderror>NIP @error('nip')
                            | {{$message}}
                        @enderror</label>
                        <input type="text" class="form-control" @if (old('nip'))
                        value="{{old('nip')}}" @else value="{{$dokter->pegawai()->first()->nip}}"
                        @endif name="nip">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('nama')
                            class="text-danger"
                        @enderror>Nama @error('nama')
                            | {{$message}}
                        @enderror</label>
                      <input type="text" class="form-control" @if(old('nama')) 
                      value="{{old('nama')}}" @else value="{{$dokter->pegawai()->first()->nama}}" 
                      @endif name="nama">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Gol/Jabatan</label>
                        <select name="id_golongan" id="" class="form-control" style="text-transform: capitalize">
                            @foreach ($list as $item)
                            <option value="{{$item->id_golongan}}" {{$item->id_golongan == $dokter->id_golongan ? 'selected' : ''}}>{{$item->nama_jabatan}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="" class="form-control">
                            <option value="choose">{{$dokter->pegawai()->first()->jenis_kelamin}}</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki-laki">Laki-Laki</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label @error('tgl_lahir')
                            class="text-danger"
                        @enderror>tgl_lahir @error('tgl_lahir')
                            | {{$message}}
                        @enderror</label>
                        <input type="date" class="form-control" @if (old('tgl_lahir')) 
                      value="{{old('tgl_lahir')}}" @else value="{{$dokter->pegawai()->first()->tgl_lahir}}" 
                      @endif name="tgl_lahir">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('email')
                            class="text-danger"
                        @enderror>email @error('email')
                            | {{$message}}
                        @enderror</label>
                      <input type="text" class="form-control" @if (old('email')) 
                      value="{{old('email')}}" @else value="{{$dokter->pegawai()->first()->email}}" 
                      @endif name="email">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('pendidikan')
                            class="text-danger"
                        @enderror>pendidikan @error('pendidikan')
                            | {{$message}}
                        @enderror</label>
                        <input type="text" class="form-control" @if (old('pendidikan')) 
                      value="{{old('pendidikan')}}" @else value="{{$dokter->pegawai()->first()->pendidikan}}" 
                      @endif name="pendidikan">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('alamat')
                            class="text-danger"
                        @enderror>alamat @error('alamat')
                            | {{$message}}
                        @enderror</label>
                        <input type="text" class="form-control" @if (old('alamat')) 
                      value="{{old('alamat')}}" @else value="{{$dokter->pegawai()->first()->alamat}}" 
                      @endif name="alamat">
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label @error('senin')
                              class="text-danger"
                          @enderror>Senin @error('senin')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('senin')) 
                          value="{{old('senin')}}" @else value="{{$dokter->senin}}" 
                          @endif name="senin" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label @error('selasa')
                              class="text-danger"
                          @enderror>selasa @error('selasa')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('selasa')) 
                          value="{{old('selasa')}}" @else value="{{$dokter->selasa}}" 
                          @endif name="selasa" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label @error('rabu')
                              class="text-danger"
                          @enderror>rabu @error('rabu')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('rabu')) 
                          value="{{old('rabu')}}" @else value="{{$dokter->rabu}}" 
                          @endif name="rabu" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label @error('kamis')
                              class="text-danger"
                          @enderror>kamis @error('kamis')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('kamis')) 
                          value="{{old('kamis')}}" @else value="{{$dokter->kamis}}" 
                          @endif name="kamis" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label @error('jumat')
                              class="text-danger"
                          @enderror>Jumat @error('jumat')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('jumat')) 
                          value="{{old('jumat')}}" @else value="{{$dokter->jumat}}" 
                          @endif name="jumat" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label @error('sabtu')
                              class="text-danger"
                          @enderror>Sabtu @error('sabtu')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('sabtu')) 
                          value="{{old('sabtu')}}" @else value="{{$dokter->sabtu}}" 
                          @endif name="sabtu" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label @error('minggu')
                              class="text-danger"
                          @enderror>Minggu @error('minggu')
                              | {{$message}}
                          @enderror</label>
                          <input type="text" class="form-control" @if(old('minggu')) 
                          value="{{old('minggu')}}" @else value="{{$dokter->minggu}}" 
                          @endif name="minggu" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label @error('biaya_jasa')
                              class="text-danger"
                          @enderror>biaya_jasa @error('biaya_jasa')
                              | {{$message}}
                          @enderror</label>
                          <input type="number" class="form-control" @if(old('biaya_jasa')) 
                          value="{{old('biaya_jasa')}}" @else value="{{$dokter->biaya_jasa}}" 
                          @endif name="biaya_jasa" placeholder="Libur / 07:00 - 22:00">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{route('admin.dokter')}}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush