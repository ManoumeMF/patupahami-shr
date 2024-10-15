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
        // Retrieve all non-deleted Bidang records
        //$bidang = DB::select('CALL viewAll_bidang()');

        return view('admin.Dashboard.index');
        //return view('admin.PengaturanDanKonfigurasi.Bidang.index', ['bidang' => $bidang]);
    }
}
