<?php

namespace App\Transformers;

use App\Bank;
use League\Fractal\TransformerAbstract;

class BankTransformer extends TransformerAbstract
{ 
    /**
     * A Fractal transformer.
     * 
     * @return array
     */
    public function transform(Bank $bank)
    { 
        return [
            'nama_loket' => $bank->nama_loket, 
            'kode_loket' => $bank->kode_loket,
            'nama_cobranding' => $bank->nama_cobranding, 
            'kode_cobranding' => $bank->kode_cobranding,
            'nama_bank' => $bank->nama_bank, 
            'rekening' => $bank->rekening,
            'status' => $bank->status, 
            'waktu_approve' => $bank->waktu_approve, 
        ];
    }
}
