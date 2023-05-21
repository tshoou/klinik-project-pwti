@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Edit Akun</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('admin.akun') }}">Akun</a></div>
      <div class="breadcrumb-item"><a href="#">Edit</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="{{ route('admin.akun.update', $akun->id_pegawai) }}" method="POST">
                    @csrf
                    @method('patch')
                  <div class="row">
                    <div class="col-md-12">
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
                        <input type="text" class="form-control" @if (old('nama'))
                        value="{{old('nama')}}" @else value="{{$akun->pegawai()->first()->nama}}"
                      @endif name="nama">
                      </div>
                      </div>
                    </div>
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
                        <input type="text" class="form-control" @if (old('nip'))
                        value="{{old('nip')}}" @else value="{{$akun->nip}}"
                      @endif name="nip">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" id="" class="form-control">
                            @foreach ($list as $item)
                            <option value="{{$item->id_golongan}}" {{$item->id_golongan == $akun->id_golongan ? 'selected' : ''}}>{{$item->nama_jabatan}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label @error('password')
                            class="text-danger"
                        @enderror>Password @error('password')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-key"></i>
                            </div>
                          </div>
                        <input type="text" class="form-control" name="password" id="password" readonly>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Kirim</button>
                  <a href="{{ route('admin.akun') }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
@endpush