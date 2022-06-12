<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MasterService;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->service = new MasterService;
    }

    public function indexjenis()
    {
        return view('admin.master.jenis.index');
    }

    public function indexmerk()
    {
        return view('admin.master.merk.index');
    }

    public function indextype()
    {
        return view('admin.master.type.index');
    }

    public function indexbiodata()
    {
        return view('admin.master.biodata.index');
    }

    public function data(Request $request)
    {
        switch ($request->type) {
            case 'jenis':
                $data = $this->service->getDataJenis();
                break;
            case 'merk':
                $data = $this->service->getDataMerk();
                break;
            case 'tipe':
                $data = $this->service->getDataType();
                break;
            case 'biodata':
                $data = $this->service->getDataBiodata();
                break;
            default:
                $data = collect();
                break;
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('ttl', function ($data) {
                $time = strtotime($data->tanggal_lahir);
                $tanggal = date('d-m-Y', $time);
                return $data->tempat_lahir . ' , ' . $tanggal;
            })
            ->addColumn('button', function ($data) use ($request) {
                if ($request->type == 'biodata') {
                    return '
                                        <a href="/admin/pdf/master/biodata/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                                        <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-2"><i class="fa fa-pencil"></i></button>
                                        <button onclick="show(' . $data->id . ')" data-toggle="modal" data-target="#modal-show" class="btn btn-sm btn-flat btn-success my-2"><i class="fa fa-eye"></i></button>
                                        <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-2"><i class="fa fa-trash"></i></button>
                                    ';
                } else {
                    return '<ul class="nav nav-pills nav-primary">
                                        <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-edit"></i></button>
                                        <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></button>
                                    </ul>';
                }
            })
            ->rawColumns(['ttl', 'button'])
            ->make(true);
    }

    public function showdata(Request $request)
    {
        $id = $request->id;
        switch ($request->type) {
            case 'jenis':
                $data = $this->service->getDataJenis($id);
                break;
            case 'merk':
                $data = $this->service->getDataMerk($id);
                break;
            case 'tipe':
                $data = $this->service->getDataType($id);
                break;
            case 'biodata':
                $data = $this->service->getDataBiodata($id);
                break;
            default:
                $data = collect();
                break;
        }
        if ($request->type == 'biodata') {
            return response()->json(
                [
                    'id' => $data->id,
                    'nama' => $data->nama,
                    'nik' => $data->nik,
                    'no_hp' => $data->no_hp,
                    'alamat' => $data->alamat,
                    'ttl' => $data->tempat_lahir . ', ' . $data->tanggal_lahir,
                    'tempat_lahir' => $data->tempat_lahir,
                    'tanggal_lahir' => $data->tanggal_lahir,
                ]
            );
        } else {
            return response()->json(
                [
                    'id' => $data->id,
                    'nama' => $data->nama,
                ]
            );
        }
    }

    public function deletedata(Request $request)
    {
        $id = $request->id;
        switch ($request->type) {
            case 'jenis':
                $data = $this->service->deleteDataJenis($id);
                break;
            case 'merk':
                $data = $this->service->deleteDataMerk($id);
                break;
            case 'tipe':
                $data = $this->service->deleteDataType($id);
                break;
            case 'biodata':
                $data = $this->service->deleteDataBiodata($id);
                break;
            default:
                $data = collect();
                break;
        }
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

    public function storejenis(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_jenis,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeJenis($request->all());
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

    public function storemerk(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_merk,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeMerk($request->all());
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

    public function storetype(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_type,nama',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeType($request->all());
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

    public function storebiodata(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nik' => 'required|unique:tbl_biodata,nik',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeBiodata($request->all());
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

    public function updatejenis(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_jenis,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateJenis($id, $request->all());
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

    public function updatemerk(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_merk,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateMerk($id, $request->all());
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

    public function updatetype(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nama' => 'required|unique:tbl_master_type,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateType($id, $request->all());
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

    public function updatebiodata(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'nik' => 'required|unique:tbl_biodata,nik,' . $id,
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateBiodata($id, $request->all());
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
}
