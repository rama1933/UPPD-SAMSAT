<?php

namespace App\Http\Controllers;

use App\Models\TrxPendaftaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['jumlah_pendaftaran'] = TrxPendaftaran::count();
        $data['jumlah_proses'] = TrxPendaftaran::where('status', '0')->count();
        $data['jumlah_selesai'] = TrxPendaftaran::where('status', '1')->count();
        return view('admin.home', $data);
    }

    public function indexuser()
    {
        return view('user.home');
    }
}
