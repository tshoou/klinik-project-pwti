@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Edit Gedung</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('admin.gedung') }}">Gedung</a></div>
      <div class="breadcrumb-item"><a href="#">Edit</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{route('admin.gedung.update', $Gedung->id_gedung)}}" enctype="multipart/form-data" method="POST">    
                  @method ('patch')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('nama_gedung')
                            class="text-danger"
                        @enderror>Nama gedung @error('nama_gedung')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-signature"></i>
                      </div>
                    </div>
                      <input type="text" class="form-control" @if (old('nama_gedung')) 
                      value="{{old('nama_gedung')}}" @else value="{{$Gedung->nama_gedung}}" 
                      @endif name="nama_gedung">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('lantai')
                            class="text-danger"
                        @enderror>Jumlah Lantai @error('lantai')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-signature"></i>
                      </div>
                    </div>
                      <input type="text" class="form-control" @if (old('lantai')) 
                      value="{{old('lantai')}}" @else value="{{$Gedung->lantai}}" 
                      @endif name="lantai">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('tgl_berdiri')
                            class="text-danger"
                        @enderror>Tanggal berdiri @error('tgl_berdiri')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-calendar-alt"></i>
                            </div>
                          </div>
                      <input type="date" class="form-control" @if (old('tgl_berdiri')) 
                      value="{{old('tgl_berdiri')}}" @else value="{{$Gedung->tgl_berdiri}}" 
                      @endif name="tgl_berdiri">
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{ route('admin.gedung') }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush