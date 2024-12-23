<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index():JsonResponse{
        $pendaftaran = Pendaftaran::all();

        return response()->json([
            'success' => true,
            'message' => 'Get All Pendaftaran',
            'data' => $pendaftaran
        ]);
    }
    public function show(Pendaftaran $pendaftaran):JsonResponse{
        return response()->json([
            'success' => true,
            'message' => 'Get All Pendaftaran',
            'data' => $pendaftaran
        ]);
    }

    public function store(Request $request):JsonResponse{
        $valdata = $request->validate([
            'user_id' => auth()->id(),
            'wali_id' => auth()->user()->wali_id,
            'jurusan_id' => auth()->user()->jurusan_id ?? null,
            'tanggal_pendaftaran' => now(),
            'status_pendaftaran' => 'dalam proses'
        ]);

        $pendaftaran = Pendaftaran::create($valdata);
        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran Created Successfully',
            'data' => $pendaftaran
        ]);
    }    
    public function delete(Pendaftaran $pendaftaran):JsonResponse{
        
        $pendaftaran->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran Created Successfully',
            'data' => $pendaftaran
        ]);
    }

}
