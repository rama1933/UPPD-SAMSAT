<?php

namespace App\Services;

use App\Models\Pendaftaran;
use App\Models\TrxPendaftaran;
use Illuminate\Support\Facades\DB;

class PendaftaranService
{
    public function __construct()
    {
        //
    }

    function getDataPendaftaran($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = Pendaftaran::with('dealer')->with('merk')->with('type')->get();
        } elseif ($id === null && $user_id != null) {
            $data = Pendaftaran::with('dealer')->with('merk')->with('type')->where('user_id', $user_id)->get();
        } else {
            $data =  Pendaftaran::where('id', $id)->first();
        }
        return $data;
    }


    public static function storePendafataran(array $data)
    {

        $pendaftaran = DB::table('tbl_pendaftaran')->insertGetId([
            "user_id" => $data['user_id'],
            "biodata_id" => $data['biodata_id'],
            "dealer_id" => $data['dealer_id'],
            "type_id" => $data['type_id'],
            "merk_id" => $data['merk_id'],
            "warna" => $data['warna'],
            "tahun" => $data['tahun'],
            "tanggal" =>  now(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        TrxPendaftaran::create([
            'pendaftaran_id' => $pendaftaran,
            'created_at' =>  now(),
            'updated_at' => now(),
        ]);
        return true;
    }

    public static function updatePendaftaran($id, array $data)
    {
        $find = Pendaftaran::find($id);
        $toward =
            [
                "dealer_id" => $data['dealer_id'],
                "type_id" => $data['type_id'],
                "merk_id" => $data['merk_id'],
                "warna" => $data['warna'],
                "tahun" => $data['tahun'],
                "tanggal" => now(),
                "created_at" => now(),
                "updated_at" => now(),
            ];

        $find->update($toward);
        return true;
    }

    public static function deleteDataPendaftaran($id)
    {
        try {
            Pendaftaran::find($id)->delete();
            TrxPendaftaran::where('pendaftaran_id', $id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
