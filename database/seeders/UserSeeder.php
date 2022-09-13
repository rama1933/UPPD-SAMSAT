<?php

namespace Database\Seeders;

use App\Models\Biodata;
use App\Models\Dealer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biodata = Biodata::create([
            'nik' => '1111',
            'nama' => 'user',
            'no_hp' => '0808',
            'alamat' => 'hss',
            'tanggal_lahir' => '2000-01-01',
            'tempat_lahir' => 'hss'
        ]);

        $dealer = Dealer::create([
            'nama' => 'Dealer Honda AHASS 1195',
            'no_hp' => '08080808',
            'alamat' => 'Tibung Raya, Kec. Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71213',
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('rahasia'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'password' => bcrypt('rahasia'),
            'dealer_id' => 1,
        ]);

        $user->assignRole('user');
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
