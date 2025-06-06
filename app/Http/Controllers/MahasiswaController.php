<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    /**
     * Nampilin semua data mahasiswa beserta info prodi.
     * Endpoint: GET /mahasiswa dan Perlu Autentikasi
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return response()->json($mahasiswas, 200);
    }

    /**
     * Memfilter mahasiswa berdasarkan prodi tertentu.
     * Endpoint: GET /mahasiswa/prodi/{id} dan Perlu Autentikasi
     *
     * @param  int  $prodi_id ID dari prodi yang akan difilter.
     * @return \Illuminate\Http\JsonResponse
     */
    public function filterByProdi($prodi_id)
    {
        $mahasiswas = Mahasiswa::with('prodi')->where('prodi_id', $prodi_id)->get();

        if ($mahasiswas->isEmpty()) {
            return response()->json(['message' => 'Tidak ada mahasiswa ditemukan untuk ID prodi ini.'], 404);
        }
        return response()->json($mahasiswas, 200);
    }
}