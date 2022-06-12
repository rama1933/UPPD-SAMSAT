<?php

namespace Database\Seeders;

use App\Models\Biodata;
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
            'biodata_id' => 1,
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
