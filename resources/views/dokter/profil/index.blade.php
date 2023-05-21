@extends('dokter.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
<h1>Profil Saya</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="{{route('dokter.home')}}">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Profil</a></div>
  </div>
@endsection
@section('content')
<div class="section-body">
    @foreach ($profil as $data => $d)   
    <div class="row">
        <div class="col-4 col-sm-4 col-lg-4"> 
            <div class="card author-box card-primary">
                <div class="card-body">
                    @if (Auth::user()->pegawai()->first()->foto)
                            <img alt="Foto Profil" src="{{url('uploads/'.$d->foto)}}" class="rounded author-box-picture w-100">
                        @else
                            <img alt="Foto Profil" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded author-box-picture w-100">
                        @endif
                        <div class="clearfix"></div> 
                </div>
            </div>
        </div>
        <div class="col-8 col-sm-8 col-lg-8"> 
            <div class="card author-box card-primary">
                <div class="card-body">
                        <div class="author-box-name">
                        @if ($d->nama == null)
                            <p>Nama : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Dr. {{$d->nama}}</p>
                        @endif
                        </div>
                        <div class="author-box-job">Anda adalah {{$d->nama_jabatan}}</div>
                        <div class="author-box-description">
                        @if ($d->nip == null)
                            <p>NIP : Belum di isi</p>
                            @else 
                            <p>NIP : {{$d->nip}}</p>
                        @endif
                        @if ($d->jenis_kelamin == null)
                            <p>Jenis Kelamin : Belum di isi</p>
                            @else 
                            <p>Jenis Kelamin : {{$d->jenis_kelamin}}</p>
                        @endif
                        @if ($d->alamat == null)
                            <p>Alamat : Belum di isi</p>
                            @else 
                            <p>Alamat : {{$d->alamat}}</p>
                        @endif
                        @if ($d->email == null)
                            <p>Email : Belum di isi</p>
                            @else 
                            <p>Email : {{$d->email}}</p>
                        @endif
                        @if ($d->tgl_lahir == null)
                            <p>Tanggal Lahir : Belum di isi</p>
                            @else 
                            <p>Tanggal Lahir : {{$d->tgl_lahir}}</p>
                        @endif
                        @if ($d->pendidikan == null)
                            <p>Pendidikan : Belum di isi</p>
                            @else 
                            <p>Pendidikan : {{$d->pendidikan}}</p>
                        @endif

                        <hr>

                        <h5>Jadwal</h5>
                        @if ($d->senin == null)
                          <p>Senin : Tidak ada jadwal</p>
                          @elseif($d->senin == '-')
                          <p>Senin : Tidak ada jadwal</p>
                          @else 
                          <p>Senin : {{$d->senin}}</p>
                        @endif
                        @if ($d->selasa == null)
                          <p>Selasa : Tidak ada jadwal</p>
                          @elseif($d->selasa == '-')
                          <p>Selasa : Tidak ada jadwal</p>
                          @else 
                          <p>Selasa : {{$d->selasa}}</p>
                        @endif
                        @if ($d->rabu == null)
                          <p>Rabu : Tidak ada jadwal</p>
                          @elseif($d->rabu == '-')
                          <p>Rabu : Tidak ada jadwal</p>
                          @else 
                          <p>Rabu : {{$d->rabu}}</p>
                        @endif
                        @if ($d->kamis == null)
                          <p>Kamis : Tidak ada jadwal</p>
                          @elseif($d->kamis == '-')
                          <p>Kamis : Tidak ada jadwal</p>
                          @else 
                          <p>Kamis : {{$d->kamis}}</p>
                        @endif
                        @if ($d->jumat == null)
                          <p>Jumat : Tidak ada jadwal</p>
                          @elseif($d->jumat == '-')
                          <p>Jumat : Tidak ada jadwal</p>
                          @else 
                          <p>Jumat : {{$d->jumat}}</p>
                        @endif
                        @if ($d->sabtu == null)
                          <p>Sabtu : Tidak ada jadwal</p>
                          @elseif($d->sabtu == '-')
                          <p>Sabtu : Tidak ada jadwal</p>
                          @else 
                          <p>Sabtu : {{$d->sabtu}}</p>
                        @endif
                        @if ($d->minggu == null)
                          <p>Minggu : Tidak ada jadwal</p>
                          @elseif($d->minggu == '-')
                          <p>Minggu : Tidak ada jadwal</p>
                          @else 
                          <p>Minggu : {{$d->minggu}}</p>
                        @endif
                        @if ($d->biaya_jasa == null)
                          <p>Biaya Jasa : 0</p>
                          @else 
                          <p>Biaya Jasa : {{$d->biaya_jasa}}</p>
                        @endif
                        </div>
                        <div class="w-100 d-sm-none"></div>
                        <div class="float-right mt-sm-0 mt-3">
                        <a href="{{route('dokter.profil.edit', $d->id_pegawai)}}" class="btn">Edit Data Pribadi <i class="fas fa-chevron-right"></i></a>
                        <a type="button" class="btn" data-target="#modalInsert" data-toggle="modal">Edit Foto Profil <i class="fas fa-chevron-right"></i></a>
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
          <h5 class="modal-title" id="modalLabel">Ganti Foto Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('dokter.profil.updateFoto', $d->id_pegawai)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="foto">Foto</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-file"></i>
                </div>
              </div>
            <input type="file" @if (old('foto'))
            value="{{old('foto')}}" @else value="{{$d->foto}}"
              @endif name="foto" class="form-control" required>
        </div>
        </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
@endsection
@push('page-script')
@endpush
@push('after-script')
@endpush