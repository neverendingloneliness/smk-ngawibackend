<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index():JsonResponse{
        $announcement = Announcement::all();
        return response()->json([
            'success' => true,
            'message' => 'Get All Announcement',
            'data' => $announcement
        ]);
    }
    public function show(Announcement $announcement):JsonResponse{
        return response()->json([
            'success' => true,
            'message' => 'Get Detail Announcement',
            'data' => $announcement
        ]);

    }

    public function store(Request $request):JsonResponse{
        $valdata = $request->validate([
            'pendaftaran_id' => 'required|exists:pendaftarans,column',
            'tanggal_pengunguman' => now(),
            'hasil_seleksi'
        ]);
        
        return response()->json([

        ]);
    }

    public function update():JsonResponse{

    }

    public function delete():JsonResponse{
        return response()->json([

        ]);
    }
}
