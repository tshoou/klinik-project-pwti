@extends('admin.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Detail Rekam Medis</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{route('admin.home')}}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{route('admin.rekammedis')}}">Rekam Medis</a></div>
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
            <a href="{{route('admin.rekammedis')}}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h4>Data pasien</h4>
              </div>
              <div class="card-body">
                    <p>Nama Pasien : {{$rekammedis->first()->pasien()->first()->nama_pasien}}</p>
                    <p>Tanggal Lahir : {{$rekammedis->first()->pasien()->first()->tgl_lahir}}</p>
                    <p>Jenis kelamin : {{$rekammedis->first()->pasien()->first()->jenis_kelamin}}</p>
                    <p>No Telfon : {{$rekammedis->first()->pasien()->first()->no_telfon}}</p>
                    <p>Golongan darah : {{$rekammedis->first()->pasien()->first()->gol_darah}}</p>
                    <p>Alamat : {{$rekammedis->first()->pasien()->first()->alamat}}</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Rekam Medis</h4>
              </div>
              <div class="card-body">
                    <p>Keluhan : {{$rekammedis->first()->keluhan}}</p>
                    @if ($rekammedis->first()->ket_proses == 'selesai')
                        <p>Diagnosa : {{$rekammedis->first()->diagnosa}}</p>
                        <p>Dokter : Dr. {{$rekammedis->first()->dokter()->first()->pegawai()->first()->nama}}</p>
                    @elseif($rekammedis->first()->ket_proses == 'proses_pembayaran')
                        <p>Diagnosa : {{$rekammedis->first()->diagnosa}}</p>
                    @else
                        <p>Diagnosa : -</p>
                    @endif
                    <p>Keterangan Masuk : {{$rekammedis->first()->keterangan_masuk}}</p>
              </div>
              <div class="card-footer" style="text-transform: capitalize">
                Keterangan Proses : {{$rekammedis->first()->ket_proses}}
                <hr>
                @if ($rekammedis->first()->tgl_keluar)
                Keluar pada tanggal : {{$rekammedis->first()->tgl_keluar}}
                @else
                Proses
                @endif
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-6 col-lg-6"> 
              <div class="card author-box card-primary">
                  <div class="card-header">
                    <h4>Data pembayaran & obat</h4>
                  </div>
                  @if ($rekammedis->first()->ket_proses == 'selesai')
                  <div class="card-body">
                    @foreach($rekamobat as $r)
                     <input hidden type="harga" id="harga" value="{{ $r->harga }}" name="harga"></input>
                    @endforeach 
                    @foreach($rekamobat as $r)
                    <p>
                       <span style="font-size: 1rem; font-weight: 700">{{ $r->nama_obat }}</span> <span class="float-right">{{ $r->harga }}</span>
                    </p>
                    @endforeach 
                    <p>
                       <span style="font-size: 1rem; font-weight: 700">Biaya Jasa</span> <input type="number" class="form-control text-right" value="{{ $rekammedis->first()->dokter()->first()->biaya_jasa }}" name="harga" id="harga">
                    </p>
                    <hr>
                    @if ($rekamobat->first()->id_kasir)
                    <p>Kasir : {{ $rekamobat->first()->kasir()->first()->nama }}</p>
                    @else
                    <p>Kasir : -</p>
                    @endif
                        <form action="" method="POST">
                        @method ('patch')
                        @csrf
                        <div class="form-group mt-4">
                            <input hidden type="text" value="{{ Auth::user()->pegawai()->first()->id_pegawai }}" name="id_kasir">
                        </div>  
                        <div class="form-group mt-4">
                            <input hidden type="text" value="{{ Auth::user()->pegawai()->first()->id_pegawai }}" name="id_kasir" readonly>
                            <label for="" style="font-size: 1rem; font-weight: 700;">Total</label>
                            @if ($rekamobat->first()->total_pembayaran)
                              <input type="number" value="{{ $rekamobat->first()->total_pembayaran }}" class="form-control text-right" name="total_pembayaran" readonly> 
                            @else
                              <input type="number" id="total" class="form-control text-right" name="total_pembayaran" readonly> 
                            @endif
                        </div>
                    </form>
                  </div> 
                  @elseif($rekammedis->first()->ket_proses == 'proses_pembayaran')
                  <div class="card-body">
                    @foreach($rekamobat as $r)
                     <input hidden type="harga" id="harga" value="{{ $r->harga }}" name="harga"></input>
                    @endforeach 
                    @foreach($rekamobat as $r)
                    <p>
                       <span style="font-size: 1rem; font-weight: 700">{{ $r->nama_obat }}</span> <span class="float-right">{{ $r->harga }}</span>
                    </p>
                    @endforeach 
                    <p>
                        <span style="font-size: 1rem; font-weight: 700">Biaya Jasa</span> <input type="number" class="form-control text-right" value="{{ $rekammedis->first()->dokter()->first()->biaya_jasa }}" name="harga" id="harga">
                     </p>
                    <hr>
                    @if ($rekamobat->first()->id_kasir)
                    <p>Kasir : {{ $rekamobat->first()->kasir()->first()->nama }}</p>
                    @else
                    <p>Kasir : -</p>
                    @endif
                        <form action="" method="POST">
                        @method ('patch')
                        @csrf
                        <div class="form-group mt-4">
                            <input hidden type="text" value="{{ Auth::user()->pegawai()->first()->id_pegawai }}" name="id_kasir">
                        </div>  
                        <div class="form-group mt-4">
                            <input hidden type="text" value="{{ Auth::user()->pegawai()->first()->id_pegawai }}" name="id_kasir" readonly>
                            <label for="" style="font-size: 1rem; font-weight: 700;">Total</label>
                            @if ($rekamobat->first()->total_pembayaran)
                              <input type="number" value="{{ $rekamobat->first()->total_pembayaran }}" class="form-control text-right" name="total_pembayaran" readonly> 
                            @else
                              <input type="number" id="total" class="form-control text-right" name="total_pembayaran" readonly> 
                            @endif
                        </div>
                    </form>
                  </div> 
                  @else
                      <h1 class="text-center">Proses Periksa</h1>
                  @endif
              </div>
          </div>
      </div>
  </div>
@endsection
@push('page-script')
<script>
    const findTotal = (() => {
    let arr = document.getElementsByName('harga');
    let total = document.getElementById('total');
    let tot=0;
        for(let i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        // document.getElementById('total').value = tot;
        total.setAttribute('value', tot);
    });
    findTotal();
</script>
@endpush