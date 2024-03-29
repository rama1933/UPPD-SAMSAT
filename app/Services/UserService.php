<?php

namespace App\Services;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function __construct()
    {
        //
    }

    function getDataUser($id = null)
    {
        if ($id === null) {
            $data = User::all();
        } else {
            $data =  User::where('id', $id)->first();
        }
        return $data;
    }

    function getDataBiodata($nik)
    {
        $data =  Biodata::where('nik', $nik)->first();
        return $data;
    }

    public static function storeUser(array $data)
    {
        $trans = DB::transaction(function () use ($data) {
            // $date_input = strtotime($data['tanggal_lahir']);
            // $date = date('Y-m-d', $date_input);

            // $cek = Biodata::where('nik', $data['nik'])->get();
            // if ($cek->isEmpty()) {
            $dealer = DB::table('tbl_master_dealer')->insertGetId([
                'nama' => $data['nama'],
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat'],
                'created_at' =>  now(),
                'updated_at' => now(),
            ]);

            // dd($dealer);

            $user = User::create([
                'username' => $data['username'],
                'name' => $data['nama'],
                'password' => bcrypt($data['password']),
                'role' => 'user',
                'dealer_id' => $dealer,
                'created_at' =>  now(),
                'updated_at' => now(),
            ]);
            $user->assignRole('user');
        });
        return true;
    }

    public static function updateUser($id, array $data)
    {

        $trans = DB::transaction(function () use ($data, $id) {
            $find = User::find($id);
            if ($data['password'] == null) {
                $toward =
                    [
                        'username' => $data['username'],
                        'name' => $data['name'],
                        'biodata_id' => $data['biodata_id'],
                        'created_at' =>  now(),
                        'updated_at' => now(),
                    ];
            } else {
                $toward =
                    [
                        'username' => $data['username'],
                        'name' => $data['name'],
                        'password' => bcrypt($data['password']),
                        'biodata_id' => $data['biodata_id'],
                        'created_at' =>  now(),
                        'updated_at' => now(),
                    ];
            }
            $find->update($toward);
        });
        return true;
    }

    public static function deleteDataUser($id)
    {
        try {
            User::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
