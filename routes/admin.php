<?php

//use App\Http\Controllers\admin\BidangPendidikanController;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DokumenKelengkapanController;
use App\Http\Controllers\admin\JabatanBidangController;
use App\Http\Controllers\admin\JangkaWaktuSewaController;
use App\Http\Controllers\admin\JenisDokumenController;
use App\Http\Controllers\admin\JenisJangkaWaktuController;
use App\Http\Controllers\admin\BidangController;
use App\Http\Controllers\admin\DepartemenController;
use App\Http\Controllers\admin\JenisKegiatanController;
use App\Http\Controllers\admin\JenisObjekRetribusiController;
use App\Http\Controllers\admin\JenisPermohonanController;
use App\Http\Controllers\admin\JenisRetribusiController;
use App\Http\Controllers\admin\JenisStatusController;
use App\Http\Controllers\admin\LokasiObjekRetribusiController;
use App\Http\Controllers\admin\PekerjaanController;
use App\Http\Controllers\admin\StatusController;
use App\Http\Controllers\admin\ObjekRetribusiController;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\PeruntukanSewaController;
use App\Http\Controllers\admin\WajibRetribusiController;
use App\Http\Controllers\admin\JabatanController;
use App\Http\Controllers\admin\PermohonanSewaController;
use App\Http\Controllers\admin\PerjanjianController;
use App\Http\Controllers\admin\DropdownLokasiContoller;
use App\Http\Controllers\admin\GolonganPangkatController;
//use Illuminate\Routing\Route;
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



