<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve data to widget on dasboard page
        $permohonanBaruTemp = DB::select('CALL view_permohonanBaru()');
        $permohonanBaru = $permohonanBaruTemp[0];

        $permohonanDisetujuiTemp = DB::select('CALL view_permohonanDisetujui()');
        $permohonanDisetujui = $permohonanDisetujuiTemp[0];

        return view('admin.Dashboard.index', compact('permohonanBaru', 'permohonanDisetujui'));
        //return view('admin.PengaturanDanKonfigurasi.Bidang.index', ['bidang' => $bidang]);
    }
}
