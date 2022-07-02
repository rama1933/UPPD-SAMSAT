<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Biodata;
use App\Models\Pegawai;
use App\Models\Pendaftaran;
use App\Models\TrxPendaftaran;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\MasterService;
use App\Services\PendaftaranService;
use App\Services\TrxPendaftaranService;

class PdfController extends Controller
{
    //
    public function __construct()
    {
        $this->MasterService = new MasterService;
        $this->UserService = new UserService;
        $this->PendaftaranService = new PendaftaranService;
        $this->TrxPendaftaranService = new TrxPendaftaranService;
    }

    public function indexlaporanuser(Request $request)
    {
        return view('user.laporan');
    }

    public function indexlaporanadmin(Request $request)
    {
        return view('admin.laporan');
    }

    public function indexjenispdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataJenis();
        $pdf = PDF::loadview('pdf.master.jenis.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('jenis.pdf');
    }

    public function indexmerkpdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataMerk();
        $pdf = PDF::loadview('pdf.master.merk.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('merk.pdf');
    }

    public function indextypepdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataType();
        $pdf = PDF::loadview('pdf.master.type.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('type.pdf');
    }

    public function indexhargapdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataType();
        $pdf = PDF::loadview('pdf.master.harga.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('harga.pdf');
    }

    public function indexdealerpdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataDealer();
        $pdf = PDF::loadview('pdf.master.dealer.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('dealer.pdf');
    }




    public function indexbiodatapdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataBiodata();
        $pdf = PDF::loadview('pdf.master.biodata.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('type.pdf');
    }

    public function indexbiodatapdfdetail(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Biodata::where('id', $id)->get();
        $pdf = PDF::loadview('pdf.master.biodata.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('jenis.pdf');
    }

    public function indexpegawaipdf(Request $request)
    {
        $data['data'] = $this->MasterService->getDataPegawai();
        $pdf = PDF::loadview('pdf.master.pegawai.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('type.pdf');
    }

    public function indexpegawaipdfdetail(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pegawai::where('id', $id)->get();
        $pdf = PDF::loadview('pdf.master.pegawai.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('jenis.pdf');
    }

    public function indexuserpdf(Request $request)
    {
        $data['data'] = $this->UserService->getDataUser();
        $pdf = PDF::loadview('pdf.user.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('user.pdf');
    }

    public function indexuserpdfdetail(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Biodata::where('id', $id)->get();
        $data['user'] = User::where('biodata_id', $id)->get();
        $pdf = PDF::loadview('pdf.user.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('user.pdf');
    }



    public function indextrxpendaftaranpdf(Request $request)
    {
        $data['data'] = $this->TrxPendaftaranService->getDataTrxPendaftaran();
        // dd($data['data']);
        $pdf = PDF::loadview('pdf.trxpendaftaran.pendaftaran.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }

    public function indextrxpendaftaranpdfdetail(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran::with('dealer')->with('merk')->with('type')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.trxpendaftaran.pendaftaran.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }

    public function indextrxpendaftaranpdfselesai(Request $request)
    {
        $data['data'] = $this->TrxPendaftaranService->getDataTrxPendaftaranSelesai();
        // dd($data['data']);
        $pdf = PDF::loadview('pdf.trxpendaftaran.selesai.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }

    public function indextrxpendaftaranpdfkwitansi(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran::with('dealer')->with('merk')->with('type')->where('id', $id)->get();
        $data['data2'] = Pendaftaran::with('dealer')->with('merk')->with('type')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.trxpendaftaran.pendaftaran.kwitansi', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }

    public function indexpendaftaranpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->PendaftaranService->getDataPendaftaran(user_id: $user_id);
        $pdf = PDF::loadview('pdf.pendaftaran.pendaftaran.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }

    public function indexpendaftaranpdfdetail(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran::with('dealer')->with('merk')->with('type')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.pendaftaran.pendaftaran.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }

    public function indexpendaftaranpdfkwitansi(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran::with('dealer')->with('merk')->with('type')->where('id', $id)->get();
        $data['data2'] = Pendaftaran::with('dealer')->with('merk')->with('type')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.pendaftaran.pendaftaran.kwitansi', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('pendaftaran.pdf');
    }
}
