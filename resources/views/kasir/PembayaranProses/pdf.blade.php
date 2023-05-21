<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .wrapper{
            width: 100%;
        }
        .title{
            font-weight: 700;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="wrapper container">
        <div class="row">
            <div class="col-md-6">
                <p class="title">Data Pasien</p>
                <hr>
                <p>Nama : {{$data->pasien()->first()->nama_pasien}}</p>
                <p>Jenis Kelamin : {{$data->pasien()->first()->jenis_kelamin}}</p>
                <p>Diagnosa : {{$data->diagnosa}}</p>
                <hr>
                <p>Keterangan Proses : Selesai</p>
            </div>
            <div class="col-md-6">
                <p class="title">Data Pembayaran</p>
                <hr>
                <p>Obat</p>
                <p>
                   @foreach($data as $r)
                   <span style="font-size: 1rem; font-weight: 700">{{ $r->rekamobat()->nama_obat }}</span> <span class="float-right">{{ $r->harga }}</span>
                   @endforeach 
                </p>
                <p>Diagnosa : Asma</p>
                <hr>
                <p>Keterangan Proses : Selesai</p>
            </div>
        </div>
    </div>
</body>
</html>