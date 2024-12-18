<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class PermohonanSewaController extends Controller
{
    private $stat = 1;

    private $parentIdPermohonan = 1;

    public function index()
    {
        $permohonanSewa = DB::select('CALL viewAll_permohonanSewa()');

        return view('admin.SewaAset.Permohonan.index', compact('permohonanSewa'));

        //return view('admin.SewaAset.Permohonan.index');

    }

    public function create()
    {
        $jenisPermohonan = DB::select('CALL cbo_jenisPermohonanByParentId(' . $this->parentIdPermohonan . ')');
        $wajibRetribusi = DB::select('CALL cbo_wajibRetribusi()');
        $objekRetribusi = DB::select('CALL cbo_objekRetribusi()');
        $jangkaWaktu = DB::select('CALL cbo_jenisJangkaWaktu()');
        $peruntukanSewa = DB::select('CALL cbo_peruntukanSewa()');
        $dokumenKelengkapan = DB::select('CALL cbo_dokumenKelengkapan(' . 2 . ')');
        $satuan = DB::select('CALL cbo_satuan(' . 1 . ')');

        return view('admin.SewaAset.Permohonan.create', compact('jenisPermohonan', 'wajibRetribusi', 'objekRetribusi', 'jangkaWaktu', 'peruntukanSewa', 'dokumenKelengkapan', 'satuan'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
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
            'Status' => $this->stat,
            'Catatan' => $request->get('catatan'),
            'DibuatOleh' => Auth::user()->id,
            'DokumenKelengkapan' => $dokumenKelengkapan
        ]);

        //dd($Permohonan);

        $response = DB::statement('CALL insert_permohonanSewa(:dataPermohonan)', ['dataPermohonan' => $Permohonan]);

        if ($response) {
            return redirect()->route('PermohonanSewa.index')->with('success', 'Permohonan Sewa Berhasil Ditambahkan!');
        } else {
            return redirect()->route('PermohonanSewa.create')->with('error', 'Permohonan Sewa Gagal Disimpan!');
        }
    }

    public function edit($id)
    {
        $perkerjaan = DB::select('CALL cbo_pekerjaan()');

        return view('admin.Master.WajibRetribusi.edit', compact('perkerjaan'));
    }


    public function update(Request $request, $id)
    {
        $Status = json_encode([
            'IdStatus' => $id,
            'IdJenisStatus' => $request->get('jenisStatus'),
            'Status' => $request->get('namaStatus'),
            'Keterangan' => $request->get('keterangan')
        ]);

        //dd($Status);

        $statusData = DB::select('CALL view_statusById(' . $id . ')');
        $statusTemp = $statusData[0];

        if ($statusTemp) {
            $response = DB::statement('CALL update_status(:dataStatus)', ['dataStatus' => $Status]);

            if ($response) {
                return redirect()->route('Status.index')->with('success', 'Status Berhasil Diubah!');
            } else {
                return redirect()->route('Status.edit', $id)->with('error', 'Status Gagal Diubah!');
            }

        } else {
            return redirect()->route('Status.index')->with('error', 'Status Tidak Ditemukan!');
        }
    }

    public function delete(Request $request)
    {
        $statusData = DB::select('CALL view_statusById(' . $request->get('idStatus') . ')');
        $statusTemp = $statusData[0];

        if ($statusTemp) {
            $id = $request->get('idStatus');

            $response = DB::statement('CALL delete_status(?)', [$id]);

            return response()->json([
                'status' => 200,
                'message' => 'Status Berhasil Dihapus!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Status Tidak Ditemukan.'
            ]);
        }
    }

    public function detail($id)
    {
        $idStatus = "0";

        $permohonanData = DB::select('CALL view_PermohonanSewaByIdAndStatus(?, ?)', [$id, $idStatus]);
        $permohonanSewa = $permohonanData[0];

        //dd($fieldEducation);

        return view('admin.SewaAset.Permohonan.detail', compact('permohonanSewa'));
    }

    public function storeStatusType(Request $request)
    {

        $JenisStatus = json_encode([
            'JenisStatus' => $request->get('jenisStatusModal'),
            'Keterangan' => $request->get('jenisKeteranganModal')
        ]);

        //dd($JenisStatus);

        $response = DB::statement('CALL insert_jenisStatus(:dataJenisStatus)', ['dataJenisStatus' => $JenisStatus]);

        if ($response) {
            return response()->json([
                'status' => 200,
                'message' => 'Jenis Status Berhasil Ditambahkan.'
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Jenis Status Gagal Ditambahkan.'
            ]);
        }
    }

    public function getComboJenisStatus()
    {
        $statusTypeCombo = DB::select('CALL cbo_JenisStatus()');

        return response()->json($statusTypeCombo);
    }

    public function approvePermohonanList()
    {
        $permohonanSewa = DB::select('CALL viewAll_permohonanSewaByStatus()');

        //dd($fieldEducation);

        return view('admin.SewaAset.Permohonan.approvePermohonanList', compact('permohonanSewa'));
    }

    public function approvePermohonanDetail($id)
    {
        $idStatus = "0";

        $permohonanData = DB::select('CALL view_PermohonanSewaByIdAndStatus(?, ?)', [$id, $idStatus]);
        $permohonanSewa = $permohonanData[0];

        //dd($fieldEducation);

        return view('admin.SewaAset.Permohonan.approvePermohonan', compact('permohonanSewa'));
    }

    public function storeApprovePermohonan(Request $request)
    {
        $permohonanData = DB::select('CALL view_permohonanById(' . $request->get('idPermohonan') . ')');
        $permohonanTemp = $permohonanData[0];

        if ($permohonanTemp) {
            $approvePermohonan = json_encode([
                'IdPermohonan' => $request->get('idPermohonan'),
                'NamaStatus' => $request->get('namaStatus'),
            ]);

            //dd($approvePermohonan);

            $response = DB::statement('CALL approve_permohonanSewa(:dataPermohonan)', ['dataPermohonan' => $approvePermohonan]);

            return response()->json([
                'status' => 200,
                'message' => 'Permohonan Berhasil Disetujui!'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data Permohonan Tidak Ditemukan.'
            ]);
        }
    }
}