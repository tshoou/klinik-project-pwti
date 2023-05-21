@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Detail Dokter</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="">Dokter</a></div>
      <div class="breadcrumb-item"><a href="#">Details</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
  <div class="row">
      <div class="col-12 col-sm-12 col-lg-12"> 
          <div class="card author-box card-primary">
              <div class="card-body">
                  <div class="author-box-left">
                      <img alt="Foto Profil" src="" class="rounded author-box-picture">
                      <div class="clearfix"></div>
                  </div>
                  <div class="author-box-details">
                      <div class="author-box-name">
                      @if ($pegawai->nama == null)
                          <p>Nama : Belum di isi</p>
                          @else 
                          <p>{{$pegawai->nama}}</p>
                      @endif
                      </div>
                      <div class="author-box-job">Jabatan : {{$pegawai->jabatan()->first()->nama_jabatan}}</div>
                      <div class="author-box-description">
                     @if ($pegawai->nip == null)
                          <p>NIP : Belum di isi</p>
                          @else 
                          <p>NIP : {{$pegawai->nip}}</p>
                      @endif
                      @if ($pegawai->jenis_kelamin == null)
                          <p>Jenis Kelamin : Belum di isi</p>
                          @else 
                          <p>Jenis Kelamin : {{$pegawai->jenis_kelamin}}</p>
                      @endif
                      @if ($pegawai->alamat == null)
                          <p>Alamat : Belum di isi</p>
                          @else 
                          <p>Alamat : {{$pegawai->alamat}}</p>
                      @endif
                      @if ($pegawai->email == null)
                          <p>Email : Belum di isi</p>
                          @else 
                          <p>Email : {{$pegawai->email}}</p>
                      @endif
                      @if ($pegawai->tgl_lahir == null)
                          <p>Tanggal Lahir : Belum di isi</p>
                          @else 
                          <p>Tanggal Lahir : {{$pegawai->tgl_lahir}}</p>
                      @endif
                      @if ($pegawai->pendidikan == null)
                          <p>Pendidikan : Belum di isi</p>
                          @else 
                          <p>Pendidikan : {{$pegawai->pendidikan}}</p>
                      @endif
                      @if ($pegawai->pendidikan == null)
                          <p>Pendidikan : Belum di isi</p>
                          @else 
                          <p>Pendidikan : {{$pegawai->pendidikan}}</p>
                      @endif
                       @if ($pegawai->pendidikan == null)
                          <p>Pendidikan : Belum di isi</p>
                          @else 
                          <p>Pendidikan : {{$pegawai->pendidikan}}</p>
                      @endif
                      </div>
                      <div class="w-100 d-sm-none"></div>
                      <div class="float-right mt-sm-0 mt-3">
                        <a type="button" class="btn" data-target="#modalInsert" data-toggle="modal">Edit Foto Pegawai <i class="fas fa-chevron-right"></i></a>
                        </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</div>
<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bb-1">
        <h5 class="modal-title" id="modalLabel">Ganti Foto Dokter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
        @csrf
        <div class="form-group">
          <label>Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@push('page-script')
@endpush