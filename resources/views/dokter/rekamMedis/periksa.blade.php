@extends('dokter.layouts.master')
@section('title', 'Klinik Reovelnt')
@section('section-header')
    <h1>Rekam Medis</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dokter.home') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('dokter.rekammedis',  Auth::user()->pegawai()->first()->id_pegawai) }}">Pasien</a></div>
      <div class="breadcrumb-item"><a href="#">Rekam Medis</a></div>
    </div>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data pasien</h5>
                    <p class="card-text">
                        <ul>
                            <li>Nama Pasien : {{$rekama->pasien()->first()->nama_pasien}}</li>
                            <li>Jenis Kelamin : {{$rekama->pasien()->first()->jenis_kelamin}}</li>
                            <li>Golongan Darah : {{$rekama->pasien()->first()->gol_darah}}</li>
                            <li>Status Nikah : {{$rekama->pasien()->first()->status_nikah}}</li>
                            <li>No Telfon : {{$rekama->pasien()->first()->no_telfon}}</li>
                            <li>Alamat : {{$rekama->pasien()->first()->alamat}}</li>
                        </ul>
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                <form action="{{ route('dokter.updaterk', $rekama->id_rekam_medis) }}" method="POST">
                    @method ('patch')
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                    {{-- <input type="text" value="{{$rekama->id_rekam_medis}}"> --}}
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
                      <input type="text" class="form-control" @if (old('keluhan')) 
                      value="{{old('keluhan')}}" @else value="{{$rekama->keluhan}}"
                      @endif name="keluhan" readonly>
                      </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('diagnosa')
                            class="text-danger"
                        @enderror>Diagnosa @error('diagnosa')
                            | {{$message}}
                        @enderror</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-signature"></i>
                            </div>
                          </div>
                      <input type="text" class="form-control" @if (old('diagnosa')) 
                      value="{{old('diagnosa')}}" @else value="{{$rekama->diagnosa}}"
                      @endif name="diagnosa">
                      </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group obat">
                        <label>Obat</label>
                        <div class="input-group mb-3 append-data-obat">
                            <select name="obat[]" id="selectObat" class="form-control select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true" multiple>
                                @foreach ($obat as $item)
                                <option value="{{$item->id_obat}}">{{$item->nama_obat}} - {{$item->kegunaan}} - {{$item->jenis_obat}}</option>
                                @endforeach
                            </select>
                            {{-- <button class="btn btn-primary " id="add-obat" type="button"><i class="fa fa-plus"></i></button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  <a href="{{ route('dokter.rekammedis',  Auth::user()->pegawai()->first()->id_pegawai) }}" class="btn btn-warning">Kembali</a>
                </div>
              </form>
              </div>
        </div>  
    </div>
</div>
@endsection
@push('page-script')
{{-- <script>
        var addObat = $('#add-obat'); 
        var wrapperObat = $('.obat'); 
        var fieldHTMLObat = '<div class="d-flex my-3"><select name="obat[]" id="selectObat" class="form-control">@foreach ($obat as $item)<option value="{{$item->id_obat}}">{{$item->nama_obat}} - {{$item->kegunaan}} - {{$item->jenis_obat}}</option>@endforeach</select><button class="btn btn-danger" id="delete-obat" type="button"><i class="fa fa-trash"></i></button></div>'; //New input field html 
        $(addObat).click(function(e){
          e.preventDefault();
            $(wrapperObat).append(fieldHTMLObat); 
      });
      $(wrapperObat).on('click', '#delete-obat', function(e){
          e.preventDefault();
          $(this).parent('div').remove();
      });
</script> --}}
<script>
    $(document).ready(function(){
      // let select = document.querySelectorAll('#selectObat');
        $("#selectObat").select2({
            placeholder:"Pilih obat",
            multiple: true,
            allowClear:true,
        });
    });
</script>
@endpush