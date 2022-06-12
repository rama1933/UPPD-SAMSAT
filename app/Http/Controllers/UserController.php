<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->service = new UserService;
    }

    public function indexuser()
    {
        return view('admin.user.index');
    }

    public function data(Request $request)
    {
        $data = $this->service->getDataUser();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('button', function ($data) use ($request) {
                return '<ul class="nav nav-pills nav-primary">
                                        <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-edit"></i></button>
                                        <button onclick="deletebtn(' . $data->id . ',' . $data->biodata_id . ')" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-trash"></i></button>
                                    </ul>';
            })
            ->rawColumns(['button'])
            ->make(true);
    }

    public function showdata(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataUser($id);
        return response()->json(
            [
                'id' => $data->id,
                'biodata_id' => $data->biodata_id,
                'username' => $data->username,
                'name' => $data->name,
            ]
        );
    }

    public function deletedata(Request $request)
    {
        $id = $request->id;
        $data = $this->service->deleteDataUser($id);
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

    public function storeuser(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required|unique:users,username',
            'password' => 'required',
        ]);

        $validator_bio = Validator::make(request()->all(), [
            'nik' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } elseif ($validator_bio->fails()) {
            return response()->json([
                "status" => "required",
                "message" => $validator_bio->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeUser($request->all());
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

    public function updateuser(Request $request)
    {
        $id = $request->id;
        $validator = Validator::make(request()->all(), [
            'username' => 'required|unique:users,username,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateUser($id, $request->all());
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

    public function filterdata(Request $request)
    {
        $nik = $request->nik;
        $data = $this->service->getDataBiodata($nik);
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
                    'nama' => $data->nama,
                    'no_hp' => $data->no_hp,
                    'alamat' => $data->alamat,
                    'tanggal_lahir' => $data->tanggal_lahir,
                    'tempat_lahir' => $data->tempat_lahir,
                ]
            );
        }
    }
}
