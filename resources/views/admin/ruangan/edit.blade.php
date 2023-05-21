@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Edit Ruang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('admin.ruang') }}">Ruang</a></div>
      <div class="breadcrumb-item"><a href="#">Tambah</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{route('admin.ruang.update', $ruang->id_ruang)}}" method="POST">
                  @method ('patch')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('nama_ruang')
                            class="text-danger"
                        @enderror>nama ruang @error('nama_ruang')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-signature"></i>
                            </div>
                          </div>
                      <input type="text" class="form-control" @if (old('nama_ruang')) 
                      value="{{old('nama_ruang')}}" @else value="{{$ruang->nama_ruang}}"
                      @endif name="nama_ruang">
                      </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gedung</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-building"></i>
                            </div>
                          </div>
                        <select name="id_gedung" id="" class="form-control">
                            @foreach ($list as $item)
                            <option value="{{$item->id_gedung}}" {{$item->id_gedung == $ruang->id_gedung ? 'selected' : ''}}>{{$item->id_gedung}}-{{$item->nama_gedung}}</option>
                            @endforeach
                        </select>
                      </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('keterangan_fr')
                            class="text-danger"
                        @enderror>Keterangan @error('keterangan_fr')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-signature"></i>
                            </div>
                          </div>
                      <textarea class="form-control" value="{{old('keterangan_fr')}}" name="keterangan_fr" rows="3">{{old('keterangan_fr', $ruang->keterangan_fr)}}</textarea>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{ route('admin.ruang') }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush