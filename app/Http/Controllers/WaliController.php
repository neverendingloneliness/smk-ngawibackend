<?php

namespace App\Http\Controllers;

use App\Models\Wali;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    public function index():JsonResponse{
        $wali = Wali::all();
        return response()->json([
            'success' => true,
            'message' => 'Get All Wali',
            'data' => $wali
        ]);
    }
    public function show(Wali $wali):JsonResponse{
        return response()->json([
            'success' => true,
            'message' => 'Get Detail Wali',
            'data' => $wali
        ]);
    }

    public function store(Request $request):JsonResponse{
        $valdata = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_wali' => 'required',
            'nomor_tepon_wali' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required'

            
        ]);

        $wali = Wali::create($valdata);

        return response()->json([
            'success' => true,
            'message' => 'Wali Created Successfully',
            'data' => $wali
        ]);
    }

    public function update(Request $request, Wali $wali):JsonResponse{

        $valdata = $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_wali' => 'required',
            'nomor_tepon_wali' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required'
        ]);

        $wali->update($valdata);
        return response()->json([
            'success' => true,
            'message' => 'Wali Updated Successfully',
            'data' => $wali
        ]);
    }

    public function delete(Wali $wali):JsonResponse{
        $wali->delete();

        return response()->json([
            'success' => true,
            'message' => 'Wali Deleted Successfully',
            'data' => $wali
        ]);
    }
}
