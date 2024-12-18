<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TagihanController extends Controller
{
    private $stat = 13;

    public function index()
    {
        $tagihanSewa = DB::select('CALL view_tagihanAll()');

        return view('admin.TagihanDanPembayaran.Tagihan.index', compact('tagihanSewa'));

    }

    public function detail($id)
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

        //dd($detailTagihan);

        $dataTagihan = json_encode([
            'IdPerjanjian' => $id,
            'DetailTagihan' => $detailTagihan
        ]);

        if ($headTagihanDetailData) {

            DB::statement('CALL update_tagihan(:dataTagihan)', ['dataTagihan' => $dataTagihan]);


            $tagihanDetail = DB::select('CALL view_tagihanByIdPerjanjian(' . $id . ')');
            $headTagihanDetail = $headTagihanDetailData[0];

            //dd($tagihanDetail);

            return view('admin.TagihanDanPembayaran.Tagihan.detail', compact('tagihanDetail', 'headTagihanDetail'));
        } else {
            return redirect()->route('Tagihan.detail', $id)->with('error', 'Data Tagihan Tidak Ditemukan!');
        }
    }

    public function checkout(Request $request)
    {
        //dd($request->all());

        $idPerjanjian = $request->get('idPerjanjian');

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
            'DibuatOleh' => Auth::user()->id,
            'Status' => $this->stat,
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
        //dd( $idPembayaran->idPembayaranSewa);

        $headPembayaranData = DB::select('CALL view_pembayaranSewaById(' . $idPembayaran->idPembayaranSewa . ')');

        if ($headPembayaranData) {

            $headPembayaran = $headPembayaranData[0];
            $detailPembayaran = DB::select('CALL view_detailPembayaranByIdPembayaran(' . $idPembayaran->idPembayaranSewa . ')');

            //dd($checkoutDetail);

            return view('admin.TagihanDanPembayaran.Tagihan.invoice', compact('headPembayaran', 'detailPembayaran'));
        } else {
            return redirect()->route('Tagihan.detail', $request->get('idPerjanjian'))->with('error', 'Data Tagihan Tidak Ditemukan!');
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

            //dd($checkoutDetail);

            return view('admin.TagihanDanPembayaran.Tagihan.invoice', compact('headTagihanDetail', 'checkoutDetail'));
        } else {
            return redirect()->route('Tagihan.detail', $idP)->with('error', 'Data Tagihan Tidak Ditemukan!');
        }
    }
}