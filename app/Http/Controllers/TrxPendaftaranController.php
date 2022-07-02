<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxPendaftaran;
use App\Services\MasterService;
use Illuminate\Support\Facades\Auth;
use App\Services\TrxPendaftaranService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TrxPendaftaranController extends Controller
{

    public function __construct()
    {
        $this->service = new TrxPendaftaranService();
        $this->serviceMaster = new MasterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexpendaftaranadmin()
    {
        $data['dealer'] = $this->serviceMaster->getDataDealer();
        $data['merk'] = $this->serviceMaster->getDataMerk();
        $data['tipe'] = $this->serviceMaster->getDataType();

        return view('admin.pendaftaran.pendaftaran.index', $data);
    }

    public function indexpendaftaranadminselesai()
    {
        $data['dealer'] = $this->serviceMaster->getDataDealer();
        $data['merk'] = $this->serviceMaster->getDataMerk();
        $data['tipe'] = $this->serviceMaster->getDataType();

        return view('admin.pendaftaran.selesai.index', $data);
    }

    public function indexadminkwitansi()
    {
        $data['dealer'] = $this->serviceMaster->getDataDealer();
        $data['merk'] = $this->serviceMaster->getDataMerk();
        $data['tipe'] = $this->serviceMaster->getDataType();
        return view('admin.pendaftaran.kwitansi.index', $data);
    }

    public function data(Request $request)
    {

        if ($request->type == 'selesai') {
            $data = $this->service->getDataTrxPendaftaranSelesai();
        } else {
            $data = $this->service->getDataTrxPendaftaran();
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nik', function ($data) use ($request) {
                return $data->biodata->nik;
            })
            ->addColumn('nama', function ($data) use ($request) {
                return $data->biodata->nama;
            })
            ->addColumn('dealer', function ($data) use ($request) {
                return $data->dealer->nama;
            })
            ->addColumn('merk', function ($data) use ($request) {
                return $data->merk->nama;
            })
            ->addColumn('type', function ($data) use ($request) {
                $type = $data->type->type . '/' . $data->type->jenis;
                return $type;
            })
            ->addColumn('harga', function ($data) use ($request) {
                return $data->type->harga;
            })
            ->addColumn('warna', function ($data) use ($request) {
                return $data->warna;
            })
            ->addColumn('tahun', function ($data) use ($request) {
                return $data->tahun;
            })
            ->addColumn('tanggal', function ($data) use ($request) {
                $time = strtotime($data->tanggal);
                $tanggal = date('d-m-Y', $time);
                return $tanggal;
            })
            ->addColumn('nopol', function ($data) use ($request) {
                $cek = $data->pendaftarans->nopol;
                $nopol = null;
                if (is_null($cek)) {
                    $nopol = 'belum diverifikasi';
                } elseif ($cek == '') {
                    $nopol = 'belum diverifikasi';
                } else {
                    $nopol = $data->pendaftarans->nopol;
                }

                return $nopol;
            })
            ->addColumn('tgl_stnk', function ($data) use ($request) {
                $cek = $data->pendaftarans->tgl_stnk;
                $tgl_stnk = null;
                if (is_null($cek)) {
                    $tgl_stnk = 'belum diverifikasi';
                } elseif ($cek == '') {
                    $nopol = 'belum diverifikasi';
                } else {
                    $time = strtotime($data->pendaftarans->tgl_stnk);
                    $tanggal = date('d-m-Y', $time);
                    $tgl_stnk = $tanggal;
                }

                return $tgl_stnk;
            })
            ->addColumn('tgl_pajak', function ($data) use ($request) {
                $cek = $data->pendaftarans->tgl_pajak;
                $tgl_pajak = null;
                if (is_null($cek)) {
                    $tgl_pajak = 'belum diverifikasi';
                } elseif ($cek == '') {
                    $nopol = 'belum diverifikasi';
                } else {
                    $time = strtotime($data->pendaftarans->tgl_pajak);
                    $tanggal = date('d-m-Y', $time);
                    $tgl_pajak = $tanggal;
                }

                return $tgl_pajak;
            })
            ->addColumn('button', function ($data) use ($request) {
                if ($request->type == 'selesai') {
                    return '
                 <a href="/admin/pdf/trxpendaftaran/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>

                                   ';
                } else {
                    return '
                     <a href="/admin/pdf/trxpendaftaran/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                 <button onclick="edit(' . $data->pendaftarans->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-1"><i class="nc-icon nc-ruler-pencil"></i></button>
                                   ';
                }
            })
            ->addColumn('kwitansi', function ($data) use ($request) {
                if ($request->type == 'selesai') {
                    $cek = $data->pendaftarans->nopol;
                    if (is_null($cek)) {
                        return 'belum diverifikasi';
                    } elseif ($cek == '') {
                        return 'belum diverifikasi';
                    } else {
                        return '
                 <a href="/admin/pdf/trxpendaftaran/kwitansi/' . $data->id . '"  class="btn btn-sm btn-flat btn-success" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"> </i> Cetak</a>
                                   ';
                    }
                }
            })
            ->rawColumns(['button', 'jenis', 'type', 'merk', 'nik', 'warna', 'tahun', 'harga', 'tanggal', 'kwitansi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrxPendaftaran  $trxPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function showdata(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataTrxPendaftaran($id);
        return response()->json(
            [
                'id' => $data->id,
                'nopol' => $data->nopol,
                'tgl_stnk' => $data->tgl_stnk,
                'tgl_pajak' => $data->tgl_pajak,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrxPendaftaran  $trxPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function updatependaftaran(Request $request)
    {
        // dd(request()->all());
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nopol' => 'required|unique:trx_pendaftaran,nopol,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updatePendaftaran($id, $request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil memperbaharui Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal memperbaharui Data",
                ]);
            }
        }
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrxPendaftaran  $trxPendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrxPendaftaran $trxPendaftaran)
    {
        //
    }
}
