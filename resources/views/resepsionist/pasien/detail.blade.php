@extends('resepsionist.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Detail Pasien</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{route('resepsionist.home')}}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{route('resepsionist.pasien')}}">Pasien</a></div>
      <div class="breadcrumb-item"><a href="#">Details</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Detail Data</h2>
            <p class="section-lead">
              Atur rekam medis
            </p>
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{route('resepsionist.pasien')}}" class="btn btn-primary">Kembali</a>
            </div>
        <div class="col-6 col-sm-6 col-lg-6"> 
            <div class="card author-box card-primary">
                <div class="card-body">
                        <div class="author-box-name">
                        @if ($pasien->nama_pasien == null)
                            <p class="text-capitalize">Nama : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">{{$pasien->nama_pasien}}</p>
                        @endif
                        </div>
                        <div class="author-box-description">
                          <div>
                        @if ($pasien->tgl_lahir == null)
                            <p class="text-capitalize">Tanggal Lahir : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Tanggal Lahir : {{$pasien->tgl_lahir}}</p>
                        @endif
                        @if ($pasien->jenis_kelamin == null)
                            <p class="text-capitalize">Jenis Kelamin : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Jenis Kelamin : {{$pasien->jenis_kelamin}}</p>
                        @endif
                        @if ($pasien->no_telfon == null)
                            <p class="text-capitalize">No Telfon : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">No Telfon : {{$pasien->no_telfon}}</p>
                        @endif
                        @if ($pasien->gol_darah == null)
                            <p class="text-capitalize">Golongan Darah : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Golongan Darah : {{$pasien->gol_darah}}</p>
                        @endif
                        @if ($pasien->status_nikah == null)
                            <p class="text-capitalize">Status Nikah : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Status Nikah : {{$pasien->status_nikah}}</p>
                        @endif
                        @if ($pasien->alamat == null)
                            <p class="text-capitalize">Alamat : Belum di isi</p>
                            @else 
                            <p class="text-capitalize">Alamat : {{$pasien->alamat}}</p>
                        @endif
                          </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-6"> 
          <div class="card author-box card-primary">
            <div class="card-header">
              <h4 class="text-capitalize">Atur rekam medis</h4>
            </div>
            <div class="card-body">
                <a type="button" class="btn btn-primary text-white" data-target="#modalInsert" data-toggle="modal">Rekam Medis</a>
            </div>
          </div>
        </div>
        <div class="col-md-12"> 
          <div class="card author-box card-primary">
            <div class="card-header">
              <h4 class="text-capitalize">Data rekam medis</h4>
            </div>
            <div class="card-body">
              @if (session('message'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{session('message')}}
                        </div>
                    </div>
              @endif
                <table class="table" id="data">
                    <thead>
                        <tr>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
                            <th scope="col">Pembayaran</th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody style="text-transform: capitalize;">
                    @foreach ($rekammedis as $no => $rekam)
                    <tr>
                        <th> {{$rekam->tgl_masuk}}</th>
                        @if ($rekam->tgl_keluar)
                          <th> {{$rekam->tgl_keluar}}</th>
                        @else
                          <th> Proses</th>  
                        @endif
                        @if ($rekam->total_pembayaran)
                          <th> {{$rekam->total_pembayaran}}</th>
                        @else
                          <th> Proses</th>  
                        @endif
                        <th>
                          <a href="{{route('resepsionist.rekammedis.detail',$rekam->id_rekam_medis)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Selengkapnya"><i class="fas fa-info"></i></a>
                        </th>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{$rekammedis->links()}}
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bb-1">
          <h5 class="modal-title" id="modalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form action="{{route('resepsionist.rekammedis.simpan')}}" method="POST">
          @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label @error('nama_pasien')
                                        class="text-danger"
                                    @enderror>Nama @error('nama_pasien')
                                        | {{$message}}
                                    @enderror</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-signature"></i>
                                        </div>
                                      </div>
                                    <input hidden type="text" value="{{$pasien->id_pasien}}" name="id_pasien">
                                    <input type="text" class="form-control" @if (old('nama_pasien'))
                                    value="{{old('nama_pasien')}}" @else value="{{$pasien->nama_pasien}}"
                                  @endif name="nama_pasien" readonly>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label @error('keluhan')
                                        class="text-danger"
                                    @enderror>Keluhan @error('keluhan')
                                        | {{$message}}
                                    @enderror</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-signature"></i>
                                        </div>
                                      </div>
                                    <input type="text" class="form-control" value="{{old('keluhan')}}" name="keluhan" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label @error('keterangan_masuk')
                                        class="text-danger"
                                    @enderror>Keterangan Masuk @error('keterangan_masuk')
                                        | {{$message}}
                                    @enderror</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-signature"></i>
                                        </div>
                                      </div>
                                    <input type="text" class="form-control" value="{{old('keterangan_masuk')}}" name="keterangan_masuk" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label>Dokter Periksa</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">
                                          <i class="fas fa-user-md"></i>
                                        </div>
                                      </div>
                                        <select name="id_dokter" id="" class="form-control" style="text-transform: capitalize">
                                            @foreach ($dokter as $item)
                                                <option value="{{$item->id_dokter}}">Dr. {{$item->pegawai()->first()->nama}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@push('page-script')
{{-- <script>
    $(document).ready(function(){
      // let select = document.querySelectorAll('#selectObat');
        $("#selectDokter").select2({
            placeholder:"Cari Dokter",
            multiple: true,
            allowClear: true,
        });
    });
</script> --}}
@endpush