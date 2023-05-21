@extends('kasir.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Detail Pembayaran</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('kasir.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('kasir.pembayaranProses') }}">Data Pembayaran Proses</a></div>
      <div class="breadcrumb-item"><a href="#">Detail Pembayaran</a></div>
    </div>
@endsection
@push('page-style')
    <style>
        ul{
            list-style: none;
        }
    </style>
@endpush
@section('content')
<div class="section-body">
  @if ($rekammedis->first()->ket_proses == 'proses_pembayaran')
  <h2 class="section-title">Terima Pembayaran</h2>
  <p class="section-lead">
    Konfirmasi data pasien, beri obat, dan terima pembayaran
  </p>
  @else
  <h2 class="section-title">Data Pembayaran</h2>
  <p class="section-lead">
    Data
  </p>
  @endif
  <div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Data pasien</h4>
          </div>
          <div class="card-body">
                <p>Nama Pasien : {{$rekammedis->first()->pasien()->first()->nama_pasien}}</p>
                <p>Jenis kelamin : {{$rekammedis->first()->pasien()->first()->jenis_kelamin}}</p>
                <p>No Telfon : {{$rekammedis->first()->pasien()->first()->no_telfon}}</p>
                <p class="text-capitalize">Dokter : Dr. {{$rekammedis->first()->dokter()->first()->pegawai()->first()->nama}}</p>
                <p>Diagnosa : {{$rekammedis->first()->diagnosa}}</p>
          </div>
          <div class="card-footer" style="text-transform: capitalize">
            Keterangan Proses : {{$rekammedis->first()->ket_proses}}
          </div>
        </div>
      </div>
      <div class="col-6 col-sm-6 col-lg-6"> 
          <div class="card author-box card-primary">
              <div class="card-header">
                <h4>Data pembayaran & obat</h4>
              </div>
              <div class="card-body">
                @foreach($rekammedis as $r)
                 <input hidden type="harga" id="harga" value="{{ $r->harga }}" name="harga"></input>
                @endforeach 
                @foreach($rekammedis as $r)
                <p>
                   <span style="font-size: 1rem; font-weight: 700">{{ $r->nama_obat }}</span> <span class="float-right">{{ $r->harga }}</span>
                </p>
                @endforeach 
                <p>
                   <span style="font-size: 1rem; font-weight: 700">Biaya Jasa</span> <input type="number" class="form-control text-right" value="{{ $rekammedis->first()->dokter()->first()->biaya_jasa }}" name="harga" id="harga">
                </p>
                <hr>
                <p>Kasir : {{ Auth::user()->pegawai()->first()->nama }}</p>
                    <form action="{{route('kasir.pembayaranProses.bayar', $id)}}" method="POST">
                    @method ('patch')
                    @csrf
                    <div class="form-group mt-4">
                        <input hidden type="text" value="{{ Auth::user()->pegawai()->first()->id_pegawai }}" name="id_kasir">
                    </div>  
                    <div class="form-group mt-4">
                        <input hidden type="text" value="{{ Auth::user()->pegawai()->first()->id_pegawai }}" name="id_kasir" readonly>
                        <label for="" style="font-size: 1rem; font-weight: 700;">Total</label>
                        @if ($rekammedis->first()->total_pembayaran)
                          <input type="number" value="{{ $rekammedis->first()->total_pembayaran }}" class="form-control text-right" name="total_pembayaran" readonly> 
                        @else
                          <input type="number" id="total" class="form-control text-right" name="total_pembayaran" readonly> 
                        @endif
                    </div>
                    @if ($rekammedis->first()->ket_proses === 'proses_pembayaran')
                    <button type="submit" class="btn btn-icon btn-primary float-right">Terima Pembayaran <i class="far fa-edit"></i></button>
                    @else
                    @endif  
                </form>
              </div>
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