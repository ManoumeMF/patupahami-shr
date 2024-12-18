<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AssetRentalMobileController extends Controller
{
    private  $stat = 1;

    private $parentIdPermohonan = 1;

    public function cboJenisPermohonan(){
        $jenisPermohonan = DB::select('CALL cbo_jenisPermohonanByParentId(' . $this->parentIdPermohonan . ')');

        if ($jenisPermohonan) {
            return response()->json([
                'status' => 200,
                'jenisPermohonan' => $jenisPermohonan
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Permohonan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function cboWajibRetribusi(){
        $wajibRetribusi = DB::select('CALL cbo_wajibRetribusi()');

        if ($wajibRetribusi) {
            return response()->json([
                'status' => 200,
                'wajibRetribusi' => $wajibRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Wajib Retribusi Tidak Ditemukan.'
            ]);
        }
    }
    public function cboObjekRetribusi(){
        $objekRetribusi = DB::select('CALL cbo_objekRetribusi()');

        if ($objekRetribusi) {
            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function cboPeruntukanSewa(){
        $peruntukanSewa = DB::select('CALL cbo_peruntukanSewa()');

        if ($peruntukanSewa) {
            return response()->json([
                'status' => 200,
                'peruntukanSewa' => $peruntukanSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Peruntukan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function cboPerioditas(){
        $jangkaWaktu = DB::select('CALL cbo_jenisJangkaWaktu()');

        if ($jangkaWaktu) {
            return response()->json([
                'status' => 200,
                'jangkaWaktu' => $jangkaWaktu
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Perioditas Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function cboSatuan(){
        $satuan = DB::select('CALL cbo_satuan(' . 1 . ')');

        if ($satuan) {
            return response()->json([
                'status' => 200,
                'satuan' => $satuan
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Satuan Tidak Ditemukan.'
            ]);
        }
    }

    public function cboDokumenKelengkapan(){
        $dokumen = DB::select('CALL cbo_dokumenKelengkapan(' . 1 . ')');

        if ($dokumen) {
            return response()->json([
                'status' => 200,
                'dokumen' => $dokumen
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Dokumen Tidak Ditemukan.'
            ]);
        }
    }


    public function permohonanIndex($id)
    {
        $permohonanSewa = DB::select('CALL viewAll_permohonanSewaByIdWajibRetribusi(' . $id . ')'); 

        if ($permohonanSewa) {
            return response()->json([
                'status' => 200,
                'permohonanSewa' => $permohonanSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Permohonan Sewa Tidak Ditemukan.'
            ]);
        }
        
    }

    public function permohonanStore(Request $request)
    {
        //dd($request->all());
        $stts = 1;

        $jenisDokumen = $request->input('jenisDokumen');
        $fileDokumen = $request->file('fileDokumen');
        $keteranganDokumen = $request->input('keteranganDokumen');

        $dokumenKelengkapan = [];

        for ($count = 0; $count < collect($jenisDokumen)->count(); $count++) {
            $uploadedFileDokumen = $fileDokumen[$count];
            $dokumenPermohonan = $count . "-" . $request->get('nomorPermohonan') . time() . "." . $uploadedFileDokumen->getClientOriginalExtension();
            $dokumenPermohonanPath = Storage::disk('biznet')->putFileAs("documents/permohonanSewa", $uploadedFileDokumen, $dokumenPermohonan);

            $dokumenKelengkapan[] = [
                'JenisDokumen' => $jenisDokumen[$count],
                'FileDokumen' => $dokumenPermohonanPath,
                'KeteranganDokumen' => $keteranganDokumen[$count],
            ];
        }

        if (is_null($request->get('wajibRetribusiSebelumnya'))) {
            $wajibRetribusiSebelumnya = 0;
        } else {
            $wajibRetribusiSebelumnya = $request->get('wajibRetribusiSebelumnya');
        }

        $Permohonan = json_encode([
            'JenisPermohonan' => $request->get('jenisPermohonan'),
            'NoSuratPermohonan' => $request->get('nomorPermohonan'),
            'WajibRetribusi' => $request->get('wajibRetribusi'),
            'WajibRetribusiSebelumnya' => $wajibRetribusiSebelumnya,
            'ObjekRetribusi' => $request->get('objekRetribusi'),
            'JenisJangkaWaktu' => $request->get('perioditas'),
            'PeruntukanSewa' => $request->get('peruntukanSewa'),
            'LamaSewa' => $request->get('lamaSewa'),
            'Satuan' => $request->get('satuan'),
            'Status' => $stts,
            'Catatan' => $request->get('catatan'),
            'DibuatOleh' => $request->get('dibuatOleh'),
            'DokumenKelengkapan' => $dokumenKelengkapan
        ]);

        //dd($Permohonan);
    
            $response = DB::statement('CALL insert_permohonanSewa(:dataPermohonan)', ['dataPermohonan' => $Permohonan]);

            if ($response) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Permohonan Sewa Berhasil Disimpan!'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Permohonan Sewa Gagal Disimpan!'
                ]);
            }
    }

    public function objekRetribusi()
    {
        $objekRetribusi = DB::select('CALL viewAll_objekRetribusi()');

        if ($objekRetribusi) {
            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }

    }

    public function objekRetribusiDetail($id)
    {
        $objekRetribusiData = DB::select('CALL view_objekRetribusiById(' . $id . ')');

        $fotoObjek = DB::select('CALL view_photoObjekRetribusiById(' . $id . ')');

        if ($objekRetribusiData) {
            $objekRetribusi = $objekRetribusiData[0];

            return response()->json([
                'status' => 200,
                'objekRetribusi' => $objekRetribusi,
                'fotoObjek' => $fotoObjek
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Objek Retribusi Tidak Ditemukan.'
            ]);
        }
    }

    public function tarifObjekRetribusi()
    {
        $tarifRetribusi = DB::select('CALL viewAll_tarifObjekRetribusi()');

        if ($tarifRetribusi) {
            return response()->json([
                'status' => 200,
                'tarifRetribusi' => $tarifRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tarif Objek Retribusi Tidak Ditemukan.'
            ]);
        }

    }

    public function detailTarifObjekRetribusi($id)
    {
        $objekData = DB::select('CALL view_TarifObjekRetribusiById(' . $id . ')');
        
        //dd($objekData);
        if ($objekData) {
            $tarifObjekRetribusi = $objekData[0];

            return response()->json([
                'status' => 200,
                'tarifObjekRetribusi' => $tarifObjekRetribusi
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tarif Objek Retribusi Tidak Ditemukan.'
            ]);
        }

    }

    public function perjanjianSewa($id)
    {
        $perjanjianSewa = DB::select('CALL viewAll_perjanjianSewaByIdWajibRetribusi(' . $id . ')'); 

        if ($perjanjianSewa) {
            return response()->json([
                'status' => 200,
                'perjanjianSewa' => $perjanjianSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Perjanjian Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function perjanjianSewaDetail($id)
    {
        $perjanjianData = DB::select('CALL view_perjanjianSewaById('  . $id . ')');

        if ($perjanjianData) {
            $perjanjianSewa = $perjanjianData[0];

            return response()->json([
                'status' => 200,
                'perjanjianSewa' => $perjanjianSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Perjanjian Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function tagihanSewa($id)
    {
        $tagihanSewa = DB::select('CALL view_tagihanByIdWajibRetribusi(' . $id . ')'); 

        if ($tagihanSewa) {
            return response()->json([
                'status' => 200,
                'tagihanSewa' => $tagihanSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function detailTagihanSewa($id)
    {
        $headTagihanDetailData = DB::select('CALL view_headTagihanByIdPerjanjian(' . $id . ')');
        $tagihanDetail = DB::select('CALL view_tagihanByIdPerjanjian(' . $id . ')');

        //dd($tagihanDetail);
        $detailTagihan = [];

        for ($count = 0; $count < collect($tagihanDetail)->count(); $count++) {

            if ($tagihanDetail[$count]->idStatus == 9) {
                $detailTagihan[] = [
                    'IdTagihan' => $tagihanDetail[$count]->idTagihanSewa
                ];
            }

        }

        $dataTagihan = json_encode([
            'IdPerjanjian' => $id,
            'DetailTagihan' => $detailTagihan
        ]);

        if ($headTagihanDetailData) {
            DB::statement('CALL update_tagihan(:dataTagihan)', ['dataTagihan' => $dataTagihan]);


            $tagihanDetail = DB::select('CALL view_tagihanByIdPerjanjian(' . $id . ')');
            $headTagihanDetail = $headTagihanDetailData[0];

            return response()->json([
                'status' => 200,
                'headTagihanDetail' => $headTagihanDetail,
                'tagihanDetail' => $tagihanDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function checkout(Request $request)
    {
        //dd($request->all());

        $idDibuatOleh = $request->get('DibuatOleh');
        $stats = $request->get('Status');
        $idTagihan = $request->input('idTagihan');

        $detailTagihan = [];

        for ($count = 0; $count < collect($idTagihan)->count(); $count++) {
            //dd($fileFoto[$count]);

            $detailTagihan[] = 
                intval($idTagihan[$count])
            ;
        }
        
        $dataTagihan = json_encode([
            'IdPerjanjian' => $request->get('idPerjanjian'),
            'DibuatOleh' => $idDibuatOleh,
            'Status' => $stats,
            'DetailTagihan' => $detailTagihan
        ]);

        //dd($dataTagihan);

        $existPembayaran = DB::select('CALL view_pembayaranExist(:dataTagihan)', ['dataTagihan' => $dataTagihan]);

        if ($existPembayaran) {

            $idPembayaran = $existPembayaran[0];
        }else{
            $checkout = DB::select('CALL view_checkoutTagihanByid(:dataTagihan)', ['dataTagihan' => $dataTagihan]);
            $idPembayaran = $checkout[0];

        }
        $headPembayaranData = DB::select('CALL view_pembayaranSewaById(' . $idPembayaran->idPembayaranSewa . ')');

       
        if ($headPembayaranData) {

            $headPembayaran = $headPembayaranData[0];
            $detailPembayaran = DB::select('CALL view_detailPembayaranByIdPembayaran(' . $idPembayaran->idPembayaranSewa . ')');

            return response()->json([
                'status' => 200,
                'headPembayaran' => $headPembayaran,
                'detailPembayaran' => $detailPembayaran,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function singleCheckout($idP, $idT)
    {
        //dd($request->get('idPerjanjian'));

        $idPerjanjian = $idP;

        $idTagihan = $idT;

            $detailTagihan[] = 
                intval($idTagihan)
            ;

        //dd($detailTagihan);

        $dataTagihan = json_encode([
            'IdPerjanjian' => $idP,
            'DetailTagihan' => $detailTagihan
        ]);

        //dd($dataTagihan);

        $headTagihanDetailData = DB::select('CALL view_headTagihanByIdPerjanjian(' . $idPerjanjian . ')');

        

        //dd($dataTagihan);

       
        if ($headTagihanDetailData) {

            $checkoutDetail = DB::select('CALL view_checkoutTagihanByid(:dataTagihan)', ['dataTagihan' => $dataTagihan]);
            $headTagihanDetail = $headTagihanDetailData[0];

            return response()->json([
                'status' => 200,
                'headTagihanDetail' => $headTagihanDetail,
                'checkoutDetail' => $checkoutDetail,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Tagihan Sewa Tidak Ditemukan.'
            ]);
        }
    }

    public function pembayaranSewa($id)
    {
        $pembayaranSewa = DB::select('CALL view_pembayaranSewaByIdWajib('  . $id . ')');

        if ($pembayaranSewa) {
            return response()->json([
                'status' => 200,
                'pembayaranSewa' => $pembayaranSewa
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Pembayaran Sewa Tidak Ditemukan.'
            ]);
        }

    }

    public function storeBukti(Request $request)
    {
        //dd($request->all());

        if ($request->hasFile('fileBukti')) {
            //dd($request->file('fileSuratPerjanjian'));
            $uploadedFile = $request->file('fileBukti');
            $filePenilaian = $request->get('idPembayaranSewa') . "-" . time() . "." . $uploadedFile->getClientOriginalExtension();
            $filePath = Storage::disk('biznet')->putFileAs("images/BuktiBayar", $uploadedFile, $filePenilaian);
        }else{
            $filePath="";
        }

        $idTagihan = $request->input('idTagihan');

        $detailTagihan = [];

        for ($count = 0; $count < collect($idTagihan)->count(); $count++) {

            $detailTagihan[] = [
                'idTagihan' => $idTagihan[$count]
            ];
        }

        $dataPembayaran = json_encode([
            'IdPembayaran' => $request->get('idPembayaranSewa'), 
            'NamaBank' => $request->get('namaBank'), 
            'NamaPemilikRek' => $request->get('namaPemilikRek'), 
            'JumlahDana' => $request->get('jumlahDana'), 
            'Keterangan' => $request->get('keterangan'), 
            'FileBuktiBayar' => $filePath, 
            'DetailTagihan' =>  $detailTagihan
        ]);

        //dd($dataPembayaran);

        $response = DB::statement('CALL insert_BuktiPembayaran(:dataPembayaran)', ['dataPembayaran' => $dataPembayaran]);

        if ($response) {
            return response()->json([
                'status' => 200,
                'message' => 'Bukti Bayar Berhasil Disimpan!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Bukti Bayar Gagal Disimpan!'
            ]);
        }

        //return view('admin.TagihanDanPembayaran.Pembayaran.uploadBukti');
    }

    public function login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            //$userRole = Auth::user()->roles->roleName;

            $userData = DB::select('CALL view_userSessionById(?, ?)', [$user->id, $user->idJenisUser]);
   
            return response()->json([
                'status' => 200,
                'userData' => $userData
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Username atau Password Anda Salah!'
            ]);
        }
    }
}