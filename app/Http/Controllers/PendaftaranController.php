<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Services\MasterService;
use App\Services\PendaftaranService;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePendaftaranRequest;
use App\Http\Requests\UpdatePendaftaranRequest;

class PendaftaranController extends Controller
{

    public function __construct()
    {
        $this->service = new PendaftaranService;
        $this->serviceMaster = new MasterService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexpendaftaran()
    {
        $data['dealer'] = $this->serviceMaster->getDataDealer();
        $data['tipe'] = $this->serviceMaster->getDataType();
        return view('user.pendaftaran.pendaftaran.index', $data);
    }

    public function indexkwitansi()
    {
        $data['dealer'] = $this->serviceMaster->getDataDealer();
        $data['tipe'] = $this->serviceMaster->getDataType();
        return view('user.pendaftaran.kwitansi.index', $data);
    }

    public function data(Request $request)
    {
        $user = Auth::user()->hasRole('admin');
        if ($user) {
            $data = $this->service->getDataPendaftaran();
        } else {
            $user_id = auth()->user()->id;
            $data = $this->service->getDataPendaftaran(user_id: $user_id);
        }


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('dealer', function ($data) use ($request) {
                return $data->dealer->nama;
            })
            ->addColumn('type', function ($data) use ($request) {
                $type = $data->type->type . '/' . $data->type->jenis . '/' . $data->type->merk;
                return $type;
            })
            ->addColumn('harga', function ($data) use ($request) {
                return $data->type->harga;
            })
            ->addColumn('button', function ($data) use ($request) {
                return '
                 <a href="/pdf/pendaftaran/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                 <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-1"><i class="fa fa-edit"></i></button>
                <button onclick="deletebtn(' . $data->id . ',' . $data->biodata_id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->addColumn('kwitansi', function ($data) use ($request) {
                return '
                 <a href="/pdf/pendaftaran/kwitansi/' . $data->id . '"  class="btn btn-sm btn-flat btn-success" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"> </i> Cetak</a>
                                   ';
            })
            ->rawColumns(['button', 'jenis', 'type', 'merk', 'harga', 'kwitansi'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePendaftaranRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storependaftaran(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'dealer_id' => 'required',
            'type_id' => 'required',
            'warna' => 'required',
            'tahun' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storePendafataran($request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil Menambahkan Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal Menambahkan Data",
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function showdata(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataPendaftaran($id);
        $datadealer = $this->serviceMaster->getDatadealer($data->dealer_id);
        $dataType = $this->serviceMaster->getDataType($data->type_id);
        $datadealerAll = $this->serviceMaster->getDatadealer();
        $dataTypeAll = $this->serviceMaster->getDataType();
        return response()->json(
            [
                'id' => $data->id,
                'warna' => $data->warna,
                'tahun' => $data->tahun,
                'dealer' => $datadealer,
                'type' => $dataType,
                'dealerall' => $datadealerAll,
                'typeall' => $dataTypeAll,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftaranRequest  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function updatependaftaran(Request $request)
    {
        // dd(request()->all());
        $id = $request->id;
        $validator = Validator::make(request()->all(), []);

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
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function deletedata(Request $request)
    {
        $id = $request->id;
        $data = $this->service->deleteDataPendaftaran($id);
        if ($data == true) {
            return response()->json([
                "status" => "success",
                "messages" => "Berhasil Menghapus Data",
            ]);
        } else {
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal Menghapus Data",
            ]);
        }
    }

    public function hargapendaftaran(Request $request)
    {
        $id = $request->id;
        $data = $this->serviceMaster->getDataType($id);
        if (is_null($data)) {
            return response()->json(
                [
                    "status" => "empty",
                    "messages" => "Data Tidak Ditemukan",
                ]
            );
        } else {
            return response()->json(
                [
                    'harga' => $data->harga,
                ]
            );
        }
    }
}
