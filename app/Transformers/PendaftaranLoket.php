<?php

namespace App\Transformers;

use App\Pendaftar;
use League\Fractal\TransformerAbstract;

class PendaftaranLoket extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(pendaftar $pendaftar)
    {
        return [
            'id' => $pendaftar->id,
            'kode_cobranding' => $pendaftar->kode_cobranding,
            'nama_cobranding' => $pendaftar->nama_cobranding,
            'kode_loket' => $pendaftar->kode_loket,
            'nama_loket' => $pendaftar->nama_loket,
            'deposit_saat_ini' => $pendaftar->deposit_saat_ini,
            'waktu_pendaftaran' => $pendaftar->waktu_pendaftaran,
        ];
    }
}
