@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Edit Data</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('admin.jabatan') }}">Jabatan</a></div>
      <div class="breadcrumb-item"><a href="#">Edit</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{route('admin.jabatan.update', $jabatan->id_golongan)}}" enctype="multipart/form-data" method="POST">    
                  @method ('patch')
                  @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('nama_jabatan')
                            class="text-danger"
                        @enderror>Nama Jabatan @error('nama_jabatan')
                            | {{$message}}
                        @enderror</label>
                      <input type="text" class="form-control" @if (old('nama_jabatan')) 
                      value="{{old('nama_jabatan')}}" @else value="{{$jabatan->nama_jabatan}}" 
                      @endif name="nama_jabatan">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{ route('admin.jabatan') }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush