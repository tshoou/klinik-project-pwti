<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('beranda', 'PasienController@index')->name('beranda');
Route::get('home', 'HomeController@index')->name('home');
Route::get('dokter', 'PasienController@dokter')->name('webprofil.dokter');
Route::get('dokter/detail/{id_pegawai}', 'PasienController@detailDokter')->name('webprofil.detailDokter');
Route::get('dokter/search', 'PasienController@search')->name('searchdokter');
Route::get('fasilitas', 'PasienController@fasilitas')->name('webprofil.fasilitas');
Route::get('kontak', 'PasienController@kontak')->name('webprofil.kontak');
Route::post('kontak/kirim', 'PasienController@kirim')->name('webprofil.kontak.kirim');

Auth::routes();

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin/home', 'HomeController@adminHome')->name('admin.home');

    // Profil
    Route::get('admin/profil/{id_pegawai}', 'admin\ProfilController@index')->name('admin.profil');
    Route::get('admin/profil/{id_pegawai}/edit', 'admin\ProfilController@edit')->name('admin.profil.edit');
    Route::patch('admin/{id_pegawai}', 'admin\ProfilController@update')->name('admin.profil.update');
    Route::patch('admin/{id_pegawai}/editFOto', 'admin\ProfilController@updateFoto')->name('admin.profil.updateFoto');

    // Akun
    Route::get('admin/akun', 'admin\AkunController@index')->name('admin.akun');
    Route::get('admin/posts/search', 'admin\AkunController@search')->name('admin.akun.search');
    Route::post('admin/akun/simpan', 'admin\AkunController@simpan')->name('admin.akun.simpan');
    Route::get('admin/akun/{id_pegawai}/edit', 'admin\AkunController@edit')->name('admin.akun.edit');
    Route::patch('admin/akun/{id_pegawai}', 'admin\AkunController@update')->name('admin.akun.update');
    Route::delete('admin/akun/hapus/{id_pegawai}', 'admin\AkunController@delete')->name('admin.akun.hapus');

    // JABATAN
    Route::get('admin/jabatan', 'admin\JabatanController@index')->name('admin.jabatan');
    Route::get('admin/jabatan/search', 'admin\JabatanController@search')->name('admin.jabatan.search');
    Route::post('admin/jabatan/simpan', 'admin\JabatanController@simpan')->name('admin.jabatan.simpan');
    Route::get('admin/jabatan/{id_golongan}/edit', 'admin\JabatanController@edit')->name('admin.jabatan.edit');
    Route::patch('admin/jabatan/{id_golongan}', 'admin\JabatanController@update')->name('admin.jabatan.update');
    Route::DELETE('admin/jabatan/hapus/{id_golongan}', 'admin\JabatanController@delete')->name('admin.jabatan.hapus');

    // OBAT
    Route::get('admin/obat', 'admin\ObatController@index')->name('admin.obat');
    Route::get('admin/obat/search', 'admin\ObatController@search')->name('admin.obat.search');
    Route::post('admin/obat/simpan', 'admin\ObatController@simpan')->name('admin.obat.simpan');
    Route::get('admin/obat/{id_obat}/edit', 'admin\ObatController@edit')->name('admin.obat.edit');
    Route::patch('admin/obat/{id_obat}', 'admin\ObatController@update')->name('admin.obat.update');
    Route::DELETE('admin/obat/hapus/{id_obat}', 'admin\ObatController@delete')->name('admin.obat.hapus');

    // GEDUNG
    Route::get('admin/gedung', 'admin\GedungController@index')->name('admin.gedung');
    Route::get('admin/gedung/search', 'admin\GedungController@search')->name('admin.gedung.search');
    Route::post('admin/gedung/simpan', 'admin\GedungController@simpan')->name('admin.gedung.simpan');
    Route::get('admin/gedung/{id_gedung}/edit', 'admin\GedungController@edit')->name('admin.gedung.edit');
    Route::patch('admin/gedung/{id_gedung}', 'admin\GedungController@update')->name('admin.gedung.update');
    Route::DELETE('admin/gedung/hapus/{id_gedung}', 'admin\GedungController@delete')->name('admin.gedung.hapus');

    // RUANG
    Route::get('admin/ruang', 'admin\RuangController@index')->name('admin.ruang');
    Route::get('admin/ruang/search', 'admin\RuangController@search')->name('admin.ruang.search');
    Route::post('admin/ruang/simpan', 'admin\RuangController@simpan')->name('admin.ruang.simpan');
    Route::get('admin/ruang/{id_rw}/edit', 'admin\RuangController@edit')->name('admin.ruang.edit');
    Route::patch('admin/ruang/{id_rw}', 'admin\RuangController@update')->name('admin.ruang.update');
    Route::DELETE('admin/ruang/hapus/{id_rw}', 'admin\RuangController@delete')->name('admin.ruang.hapus');

    // DOKTER
    Route::get('admin/dokter', 'admin\DokterController@index')->name('admin.dokter');
    Route::get('admin/dokter/search', 'admin\DokterController@search')->name('admin.dokter.search');
    Route::post('admin/dokter/simpan', 'admin\DokterController@simpan')->name('admin.dokter.simpan');
    Route::DELETE('admin/dokter/hapus/{id_pegawai}', 'admin\DokterController@delete')->name('admin.dokter.hapus');
    Route::get('admin/dokter/export-excel',  'admin\DokterController@export')->name('admin.dokter.exportExcel');

    // PEGAWAI
    Route::get('admin/pegawai', 'admin\PegawaiController@index')->name('admin.pegawai');
    Route::get('admin/pegawai/tambah', 'admin\PegawaiController@tambah')->name('admin.pegawai.tambah');
    Route::post('admin/pegawai/simpan', 'admin\PegawaiController@simpan')->name('admin.pegawai.simpan');
    Route::get('admin/pegawai/{id_pegawai}/detail', 'admin\PegawaiController@detail')->name('admin.pegawai.detail');
    Route::get('admin/pegawai/search', 'admin\PegawaiController@search')->name('admin.pegawai.search');
    Route::get('admin/pegawai/{id_pegawai}/edit', 'admin\PegawaiController@edit')->name('admin.pegawai.edit');
    Route::patch('admin/pegawai/{id_pegawai}', 'admin\PegawaiController@update')->name('admin.pegawai.update');
    Route::patch('admin/{id_pegawai}/editFoto', 'admin\PegawaiController@updateFoto')->name('admin.pegawai.updateFoto');
    Route::DELETE('admin/pegawai/hapus/{id_pegawai}', 'admin\PegawaiController@delete')->name('admin.pegawai.hapus');
    Route::get('admin/pegawai/export-excel',  'admin\PegawaiController@export')->name('admin.pegawai.exportExcel');

    // Pasien
    Route::get('admin/pasien', 'admin\PasienController@index')->name('admin.pasien');
    Route::get('admin/pasien/search', 'admin\PasienController@search')->name('admin.pasien.search');
    Route::get('admin/pasien/{id_pasien}/detail', 'admin\PasienController@detail')->name('admin.pasien.detail');
    Route::DELETE('admin/pasien/hapus/{id_pasien}', 'admin\PasienController@delete')->name('admin.pasien.hapus');
    Route::get('admin/pasien/export-excel',  'admin\PasienController@export')->name('admin.pasien.exportExcel');

    // Rekam Medis
    Route::get('admin/rekammedis', 'admin\RekamMedisController@index')->name('admin.rekammedis');
    Route::get('admin/rekammedis/search', 'admin\RekamMedisController@search')->name('admin.rekammedis.search');
    Route::get('admin/rekammedis/{id_rekam_medis}/detail', 'admin\RekamMedisController@detail')->name('admin.rekammedis.detail');
    Route::DELETE('admin/rekammedis/hapus/{id_rekam_medis}', 'admin\RekamMedisController@delete')->name('admin.rekammedis.hapus');
    Route::get('admin/rekammedis/export-excel',  'admin\RekamMedisController@export')->name('admin.rekammedis.exportExcel');

    // PESAN
    Route::get('admin/pesan', 'admin\PesanController@index')->name('admin.pesan');
    Route::get('admin/pesan/search', 'admin\PesanController@search')->name('admin.pesan.search');
});
Route::group(['middleware' => 'is_resepsionis'], function () {
    Route::get('resepsionist/home', 'HomeController@resepsionistHome')->name('resepsionist.home');

    // Profil
    Route::get('resepsionist/profil/{id_pegawai}', 'resepsionis\ProfilController@index')->name('resepsionist.profil');
    Route::get('resepsionist/profil/{id_pegawai}/edit', 'resepsionis\ProfilController@edit')->name('resepsionist.profil.edit');
    Route::get('resepsionist/profil/{id_pegawai}/editFoto', 'resepsionis\ProfilController@editFoto')->name('resepsionist.profil.editFoto');
    Route::patch('resepsionist/{id_pegawai}', 'resepsionis\ProfilController@update')->name('resepsionist.profil.update');
    Route::patch('resepsionist/{id_pegawai}/editFOto', 'resepsionis\ProfilController@updateFoto')->name('resepsionist.profil.updateFoto');

    // Pasien
    Route::get('resepsionist/pasien', 'resepsionis\PasienController@index')->name('resepsionist.pasien');
    Route::get('resepsionist/pasien/search', 'resepsionis\PasienController@search')->name('resepsionist.pasien.search');
    Route::post('resepsionist/pasien/simpan', 'resepsionis\PasienController@simpan')->name('resepsionist.pasien.simpan');
    Route::get('resepsionist/pasien/{id_pasien}/edit', 'resepsionis\PasienController@edit')->name('resepsionist.pasien.edit');
    Route::patch('resepsionist/pasien/{id_pasien}', 'resepsionis\PasienController@update')->name('resepsionist.pasien.update');
    Route::get('resepsionist/pasien/{id_pasien}/detail', 'resepsionis\PasienController@detail')->name('resepsionist.pasien.detail');
    Route::DELETE('resepsionist/pasien/hapus/{id_pasien}', 'resepsionis\PasienController@delete')->name('resepsionist.pasien.hapus');

    // rekam medis
    Route::get('resepsionist/rekammedis', 'resepsionis\RekamMedisController@index')->name('resepsionist.rekammedis');
    Route::get('resepsionist/rekammedis/search', 'resepsionis\RekamMedisController@search')->name('resepsionist.rekammedis.search');
    Route::post('resepsionist/rekammedis/simpan', 'resepsionis\RekamMedisController@simpan')->name('resepsionist.rekammedis.simpan');
    Route::get('resepsionist/rekammedis/{id_rekam_medis}/detail', 'resepsionis\RekamMedisController@detail')->name('resepsionist.rekammedis.detail');
    Route::DELETE('resepsionist/rekammedis/hapus/{id_rekam_medis}', 'resepsionis\RekamMedisController@delete')->name('resepsionist.rekammedis.hapus');

    // OBAT
    Route::get('resepsionist/obat', 'resepsionis\ObatController@index')->name('resepsionist.obat');
    Route::get('resepsionist/obat/search', 'resepsionis\ObatController@search')->name('resepsionist.obat.search');
    Route::post('resepsionist/obat/simpan', 'resepsionis\ObatController@simpan')->name('resepsionist.obat.simpan');
    Route::get('resepsionist/obat/{id_obat}/edit', 'resepsionis\ObatController@edit')->name('resepsionist.obat.edit');
    Route::patch('resepsionist/obat/{id_obat}', 'resepsionis\ObatController@update')->name('resepsionist.obat.update');
    Route::DELETE('resepsionist/obat/hapus/{id_obat}', 'resepsionis\ObatController@delete')->name('resepsionist.obat.hapus');

    // Dokter
    Route::get('resepsionist/dokter', 'resepsionis\DokterController@index')->name('resepsionist.dokter');

    // Pegawai
    Route::get('resepsionist/pegawai', 'resepsionis\PegawaiController@index')->name('resepsionist.pegawai');
    Route::get('resepsionist/pegawai/search', 'resepsionis\PegawaiController@search')->name('resepsionist.pegawai.search');
    Route::get('resepsionist/pegawai/{id_pegawai}/detail', 'resepsionis\PegawaiController@detail')->name('resepsionist.pegawai.detail');

    // Gedung
    Route::get('resepsionist/gedung', 'resepsionis\GedungController@index')->name('resepsionist.gedung');
    Route::get('resepsionist/gedung/search', 'resepsionis\GedungController@search')->name('resepsionist.gedung.search');

    // Ruang
    Route::get('resepsionist/ruang', 'resepsionis\RuangController@index')->name('resepsionist.ruang');
    Route::get('resepsionist/ruang/search', 'resepsionis\RuangController@search')->name('resepsionist.ruang.search');
});
Route::group(['middleware' => 'is_dokter'], function () {
    Route::get('dokter/home', 'HomeController@dokterhome')->name('dokter.home');

    // Profil
    Route::get('dokter/profil/{id_pegawai}', 'dokter\ProfilController@index')->name('dokter.profil');
    Route::get('dokter/profil/{id_pegawai}/edit', 'dokter\ProfilController@edit')->name('dokter.profil.edit');
    Route::get('dokter/profil/{id_pegawai}/editFoto', 'dokter\ProfilController@editFoto')->name('dokter.profil.editFoto');
    Route::patch('dokter/{id_pegawai}', 'dokter\ProfilController@update')->name('dokter.profil.update');
    Route::patch('dokter/{id_pegawai}/editFOto', 'dokter\ProfilController@updateFoto')->name('dokter.profil.updateFoto');

    // Rekammedis
    Route::get('dokter/{id_pegawai}/rekamMedis', 'dokter\RekamMedisController@index')->name('dokter.rekammedis');
    Route::get('dokter/rekamMedis/{id_rekam_medis}/periksa', 'dokter\RekamMedisController@periksa')->name('dokter.rekammedis.periksa');
    Route::patch('dokter/{id_rekam_medis}/update', 'dokter\RekamMedisController@update')->name('dokter.updaterk');
    Route::get('dokter/rekammedis/search/{id_pegawai}', 'dokter\RekamMedisController@search')->name('dokter.rekammedis.search');
    Route::get('dokter/rekammedis/{id_rekam_medis}/detail', 'dokter\RekamMedisController@detail')->name('dokter.rekammedis.detail');

    // OBAT
    Route::get('dokter/obat', 'dokter\ObatController@index')->name('dokter.obat');
    Route::get('dokter/obat/search', 'dokter\ObatController@search')->name('dokter.obat.search');
});
Route::group(['middleware' => 'is_kasir'], function () {
    Route::get('kasir/home', 'HomeController@kasirhome')->name('kasir.home');

    // Profil
    Route::get('kasir/profil/{id_pegawai}', 'kasir\ProfilController@index')->name('kasir.profil');
    Route::get('kasir/profil/{id_pegawai}/edit', 'kasir\ProfilController@edit')->name('kasir.profil.edit');
    Route::get('kasir/profil/{id_pegawai}/editFoto', 'kasir\ProfilController@editFoto')->name('kasir.profil.editFoto');
    Route::patch('kasir/{id_pegawai}', 'kasir\ProfilController@update')->name('kasir.profil.update');
    Route::patch('kasir/{id_pegawai}/editFOto', 'kasir\ProfilController@updateFoto')->name('kasir.profil.updateFoto');

    Route::get('kasir/pembayaran-proses', 'kasir\PembayaranController@index')->name('kasir.pembayaranProses');
    Route::get('kasir/pembayaran-proses/{id_rekam_medis}/detail', 'kasir\PembayaranController@detail')->name('kasir.pembayaranProses.detail');
    Route::patch('kasir/pembayaran-proses/{id}/bayar', 'kasir\PembayaranController@bayar')->name('kasir.pembayaranProses.bayar');
    Route::get('kasir/pembayaran-proses/filter', 'kasir\PembayaranController@filter')->name('kasir.pembayaranProses.filter');
    Route::get('kasir/pembayaran-proses/search', 'kasir\PembayaranController@search')->name('kasir.pembayaranProses.search');
    Route::get('kasir/pembayaran/{id}/laporan-pdf', 'kasir\PembayaranController@generatePDF')->name('kasir.pembayaranProses.generatepdf');
    Route::get('kasir/pembayaran/search', 'kasir\PembayaranController@search')->name('kasir.pembayaran.search');
});

Route::fallback(function () {
    return view('welcome');
});
