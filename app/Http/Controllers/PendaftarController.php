<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Bank;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PendaftarController extends Controller
{
    public function __construct()
    { 
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function pendaftar(Request $request)
    {
        $tahun = $request->get('year');

        $category = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $series[0]['name'] = 'Total Pandaftar Loket';
        for ($bulan=1; $bulan < 13 ; $bulan++) { 
            $series[0]['data'][] = Pendaftar::whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 34')
                ->whereMonth('waktu_pendaftaran','=', $bulan)      
                ->whereYear('waktu_pendaftaran', '=', $tahun)
                ->count();
        }
            
        return view('layouts.pages.pendaftaranLoket.pendaftar',['category' => $category, 'series' => $series]);
    }
    
    public function byDeposit(Request $request)
    {
        $tahun = $request->get('year');

        $category = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    	$series[0]['name'] = 'Aktif';
        $series[1]['name'] = 'Tidak Aktif';

            for ($bulan=1; $bulan < 13 ; $bulan++) { 
                $series[0]['data'][] = Pendaftar::where('deposit_saat_ini', '!=', '0' )
                ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 29')
                // ->where('nama_cobranding', '=', 'BANKJOGJA')
                    ->whereMonth('waktu_pendaftaran','=', $bulan)
                    ->whereYear('waktu_pendaftaran', '=', $tahun)
                    ->count();
                    
                $series[1]['data'][] = Pendaftar::where('deposit_saat_ini', '=', '0')
                // ->where('nama_cobranding', '=', 'BANKJOGJA')    
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 29')
                    ->whereMonth('waktu_pendaftaran','=', $bulan)
                    ->whereYear('waktu_pendaftaran', '=', $tahun)
                    ->count();
            }       
        return view('layouts.pages.deposit.bydeposit', ['category' => $category, 'series' => $series]);

    }


    public function manualApprove(Request $request)
    {
        $tahun = $request->get('year');

        $category = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    	$series[0]['name'] = 'BUKOPIN'; // 100 2477 048
        $series[1]['name'] = 'BSM'; //755 6755 676
        $series[2]['name'] = 'BCA'; //037-4449555
        $series[3]['name'] = 'BNI'; //456 508 6911
        $series[4]['name'] = 'BNI'; //217 061 3337
        $series[5]['name'] = 'BRI'; //1111 01 000100 30 3
        $series[6]['name'] = 'MANDIRI'; //137 0022225557

            for ($bulan=1; $bulan < 13 ; $bulan++) { 
                $series[0]['data'][] = Bank::where('rekening', '=', '100 2477 048')
                    ->where('status', '=', 'APPROVED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count(); 
                    
                $series[1]['data'][] = Bank::where('rekening', '=', '755 6755 676')
                    ->where('status', '=', 'APPROVED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[2]['data'][] = Bank::where('rekening', '=', '037-4449555')  
                    ->where('status', '=', 'APPROVED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[3]['data'][] = Bank::where('rekening', '=', '456 508 6911')  
                    ->where('status', '=', 'APPROVED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[4]['data'][] = Bank::where('rekening', '=', '217 061 3337')  
                    ->where('status', '=', 'APPROVED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[5]['data'][] = Bank::where('rekening', '=', '1111 01 000100 30 3')
                    ->where('status', '=', 'APPROVED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[6]['data'][] = Bank::where('rekening', '=', '137 0022225557') 
                    ->where('status', '=', 'APPROVED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

            }       
        return view('layouts.pages.deposit.manual.approve', ['category' => $category, 'series' => $series]);

    }

    public function manualReject(Request $request)
    {
        $tahun = $request->get('year');

        $category = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    	$series[0]['name'] = 'BUKOPIN';
        $series[1]['name'] = 'BSM';
        $series[2]['name'] = 'BCA';
        $series[3]['name'] = 'BNI';
        $series[4]['name'] = 'BNI';
        $series[5]['name'] = 'BRI';
        $series[6]['name'] = 'MANDIRI';

            for ($bulan=1; $bulan < 13 ; $bulan++) { 
                $series[0]['data'][] = Bank::where('rekening', '=', '100 2477 048')
                    ->where('status', '=', 'REJECTED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count(); 
                    
                $series[1]['data'][] = Bank::where('rekening', '=', '755 6755 676')
                    ->where('status', '=', 'REJECTED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[2]['data'][] = Bank::where('rekening', '=', '037-4449555')  
                    ->where('status', '=', 'REJECTED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[3]['data'][] = Bank::where('rekening', '=', '456 508 6911')  
                    ->where('status', '=', 'REJECTED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[4]['data'][] = Bank::where('rekening', '=', '217 061 3337')  
                    ->where('status', '=', 'REJECTED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[5]['data'][] = Bank::where('rekening', '=', '1111 01 000100 30 3')
                    ->where('status', '=', 'REJECTED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

                $series[6]['data'][] = Bank::where('rekening', '=', '137 0022225557') 
                    ->where('status', '=', 'REJECTED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();

            }       
        return view('layouts.pages.deposit.manual.reject', ['category' => $category, 'series' => $series]);

    }

    public function otomatisApprove(Request $request)
    {
        $tahun = $request->get('year');

        $category = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    	$series[0]['name'] = 'EPayBRI'; // BRI Rek 1111 01 000102 305 a.n. PT Bakoel Nusantara
        $series[1]['name'] = 'BRITiket';    // BRI Rek 111101000102305 a.n. PT BAKOEL NUSANTARA
        $series[2]['name'] = 'MATMMandiri'; // MANDIRI Rek 1370005232323 a.n. TEDDIE
        $series[3]['name'] = 'BCATiket';    // BCATiket037-4447111

            for ($bulan=1; $bulan < 13 ; $bulan++) { 
                $series[0]['data'][] = Bank::where('rekening', '=', '1111 01 000102 305')
                    ->where('status', '=', 'APPROVED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count(); 
                    
                $series[1]['data'][] = Bank::where('rekening', '=', '111101000102305')
                    ->where('status', '=', 'APPROVED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();


                $series[2]['data'][] = Bank::where('rekening', '=', '1370005232323') 
                    ->where('status', '=', 'APPROVED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();
                
                $series[3]['data'][] = Bank::where('rekening', '=', '037-4447111') 
                    ->where('status', '=', 'APPROVED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();
            }       
        return view('layouts.pages.deposit.otomatis.approve', ['category' => $category, 'series' => $series]);
    }

    public function otomatisReject(Request $request)
    {
        $tahun = $request->get('year');

        $category = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    	$series[0]['name'] = 'EPayBRI';
        $series[1]['name'] = 'BRITiket';
        $series[2]['name'] = 'MATMMandiri';
        $series[3]['name'] = 'BCATiket';

            for ($bulan=1; $bulan < 13 ; $bulan++) { 
                $series[0]['data'][] = Bank::where('rekening', '=', '1111 01 000102 305')
                    ->where('status', '=', 'REJECTED')
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count(); 
                    
                $series[1]['data'][] = Bank::where('rekening', '=', '111101000102305')
                    ->where('status', '=', 'REJECTED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();


                $series[2]['data'][] = Bank::where('rekening', '=', '1370005232323') 
                    ->where('status', '=', 'REJECTED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();
                
                $series[3]['data'][] = Bank::where('rekening', '=', '037-4447111') 
                    ->where('status', '=', 'REJECTED')  
                    ->whereRaw('DATEDIFF(CURRENT_DATE,created_at) <= 5')
                    ->whereMonth('waktu_approve','=', $bulan)
                    ->whereYear('waktu_approve', '=', $tahun)
                    ->count();
            }       
        return view('layouts.pages.deposit.otomatis.reject', ['category' => $category, 'series' => $series]);
    }
}