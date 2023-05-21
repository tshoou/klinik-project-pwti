@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Edit Data</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="">Obat</a></div>
      <div class="breadcrumb-item"><a href="#">Edit</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
              <div class="card-body">
              <form action="{{route('resepsionist.obat.update', $obat->id_obat)}}" method="POST">
                @method ('patch')
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
                    <input type="text" class="form-control" @if (old('nama_obat')) 
                    value="{{old('nama_obat')}}" @else value="{{$obat->nama_obat}}" 
                    @endif name="nama_obat">
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
                      <textarea class="form-control" type="text" name="kegunaan" rows="3">{{old('kegunaan', $obat->kegunaan)}}</textarea>
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
                    <input type="text" class="form-control" @if (old('harga')) 
                    value="{{old('harga')}}" @else value="{{$obat->harga}}" 
                    @endif name="harga">
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
                <a href="{{ route('resepsionist.obat') }}" class="btn btn-warning">Kembali</a>
              </div>
            </form>
            </div>
      </div>  
  </div>
</div>
@endsection
@push('page-script')
@endpush