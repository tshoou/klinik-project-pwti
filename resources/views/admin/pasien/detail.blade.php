@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Detail Pasien</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{route('admin.home')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('admin.pasien')}}">Pasien</a></div>
      <div class="breadcrumb-item"><a href="#">Details</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <h2 class="section-title">Detail Data</h2>
            <p class="section-lead">
              Selengkapnya
            </p>
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="{{route('admin.pasien')}}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-5 col-sm-5 col-lg-5"> 
            <div class="card author-box card-primary">
                <div class="card-body">
                        <div class="author-box-name">
                        @if ($pasien->nama_pasien == null)
                            <p class="text-capitalize">Nama : Belum di isi</p>
                            @else 
                            <p class="text-capitalize font-weight-bold">{{$pasien->nama_pasien}}</p>
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
        <div class="col-7 col-sm-7 col-lg-7"> 
          <div class="card author-box card-primary">
            <div class="card-header">
              <h4 class="text-capitalize">Riwayat Rekam Medis</h4>
            </div>
            <div class="card-body">
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
                          <a href="{{route('admin.rekammedis.detail',$rekam->id_rekam_medis)}}" class="btn btn-icon btn-info" data-toggle="tooltip" data-placement="top" title="Selengkapnya"><i class="fas fa-info"></i></a>
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