<?php

namespace App\Services;

use App\Models\Merk;
use App\Models\Type;
use App\Models\User;
use App\Models\Jenis;
use App\Models\Dealer;
use App\Models\Biodata;
use App\Models\Pegawai;
use App\Models\Profile;

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

    function getDataDealer($id = null)
    {
        if ($id === null) {
            $data = Dealer::all();
        } else {
            $data =  Dealer::where('id', $id)->first();
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

    function getDataPegawai($id = null)
    {
        if ($id === null) {
            $data = Pegawai::all();
        } else {
            $data =  Pegawai::where('id', $id)->first();
        }
        return $data;
    }

    function getDataProfile($id = null)
    {
        if ($id === null) {
            $data = Profile::all();
        } else {
            $data =  Profile::where('id', $id)->first();
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

    public static function storeDealer(array $data)
    {
        $store = Dealer::create(
            [
                "nama" => $data['nama'],
                "alamat" => $data['alamat'],
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
                "jenis" => $data['jenis'],
                "type" => $data['type'],
                "harga" => $data['harga'],
                "merk" => $data['merk'],
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

    public static function storePegawai(array $data)
    {
        $store =
            Pegawai::create([
                "nip" => $data['nip'],
                "nama" => $data['nama'],
                "jk" => $data['jk'],
                "jabatan" => $data['jabatan'],
                "no_hp" => $data['no_hp'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }

    public static function storeProfile(array $data)
    {
        $store =
            Profile::create([
                "nama" => $data['nama'],
                "alamat" => $data['alamat'],
                "profile" => $data['profile'],
                "tujuan" => $data['tujuan'],
                "visi" => $data['visi'],
                "misi" => $data['misi'],
                "moto" => $data['moto'],
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

    public static function updateDealer($id, array $data)
    {
        $find = Dealer::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "alamat" => $data['alamat'],
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
                "jenis" => $data['jenis'],
                "type" => $data['type'],
                "harga" => $data['harga'],
                "merk" => $data['merk'],
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

    public static function updatePegawai($id, array $data)
    {
        $find = Pegawai::find($id);
        $toward =
            [
                "nip" => $data['nip'],
                "nama" => $data['nama'],
                "jk" => $data['jk'],
                "jabatan" => $data['jabatan'],
                "no_hp" => $data['no_hp'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function updateProfile($id, array $data)
    {
        $find = Profile::find($id);
        $toward =
            [
                "nama" => $data['nama'],
                "alamat" => $data['alamat'],
                "profile" => $data['profile'],
                "tujuan" => $data['tujuan'],
                "visi" => $data['visi'],
                "misi" => $data['misi'],
                "moto" => $data['moto'],
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

    public static function deleteDataDealer($id)
    {
        try {
            Dealer::find($id)->delete();
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


    public static function deleteDataPegawai($id)
    {
        try {
            Pegawai::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function deleteDataProfile($id)
    {
        try {
            Profile::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
