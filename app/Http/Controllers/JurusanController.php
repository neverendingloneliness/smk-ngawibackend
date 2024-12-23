<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class JurusanController extends Controller
{
    public function index():JsonResponse{
        $jurusan = Jurusan::all();
        return response()->json([
            'success' => true,
            'message' => 'Get All Jurusan',
            'data' => $jurusan
        ]);
    }

    public function show(Jurusan $jurusan):JsonResponse{
        return response()->json([
            'success' => 'Get Detail Jurusan',
            'data' => $jurusan
        ]);
    }

    public function store(Request $request):JsonResponse{
        $valdata = $request->validate([
            'nama_jurusan' => 'required',
            'deskripsi_jurusan' => 'required'
        ]);

        $valdata['id'] = Str::slug($valdata['nama_jurusan']);
        $jurusan = Jurusan::create(($valdata));

        return response()->json([
            'success' => true,
            'message' => 'Jurusan Created Successfully',
            'data' => $jurusan
        ]);

    }

    public function update(Request $request, Jurusan $jurusan):JsonResponse{
        $valdata = $request->validate([
               'nama_jurusan' => 'sometimes|required',
               'deskripsi_jurusan' => 'sometimes|required'
        ]);

        if (isset($valdata['nama_jurusan'])) {
            $valdata['id'] = Str::slug($valdata['nama_jurusan']);
        }

        $jurusan->update($valdata);

        return response()->json([
            'success' => true,
            'message' => 'Jurusan Updated Successfully',
            'data' => $jurusan
        ]);
    }

    public function delete(Jurusan $jurusan):JsonResponse{
        $jurusan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jurusan Deleted Successfully',
            'data' => $jurusan
        ]);
    }
}
