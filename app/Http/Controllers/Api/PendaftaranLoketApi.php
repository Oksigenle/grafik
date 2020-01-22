<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Pendaftar;
use App\Bank;
use App\Http\Controllers\Controller;
use App\Transformers\BankTransformer;
Use App\Transformers\PendaftaranLoket; 

class PendaftaranLoketApi extends Controller
{
    public function index() 
    {
        $pendaftaranLoket = Pendaftar::all(); 

        $pendaftaranLoket = fractal($pendaftaranLoket, new PendaftaranLoket())->toArray();
        return response()->json($pendaftaranLoket);
    }
    
    public function store(Request $request) 
    {
        $json = $request->all();
        Pendaftar::insert($json);
        return response()->json(["Berhasil"], 201);
    }
 
    public function rekening(Request $request)
    {
        $banks = new Bank;
        $banks->nama_loket = $request['nama_loket'];
        $banks->kode_loket = $request['kode_loket'];
        $banks->nama_cobranding = $request['nama_cobranding'];
        $banks->kode_cobranding = $request['kode_cobranding'];
        $banks->nama_bank = $request['nama_bank'];
        $banks->rekening = $request['rekening'];
        $banks->status = $request['status'];
        $banks->waktu_approve = $request['waktu_approve'];

        $banks->save();

        $banks = fractal($banks, new BankTransformer())->toArray();
        return response()->json(['success'], 201);
    }
}