Route::group(['middleware' => ['auth']], function () {
    Route::get("/", [DashboardController::class, 'index'])->name('Dashboard.index');

    // Route untuk Lokasi Objek Retribusi
    Route::get("/lokasi-objek-retribusi", [LokasiObjekRetribusiController::class, 'index'])->name('LokasiObjekRetribusi.index');
    Route::get("/lokasi-objek-retribusi/tambah", [LokasiObjekRetribusiController::class, 'create'])->name('LokasiObjekRetribusi.create');
    Route::post("/lokasi-objek-retribusi/simpan", [LokasiObjekRetribusiController::class, 'store'])->name('LokasiObjekRetribusi.store');
    Route::get("/lokasi-objek-retribusi/ubah/{id}", [LokasiObjekRetribusiController::class, 'edit'])->name('LokasiObjekRetribusi.edit');
    Route::post("/lokasi-objek-retribusi/update/{id}", [LokasiObjekRetribusiController::class, 'update'])->name('LokasiObjekRetribusi.update');
    Route::delete("/lokasi-objek-retribusi/hapus", [LokasiObjekRetribusiController::class, 'delete'])->name('LokasiObjekRetribusi.delete');
    Route::get("/lokasi-objek-retribusi/detail", [LokasiObjekRetribusiController::class, 'detail'])->name('LokasiObjekRetribusi.detail');

    // Route untuk Jenis objek Retribusi
    Route::get("/jenis-objek-retribusi", [JenisObjekRetribusiController::class, 'index'])->name('JenisObjekRetribusi.index');
    Route::get("/jenis-objek-retribusi/tambah", [JenisObjekRetribusiController::class, 'create'])->name('JenisObjekRetribusi.create');
    Route::post("/jenis-objek-retribusi/simpan", [JenisObjekRetribusiController::class, 'store'])->name('JenisObjekRetribusi.store');
    Route::get("/jenis-objek-retribusi/ubah/{id}", [JenisObjekRetribusiController::class, 'edit'])->name('JenisObjekRetribusi.edit');
    Route::post("/jenis-objek-retribusi/update/{id}", [JenisObjekRetribusiController::class, 'update'])->name('JenisObjekRetribusi.update');
    Route::delete("/jenis-objek-retribusi/hapus", [JenisObjekRetribusiController::class, 'delete'])->name('JenisObjekRetribusi.delete');
    Route::get("/jenis-objek-retribusi/detail", [JenisObjekRetribusiController::class, 'detail'])->name('JenisObjekRetribusi.detail');

    // Route untuk Jenis Jangka Waktu
    Route::get("/jenis-jangka-waktu", [JenisJangkaWaktuController::class, 'index'])->name('jenisJangkaWaktu.index');
    Route::get("/jenis-jangka-waktu/tambah", [JenisJangkaWaktuController::class, 'create'])->name('JenisJangkaWaktu.create');
    Route::post("/jenis-jangka-waktu/simpan", [JenisJangkaWaktuController::class, 'store'])->name('JenisJangkaWaktu.store');
    Route::get("/jenis-jangka-waktu/ubah/{id}", [JenisJangkaWaktuController::class, 'edit'])->name('JenisJangkaWaktu.edit');
    Route::post("/jenis-jangka-waktu/update/{id}", [JenisJangkaWaktuController::class, 'update'])->name('JenisJangkaWaktu.update');
    Route::delete("/jenis-jangka-waktu/hapus", [JenisJangkaWaktuController::class, 'delete'])->name('JenisJangkaWaktu.delete');
    Route::get("/jenis-jangka-waktu/detail", [JenisJangkaWaktuController::class, 'detail'])->name('JenisJangkaWaktu.detail');

    // Route untuk Jangka Waktu Sewa
    Route::get("/jangka-waktu-sewa", [JangkaWaktuSewaController::class, 'index'])->name('JangkaWaktuSewa.index');
    Route::get("/jangka-waktu-sewa/tambah", [JangkaWaktuSewaController::class, 'create'])->name('JangkaWaktuSewa.create');
    Route::post("/jangka-waktu-sewa/simpan", [JangkaWaktuSewaController::class, 'store'])->name('JangkaWaktuSewa.store');
    Route::get("/jangka-waktu-sewa/ubah/{id}", [JangkaWaktuSewaController::class, 'edit'])->name('JangkaWaktuSewa.edit');
    Route::post("/jangka-waktu-sewa/update/{id}", [JangkaWaktuSewaController::class, 'update'])->name('JangkaWaktuSewa.update');
    Route::delete("/jangka-waktu-sewa/hapus", [JangkaWaktuSewaController::class, 'delete'])->name('JangkaWaktuSewa.delete');
    Route::get("/jangka-waktu-sewa/detail", [JangkaWaktuSewaController::class, 'detail'])->name('JangkaWaktuSewa.detail');

    // Route untuk Peruntukan Sewa
    Route::get("/peruntukan-sewa", [PeruntukanSewaController::class, 'index'])->name('PeruntukanSewa.index');
    Route::get("/peruntukan-sewa/tambah", [PeruntukanSewaController::class, 'create'])->name('PeruntukanSewa.create');
    Route::post("/peruntukan-sewa/simpan", [PeruntukanSewaController::class, 'store'])->name('PeruntukanSewa.store');
    Route::get("/peruntukan-sewa/ubah/{id}", [PeruntukanSewaController::class, 'edit'])->name('PeruntukanSewa.edit');
    Route::post("/peruntukan-sewa/update/{id}", [PeruntukanSewaController::class, 'update'])->name('PeruntukanSewa.update');
    Route::delete("/peruntukan-sewa/hapus", [PeruntukanSewaController::class, 'delete'])->name('PeruntukanSewa.delete');
    Route::get("/peruntukan-sewa/detail", [PeruntukanSewaController::class, 'detail'])->name('PeruntukanSewa.detail');

    // Route untuk Jenis Dokumen
    Route::get("/jenis-dokumen", [JenisDokumenController::class, 'index'])->name('JenisDokumen.index');
    Route::get("/jenis-dokumen/tambah", [JenisDokumenController::class, 'create'])->name('JenisDokumen.create');
    Route::post("/jenis-dokumen/simpan", [JenisDokumenController::class, 'store'])->name('JenisDokumen.store');
    Route::get("/jenis-dokumen/ubah/{id}", [JenisDokumenController::class, 'edit'])->name('JenisDokumen.edit');
    Route::post("/jenis-dokumen/update/{id}", [JenisDokumenController::class, 'update'])->name('JenisDokumen.update');
    Route::delete("/jenis-dokumen/hapus", [JenisDokumenController::class, 'delete'])->name('JenisDokumen.delete');
    Route::get("/jenis-dokumen/detail", [JenisDokumenController::class, 'detail'])->name('JenisDokumen.detail');

    // Route untuk Dokumen Kelengkapan
    Route::get("/dokumen-kelengkapan", [DokumenKelengkapanController::class, 'index'])->name('DokumenKelengkapan.index');
    Route::get("/dokumen-kelengkapan/tambah", [DokumenKelengkapanController::class, 'create'])->name('DokumenKelengkapan.create');
    Route::post("/dokumen-kelengkapan/simpan", [DokumenKelengkapanController::class, 'store'])->name('DokumenKelengkapan.store');
    Route::get("/dokumen-kelengkapan/ubah/{id}", [DokumenKelengkapanController::class, 'edit'])->name('DokumenKelengkapan.edit');
    Route::post("/dokumen-kelengkapan/update/{id}", [DokumenKelengkapanController::class, 'update'])->name('DokumenKelengkapan.update');
    Route::delete("/dokumen-kelengkapan/hapus", [DokumenKelengkapanController::class, 'delete'])->name('DokumenKelengkapan.delete');
    Route::get("/dokumen-kelengkapan/detail", [DokumenKelengkapanController::class, 'detail'])->name('DokumenKelengkapan.detail');

    // Route untuk Objek Retribusi
    Route::get("/objek-retribusi", [ObjekRetribusiController::class, 'index'])->name('ObjekRetribusi.index');
    Route::get("/objek-retribusi/tambah", [ObjekRetribusiController::class, 'create'])->name('ObjekRetribusi.create');
    Route::post("/objek-retribusi/simpan", [ObjekRetribusiController::class, 'store'])->name('ObjekRetribusi.store');
    Route::get("/objek-retribusi/ubah/{id}", [ObjekRetribusiController::class, 'edit'])->name('ObjekRetribusi.edit');
    Route::post("/objek-retribusi/update", [ObjekRetribusiController::class, 'update'])->name('ObjekRetribusi.update');
    Route::get("/objek-retribusi/detail/{id}", [ObjekRetribusiController::class, 'detail'])->name('ObjekRetribusi.detail');
    Route::delete("/objek-retribusi/hapus", [ObjekRetribusiController::class, 'delete'])->name('ObjekRetribusi.delete');
    Route::post("/objek-retribusi/update-denah-tanah", [ObjekRetribusiController::class, 'updateDenahTanah'])->name('ObjekRetribusi.updateDenahTanah');
    Route::get("/objek-retribusi/ubah-foto-objek", [ObjekRetribusiController::class, 'editFotoObjek'])->name('ObjekRetribusi.editFotoObjek');
    Route::post("/objek-retribusi/update-foto-objek", [ObjekRetribusiController::class, 'updateFotoObjek'])->name('ObjekRetribusi.updateFotoObjek');
    Route::get("/objek-retribusi/hapus-foto-objek/{id}", [ObjekRetribusiController::class, 'deleteFotoObjek'])->name('ObjekRetribusi.deleteFotoObjek');
    Route::post("/objek-retribusi/simpan-foto-objek", [ObjekRetribusiController::class, 'storeFotoObjek'])->name('ObjekRetribusi.storeFotoObjek');

    // Route untuk Tarif Objek Retribusi
    Route::get("/objek-retribusi/tarif", [ObjekRetribusiController::class, 'tarif'])->name('ObjekRetribusi.tarif');
    Route::get("/objek-retribusi/tambah-tarif", [ObjekRetribusiController::class, 'createTarif'])->name('ObjekRetribusi.createTarif');
    Route::get("/objek-retribusi/detail-objek/", [ObjekRetribusiController::class, 'detailObjekToTarif'])->name('ObjekRetribusi.detailObjekToTarif');
    Route::post("/objek-retribusi/simpan-tarif", [ObjekRetribusiController::class, 'storeTarif'])->name('ObjekRetribusi.storeTarif');
    Route::get("/objek-retribusi/detail-tarif", [ObjekRetribusiController::class, 'detailTarif'])->name('ObjekRetribusi.detailTarif');
    Route::get("/objek-retribusi/ubah-tarif/{id}", [ObjekRetribusiController::class, 'editTarif'])->name('ObjekRetribusi.editTarif');
    Route::post("/objek-retribusi/update-tarif", [ObjekRetribusiController::class, 'updateTarif'])->name('ObjekRetribusi.updateTarif');
    Route::delete("/objek-retribusi/hapus-tarif", [ObjekRetribusiController::class, 'deleteTarif'])->name('ObjekRetribusi.deleteTarif');
    Route::post("/objek-retribusi/update-hasil-penilaian", [ObjekRetribusiController::class, 'updateHasilPenilaian'])->name('ObjekRetribusi.updateHasilPenilaian');

    // Route untuk Wajib Retribusi
    Route::get("/wajib-retribusi", [WajibRetribusiController::class, 'index'])->name('WajibRetribusi.index');
    Route::get("/wajib-retribusi/tambah", [WajibRetribusiController::class, 'create'])->name('WajibRetribusi.create');
    Route::post("/wajib-retribusi/simpan", [WajibRetribusiController::class, 'store'])->name('WajibRetribusi.store');
    Route::get("/wajib-retribusi/ubah/{id}", [WajibRetribusiController::class, 'edit'])->name('WajibRetribusi.edit');
    Route::post("/wajib-retribusi/update", [WajibRetribusiController::class, 'update'])->name('WajibRetribusi.update');
    Route::get("/wajib-retribusi/detail", [WajibRetribusiController::class, 'detail'])->name('WajibRetribusi.detail');
    Route::delete("/wajib-retribusi/hapus", [WajibRetribusiController::class, 'delete'])->name('WajibRetribusi.delete');

    // Route untuk Departemen
    Route::get("/departemen", [DepartemenController::class, 'index'])->name('Departemen.index');
    Route::get("/departemen/tambah", [DepartemenController::class, 'create'])->name('Departemen.create');
    Route::post("/departemen/simpan", [DepartemenController::class, 'store'])->name('Departemen.store');
    Route::get("/departemen/ubah/{id}", [DepartemenController::class, 'edit'])->name('Departemen.edit');
    Route::post("/departemen/update/{id}", [DepartemenController::class, 'update'])->name('Departemen.update');
    Route::get("/departemen/detail", [DepartemenController::class, 'detail'])->name('Departemen.detail');
    Route::delete("/departemen/hapus", [DepartemenController::class, 'delete'])->name('Departemen.delete');

    // Route untuk Jabatan
    Route::get("/jabatan", [JabatanController::class, 'index'])->name('Jabatan.index');
    Route::get("/jabatan/tambah", [JabatanController::class, 'create'])->name('Jabatan.create');
    Route::post("/jabatan/simpan", [JabatanController::class, 'store'])->name('Jabatan.store');
    Route::get("/jabatan/ubah/{id}", [JabatanController::class, 'edit'])->name('Jabatan.edit');
    Route::post("/jabatan/update/{id}", [JabatanController::class, 'update'])->name('Jabatan.update');
    Route::delete("/jabatan/hapus", [JabatanController::class, 'delete'])->name('Jabatan.delete');
    Route::get("/jabatan/detail", [JabatanController::class, 'detail'])->name('Jabatan.detail');

    // Route untuk Jabatan Bidang
    Route::get("/jabatan-bidang", [JabatanBidangController::class, 'index'])->name('JabatanBidang.index');
    Route::get("/jabatan-bidang/tambah", [JabatanBidangController::class, 'create'])->name('JabatanBidang.create');
    Route::post("/jabatan-bidang/simpan", [JabatanBidangController::class, 'store'])->name('JabatanBidang.store');
    Route::get("/jabatan-bidang/ubah/{id}", [JabatanBidangController::class, 'edit'])->name('JabatanBidang.edit');
    Route::post("/jabatan-bidang/update/{id}", [JabatanBidangController::class, 'update'])->name('JabatanBidang.update');
    Route::delete("/jabatan-bidang/hapus", [JabatanBidangController::class, 'delete'])->name('JabatanBidang.delete');
    Route::get("/jabatan-bidang/detail", [JabatanBidangController::class, 'detail'])->name('JabatanBidang.detail');

    //Route untuk Bidang
    Route::get("/bidang", [BidangController::class, 'index'])->name('Bidang.index');
    Route::get("/bidang/tambah", [BidangController::class, 'create'])->name('Bidang.create');
    Route::post("/bidang/simpan", [BidangController::class, 'store'])->name('Bidang.store');
    Route::get("/bidang/ubah/{id}", [BidangController::class, 'edit'])->name('Bidang.edit');
    Route::post("/bidang/update/{id}", [BidangController::class, 'update'])->name('Bidang.update');
    Route::get("/bidang/detail", [BidangController::class, 'detail'])->name('Bidang.detail');
    Route::delete("/bidang/hapus", [BidangController::class, 'delete'])->name('Bidang.delete');
    Route::post("/bidang/simpan-departmen", [BidangController::class, 'storeDepartmen'])->name('Bidang.storeDepartmen');

    // Route untuk Jenis objek Retribusi
    Route::get("/golongan-pangkat", [GolonganPangkatController::class, 'index'])->name('GolonganPangkat.index');
    Route::get("/golongan-pangkat/tambah", [GolonganPangkatController::class, 'create'])->name('GolonganPangkat.create');
    Route::post("/golongan-pangkat/simpan", [GolonganPangkatController::class, 'store'])->name('GolonganPangkat.store');
    Route::get("/golongan-pangkat/ubah/{id}", [GolonganPangkatController::class, 'edit'])->name('GolonganPangkat.edit');
    Route::post("/golongan-pangkat/update/{id}", [GolonganPangkatController::class, 'update'])->name('GolonganPangkat.update');
    Route::delete("/golongan-pangkat/hapus", [GolonganPangkatController::class, 'delete'])->name('GolonganPangkat.delete');
    Route::get("/golongan-pangkat/detail", [GolonganPangkatController::class, 'detail'])->name('GolonganPangkat.detail');

    // Route untuk Pegawai
    Route::get("/pegawai", [PegawaiController::class, 'index'])->name('Pegawai.index');
    Route::get("/pegawai/tambah", [PegawaiController::class, 'create'])->name('Pegawai.create');
    Route::post("/pegawai/simpan", [PegawaiController::class, 'store'])->name('Pegawai.store');
    Route::get("/pegawai/ubah/{id}", [PegawaiController::class, 'edit'])->name('Pegawai.edit');
    Route::post("/pegawai/update/{id}", [PegawaiController::class, 'update'])->name('Pegawai.update');
    Route::delete("/pegawai/hapus", [PegawaiController::class, 'delete'])->name('Pegawai.delete');
    Route::get("/pegawai/detail", [PegawaiController::class, 'detail'])->name('Pegawai.detail');

    // Route untuk Permohonan Sewa
    Route::get("/permohonan-sewa", [PermohonanSewaController::class, 'index'])->name('PermohonanSewa.index');
    Route::get("/permohonan-sewa/tambah", [PermohonanSewaController::class, 'create'])->name('PermohonanSewa.create');
    Route::post("/permohonan-sewa/simpan", [PermohonanSewaController::class, 'store'])->name('PermohonanSewa.store');
    Route::get("/permohonan-sewa/ubah/{id}", [PermohonanSewaController::class, 'edit'])->name('PermohonanSewa.edit');
    Route::post("/permohonan-sewa/update/{id}", [PermohonanSewaController::class, 'update'])->name('PermohonanSewa.update');
    Route::delete("/permohonan-sewa/hapus", [PermohonanSewaController::class, 'delete'])->name('PermohonanSewa.delete');
    Route::get("/permohonan-sewa/detail/{id}", [PermohonanSewaController::class, 'detail'])->name('PermohonanSewa.detail');
    Route::get("/permohonan-sewa/persetujuan-permohonan/", [PermohonanSewaController::class, 'approvePermohonanList'])->name('PermohonanSewa.approvePermohonanList');
    Route::get("/permohonan-sewa/setujui-permohonan/{id}", [PermohonanSewaController::class, 'approvePermohonanDetail'])->name('PermohonanSewa.approvePermohonanDetail');
    Route::post("/permohonan-sewa/simpan-setujui-permohonan", [PermohonanSewaController::class, 'storeApprovePermohonan'])->name('PermohonanSewa.storeApprovePermohonan');

    // Route untuk Perjanjian Sewa
    Route::get("/perjanjian-sewa", [PerjanjianController::class, 'index'])->name('Perjanjian.index');
    Route::get("/perjanjian-sewa/tambah", [PerjanjianController::class, 'create'])->name('Perjanjian.create');
    Route::post("/perjanjian-sewa/simpan", [PerjanjianController::class, 'store'])->name('Perjanjian.store');
    Route::get("/perjanjian-sewa/ubah/{id}", [PerjanjianController::class, 'edit'])->name('Perjanjian.edit');
    Route::post("/perjanjian-sewa/update/{id}", [PerjanjianController::class, 'update'])->name('Perjanjian.update');
    Route::delete("/perjanjian-sewa/hapus", [PerjanjianController::class, 'delete'])->name('Perjanjian.delete');
    Route::get("/perjanjian-sewa/detail", [PerjanjianController::class, 'detail'])->name('Perjanjian.detail');
    Route::get("/perjanjian-sewa/detail-permohonan/", [PerjanjianController::class, 'detailPermohonanToPerjanjian'])->name('Perjanjian.detailPermohonanToPerjanjian');

    Route::group(['middleware' => ['cek_login:Super Admin']], function () {
        // Route untuk Jenis Permohonan
        Route::get("/jenis-permohonan", [JenisPermohonanController::class, 'index'])->name('JenisPermohonan.index');
        Route::get("/jenis-permohonan/tambah", [JenisPermohonanController::class, 'create'])->name('JenisPermohonan.create');
        Route::post("/jenis-permohonan/simpan", [JenisPermohonanController::class, 'store'])->name('JenisPermohonan.store');
        Route::get("/jenis-permohonan/ubah/{id}", [JenisPermohonanController::class, 'edit'])->name('JenisPermohonan.edit');
        Route::post("/jenis-permohonan/update/{id}", [JenisPermohonanController::class, 'update'])->name('JenisPermohonan.update');
        Route::delete("/jenis-permohonan/hapus", [JenisPermohonanController::class, 'delete'])->name('JenisPermohonan.delete');
        Route::get("/jenis-permohonan/detail", [JenisPermohonanController::class, 'detail'])->name('JenisPermohonan.detail');


        // Route untuk Pekerjaan
        Route::get("/pekerjaan", [PekerjaanController::class, 'index'])->name('Pekerjaan.index');
        Route::get("/pekerjaan/tambah", [PekerjaanController::class, 'create'])->name('Pekerjaan.create');
        Route::post("/pekerjaan/simpan", [PekerjaanController::class, 'store'])->name('Pekerjaan.store');
        Route::get("/pekerjaan/ubah/{id}", [PekerjaanController::class, 'edit'])->name('Pekerjaan.edit');
        Route::post("/pekerjaan/update/{id}", [PekerjaanController::class, 'update'])->name('Pekerjaan.update');
        Route::get("/pekerjaan/detail", [PekerjaanController::class, 'detail'])->name('Pekerjaan.detail');
        Route::delete("/pekerjaan/hapus", [PekerjaanController::class, 'delete'])->name('Pekerjaan.delete');

        // Route untuk Jenis Kegiatan
        Route::get("/jenis-kegiatan", [JenisKegiatanController::class, 'index'])->name('JenisKegiatan.index');
        Route::get("/jenis-kegiatan/tambah", [JenisKegiatanController::class, 'create'])->name('JenisKegiatan.create');
        Route::post("/jenis-kegiatan/simpan", [JenisKegiatanController::class, 'store'])->name('JenisKegiatan.store');
        Route::get("/jenis-kegiatan/ubah/{id}", [JenisKegiatanController::class, 'edit'])->name('JenisKegiatan.edit');
        Route::post("/jenis-kegiatan/update/{id}", [JenisKegiatanController::class, 'update'])->name('JenisKegiatan.update');
        Route::get("/jenis-kegiatan/detail", [JenisKegiatanController::class, 'detail'])->name('JenisKegiatan.detail');
        Route::delete("/jenis-kegiatan/hapus", [JenisKegiatanController::class, 'delete'])->name('JenisKegiatan.delete');

        // Route untuk Jenis Status
        Route::get("/jenis-status", [JenisStatusController::class, 'index'])->name('JenisStatus.index');
        Route::get("/jenis-status/tambah", [JenisStatusController::class, 'create'])->name('JenisStatus.create');
        Route::post("/jenis-status/simpan", [JenisStatusController::class, 'store'])->name('JenisStatus.store');
        Route::get("/jenis-status/ubah/{id}", [JenisStatusController::class, 'edit'])->name('JenisStatus.edit');
        Route::post("/jenis-status/update/{id}", [JenisStatusController::class, 'update'])->name('JenisStatus.update');
        Route::get("/jenis-status/detail", [JenisStatusController::class, 'detail'])->name('JenisStatus.detail');
        Route::delete("/jenis-status/hapus", [JenisStatusController::class, 'delete'])->name('JenisStatus.delete');

        // Route untuk Jenis Retribusi
        Route::get("/jenis-retribusi", [JenisRetribusiController::class, 'index'])->name('JenisRetribusi.index');
        Route::get("/jenis-retribusi/tambah", [JenisRetribusiController::class, 'create'])->name('JenisRetribusi.create');
        Route::post("/jenis-retribusi/simpan", [JenisRetribusiController::class, 'store'])->name('JenisRetribusi.store');
        Route::get("/jenis-retribusi/ubah/{id}", [JenisRetribusiController::class, 'edit'])->name('JenisRetribusi.edit');
        Route::post("/jenis-retribusi/update/{id}", [JenisRetribusiController::class, 'update'])->name('JenisRetribusi.update');
        Route::delete("/jenis-retribusi/hapus", [JenisRetribusiController::class, 'delete'])->name('JenisRetribusi.delete');
        Route::get("/jenis-retribusi/detail", [JenisRetribusiController::class, 'detail'])->name('JenisRetribusi.detail');

        //Route untuk Status
        Route::get("/status", [StatusController::class, 'index'])->name('Status.index');
        Route::get("/status/tambah", [StatusController::class, 'create'])->name('Status.create');
        Route::post("/status/simpan", [StatusController::class, 'store'])->name('Status.store');
        Route::get("/status/ubah/{id}", [StatusController::class, 'edit'])->name('Status.edit');
        Route::post("/status/update/{id}", [StatusController::class, 'update'])->name('Status.update');
        Route::get("/status/detail", [StatusController::class, 'detail'])->name('Status.detail');
        Route::delete("/status/hapus", [StatusController::class, 'delete'])->name('Status.delete');
        Route::post("/status/simpan-jenis-status", [StatusController::class, 'storeStatusType'])->name('Status.storeStatusType');
        //Route::get("/status/combo-jenis-status", [StatusController::class, 'getComboJenisStatus'])->name('Status.getComboJenisStatus');

        //Route untuk DropdownLokasi
        Route::get("/kota", [DropdownLokasiContoller::class, 'kota'])->name('DropdownLokasi.kota');
        Route::get("/kecamatan", [DropdownLokasiContoller::class, 'kecamatan'])->name('DropdownLokasi.kecamatan');
        Route::get("/kelurahan", [DropdownLokasiContoller::class, 'kelurahan'])->name('DropdownLokasi.kelurahan');

    });

    Route::group(['middleware' => ['cek_login:Admin']], function () {

    });
});


