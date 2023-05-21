@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    @if ($pegawai->id_golongan == 3)
    <h1>Dokter</h1>
    @else
    <h1>Pegawai</h1>
    @endif
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('resepsionist.home') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('resepsionist.pegawai') }}">Pegawai</a></div>
        <div class="breadcrumb-item"><a href="#">Detail</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    @if ($pegawai->id_golongan == 3)
      <h2 class="section-title">Detail Dokter</h2>
      <p class="section-lead">
        Detail Data Dokter
      </p>    
    @else
      <h2 class="section-title">Detail Pegawai</h2>
      <p class="section-lead">
        Detail Data Pegawai
      </p> 
    @endif
    <div class="row">
      @if($pegawai->id_golongan == 3) 
      <div class="col-md-12 mb-3">
      <a href="{{route('resepsionist.dokter')}}" class="btn btn-primary">Kembali</a>
      </div>
      @else
      <div class="col-md-12 mb-3">
        <a href="{{route('resepsionist.pegawai')}}" class="btn btn-primary">Kembali</a>
        </div>
      @endif
        <div class="col-6 col-sm-6 col-lg-6"> 
            <div class="card author-box card-primary">
                <div class="card-body">
                    <div class="author-box-left">
                        @if($pegawai->foto)
                        <img alt="Foto Profil" src="{{url('uploads/'.$pegawai->foto)}}" class="rounded author-box-picture">
                        @else
                        <img alt="Foto Profil" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded author-box-picture">
                        @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details">
                        <div class="author-box-name">
                        @if ($pegawai->nama == null)
                            <p class="text-capitalize">Nama : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">{{$pegawai->nama}}</p>
                        @endif
                        </div>
                        <div class="author-box-job">Jabatan : {{$pegawai->jabatan()->first()->nama_jabatan}}</div>
                        <div class="author-box-description">
                          <div>
                        @if ($pegawai->nip == null)
                            <p class="text-capitalize">NIP : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">NIP : {{$pegawai->nip}}</p>
                        @endif
                        @if ($pegawai->jenis_kelamin == null)
                            <p class="text-capitalize">Jenis Kelamin : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Jenis Kelamin : {{$pegawai->jenis_kelamin}}</p>
                        @endif
                        @if ($pegawai->alamat == null)
                            <p class="text-capitalize">Alamat : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Alamat : {{$pegawai->alamat}}</p>
                        @endif
                        @if ($pegawai->email == null)
                            <p class="text-capitalize">Email : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Email : {{$pegawai->email}}</p>
                        @endif
                        @if ($pegawai->tgl_lahir == null)
                            <p class="text-capitalize">Tanggal Lahir : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Tanggal Lahir : {{$pegawai->tgl_lahir}}</p>
                        @endif
                        @if ($pegawai->pendidikan == null)
                            <p class="text-capitalize">Pendidikan : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Pendidikan : {{$pegawai->pendidikan}}</p>
                        @endif
                        <hr>
                        @if ($pegawai->created_at == null)
                            <p class="text-capitalize">Terdaftar pada : -</p>
                            @else 
                            <p class="text-capitalize">Terdaftar pada : {{$pegawai->created_at}}</p>
                        @endif
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-6"> 
          <div class="card author-box card-primary">
            <div class="card-header">
              <h4 class="text-capitalize">{{$pegawai->nama}}</h4>
            </div>
            <div class="card-body">
              @if($pegawai->id_golongan == 3)
                @if ($pegawai->dokter()->first()->senin == null)
                  <p>Senin : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->senin == '-')
                  <p>Senin : Tidak ada jadwal</p>
                  @else 
                  <p>Senin : {{$pegawai->dokter()->first()->senin}}</p>
                @endif
                @if ($pegawai->dokter()->first()->selasa == null)
                  <p>Selasa : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->selasa == '-')
                  <p>Selasa : Tidak ada jadwal</p>
                  @else 
                  <p>Selasa : {{$pegawai->dokter()->first()->selasa}}</p>
                @endif
                @if ($pegawai->dokter()->first()->rabu == null)
                  <p>Rabu : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->rabu == '-')
                  <p>Rabu : Tidak ada jadwal</p>
                  @else 
                  <p>Rabu : {{$pegawai->dokter()->first()->rabu}}</p>
                @endif
                @if ($pegawai->dokter()->first()->kamis == null)
                  <p>Kamis : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->kamis == '-')
                  <p>Kamis : Tidak ada jadwal</p>
                  @else 
                  <p>Kamis : {{$pegawai->dokter()->first()->kamis}}</p>
                @endif
                @if ($pegawai->dokter()->first()->jumat == null)
                  <p>Jumat : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->jumat == '-')
                  <p>Jumat : Tidak ada jadwal</p>
                  @else 
                  <p>Jumat : {{$pegawai->dokter()->first()->jumat}}</p>
                @endif
                @if ($pegawai->dokter()->first()->sabtu == null)
                  <p>Sabtu : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->sabtu == '-')
                  <p>Sabtu : Tidak ada jadwal</p>
                  @else 
                  <p>Sabtu : {{$pegawai->dokter()->first()->sabtu}}</p>
                @endif
                @if ($pegawai->dokter()->first()->minggu == null)
                  <p>Minggu : Tidak ada jadwal</p>
                  @elseif($pegawai->dokter()->first()->minggu == '-')
                  <p>Minggu : Tidak ada jadwal</p>
                  @else 
                  <p>Minggu : {{$pegawai->dokter()->first()->minggu}}</p>
                @endif
                @if ($pegawai->dokter()->first()->biaya_jasa == null)
                  <p>Biaya Jasa : 0</p>
                  @else 
                  <p>Biaya Jasa : {{$pegawai->dokter()->first()->biaya_jasa}}</p>
                @endif
                <hr>
                @if ($pegawai->dokter()->first()->updated_at == null)
                  <p>Diperbarui pada : -</p>
                  @else 
                  <p>Diperbarui pada : {{$pegawai->dokter()->first()->updated_at}}</p>
                @endif
              @else
                <hr>
              @endif
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
@push('page-script')
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endpush