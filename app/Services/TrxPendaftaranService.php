<?php

namespace App\Services;

use App\Models\Pendaftaran;
use App\Models\TrxPendaftaran;

class TrxPendaftaranService
{
    public function __construct()
    {
        //
    }

    function getDataTrxPendaftaran($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = Pendaftaran::with('pendaftarans')->with('dealer')->with('merk')->with('type')->with('biodata')->get();
        } elseif ($id === null && $user_id != null) {
            $data = TrxPendaftaran::with('dealer')->with('merk')->with('type')->where('user_id', $user_id)->get();
        } else {
            $data =  TrxPendaftaran::where('id', $id)->first();
        }
        return $data;
    }

    function getDataTrxPendaftaranSelesai($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = Pendaftaran::with('pendaftarans')->with('dealer')->with('merk')->with('type')->with('biodata')->whereHas('pendaftarans', function ($q) {
                $q->where('status', '1');
            })->get();
        } elseif ($id === null && $user_id != null) {
            $data = TrxPendaftaran::with('dealer')->with('merk')->with('type')->where('user_id', $user_id)->get();
        } else {
            $data =  TrxPendaftaran::where('id', $id)->first();
        }
        return $data;
    }

    public static function updatePendaftaran($id, array $data)
    {
        $find = TrxPendaftaran::find($id);
        $toward =
            [
                "nopol" => $data['nopol'],
                "tgl_stnk" => $data['tgl_stnk'],
                "tgl_pajak" => $data['tgl_pajak'],
                "status" => '1',
                "created_at" => now(),
                "updated_at" => now(),
            ];

        $find->update($toward);
        return true;
    }
}
