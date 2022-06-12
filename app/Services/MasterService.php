<?php

namespace App\Services;

use App\Models\Biodata;
use App\Models\Merk;
use App\Models\Type;
use App\Models\Jenis;
use App\Models\User;

class MasterService
{
    public function __construct()
    {
        //
    }

    function getDataJenis($id = null)
    {
        if ($id === null) {
            $data = Jenis::all();
        } else {
            $data =  Jenis::where('id', $id)->first();
        }
        return $data;
    }

    function getDataMerk($id = null)
    {
        if ($id === null) {
            $data = Merk::all();
        } else {
            $data =  Merk::where('id', $id)->first();
        }
        return $data;
    }

    function getDataType($id = null)
    {
        if ($id === null) {
            $data = Type::all();
        } else {
            $data =  Type::where('id', $id)->first();
        }
        return $data;
    }

    function getDataBiodata($id = null)
    {
        if ($id === null) {
            $data = Biodata::all();
        } else {
            $data =  Biodata::where('id', $id)->first();
        }
        return $data;
    }

    public static function storeJenis(array $data)
    {
        $store = Jenis::create(
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now(),
            ]
        );
        return true;
    }

    public static function storeMerk(array $data)
    {
        $store = Merk::create(
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ]
        );
        return true;
    }

    public static function storeType(array $data)
    {
        $store =
            Type::create([
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }

    public static function storeBiodata(array $data)
    {
        $store =
            Biodata::create([
                "nik" => $data['nik'],
                "nama" => $data['nama'],
                "no_hp" => $data['no_hp'],
                "alamat" => $data['alamat'],
                "tanggal_lahir" => $data['tanggal_lahir'],
                "tempat_lahir" => $data['tempat_lahir'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }

    public static function updateJenis($id, array $data)
    {
        $find = Jenis::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ];

        $find->update($toward);
        return true;
    }

    public static function updateMerk($id, array $data)
    {
        $find = Merk::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function updateType($id, array $data)
    {
        $find = Type::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function updateBiodata($id, array $data)
    {
        $find = Biodata::find($id);
        $toward =
            [
                "nik" => $data['nik'],
                "nama" => $data['nama'],
                "no_hp" => $data['no_hp'],
                "alamat" => $data['alamat'],
                "tanggal_lahir" => $data['tanggal_lahir'],
                "tempat_lahir" => $data['tempat_lahir'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function deleteDataJenis($id)
    {
        try {
            Jenis::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataMerk($id)
    {
        try {
            Merk::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataType($id)
    {
        try {
            Type::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataBiodata($id)
    {
        try {
            Biodata::find($id)->delete();
            User::where('biodata_id', $id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
