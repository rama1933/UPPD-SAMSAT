<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $profile = Profile::create([
            'nama' => 'UPPD SAMSAT KANDANGAN',
            'alamat' => 'Jl. Jend. Sudirman Km. 3,5 RT.2 RW.1 Desa Karasikan  Kec. Sungai Raya Kandangan 71271',
            'profile' => 'Sistem Administrasi Manunggal Satu Atap (disingkat Samsat), atau dalam Bahasa Inggris One Roof System, adalah suatu sistem administrasi yang dibentuk untuk memperlancar dan mempercepat pelayanan kepentingan masyarakat yang kegiatannya diselenggarakan dalam satu gedung. Contoh dari samsat adalah dalam pengurusan dokumen kendaraan bermotor. <br>
            Samsat merupakan suatu sistem kerjasama secara terpadu antara Polri, Dinas Pendapatan Provinsi, dan PT Jasa Raharja (Persero) dalam pelayanan untuk menerbitkan STNK dan Tanda Nomor Kendaraan Bermotor yang dikaitkan dengan pemasukan uang ke kas negara baik melalui Pajak Kendaraan Bermotor (PKB), Bea Balik Nama Kendaraan Bermotor, dan Sumbangan Wajib Dana Kecelakaan Lalu Lintas Jalan (SWDKLJJ), dan dilaksanakan pada satu kantor yang dinamakan "Kantor Bersama Samsat". <br>
            Dalam hal ini, Polri memiliki fungsi penerbitan STNK; Dinas Pendapatan Provinsi menetapkan besarnya Pajak Kendaraan Bermotor (PKB) dan Bea Balik Nama Kendaraan Bermotor (BBN-KB); sedangkan PT Jasa Raharja mengelola Sumbangan Wajib Dana Kecelakaan Lalu Lintas Jalan (SWDKLLJ). <br>
            Lokasi Kantor Bersama Samsat umumnya berada di lingkungan Kantor Polri setempat, atau di lingkungan Satlantas/Ditlantas Polda setempat.<br>
            Samsat ada di masing-masing provinsi, serta memiliki unit pelayanan di setiap kabupaten/kota.
            ',
            'tujuan' => 'Tersedianya Prasarana dan sarana Pelayanan disertai dengan meningkatkannya sistem penatausahaan dan sumber daya manusia yang berkompetensi untuk menuju pelayanan yang berstandar.',

            'visi' => 'Terwujudnya Pelayanan Prima Demi Kepuasan Masyarakat',
            'misi' => '1.	Menyediakan pelayanan kepada masyarakat pemilik kendaraan bermotor dalam pengurusan STNK, pembayaran PKB/BBNKB dan SWDKLLJ secara cepat, tepat dan benar serta berpedoman pada ketentuan yang berlaku. <br>
            2.	Menyajikan data sebagai bahan infomasi tentang identitas kepemilikan kendaraan bermotor, nilai PKB/BBNKB dan SWDKLLJ kendaraan bermotor yang diperlukan untuk pengambilan keputusan. <br>
            3.	Menyelenggarakan tertib administrasi dokumen secara baik, benar dan akurat dalam rangka menjamin kepastian hukum kepemilikan dan identitas data kendaraan bermotor<br>
            4.	Melakukan upaya peningkatan untuk layanan melalui perbaikan sarana dan prasarana, sistem komputerisasi serta pengembangan SDM. <br>
            ',
            'moto' => 'Melayani dengan cepat, tepat, efisien, transparan dan sepenuh Hati'
        ]);
    }
}
