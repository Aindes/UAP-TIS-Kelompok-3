<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MatakuliahController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $matakuliahs = Matakuliah::all();
        return response()->json($matakuliahs, 200);
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matakuliah_id' => 'required|integer|exists:matakuliahs,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        if (!$user instanceof Mahasiswa) {
            return response()->json(['message' => 'Unauthorized or invalid user type.'], 401);
        }

        try {
            $user->matakuliahs()->attach($request->matakuliah_id);

            return response()->json(['message' => 'Mata Kuliah berhasil ditambahkan ke daftar Anda.'], 201);
        } catch (\Exception $e) {

            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                return response()->json(['message' => 'Mata Kuliah ini sudah ada dalam daftar Anda.'], 409);
            }
            return response()->json(['message' => 'Terjadi kesalahan saat menambahkan mata kuliah.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     *
     * @param  int|null  $id 
     * @return \Illuminate\Http\JsonResponse
     */
    public function myCourses($id = null)
    {
        $user = Auth::user();

        if (!$user instanceof Mahasiswa) {
            return response()->json(['message' => 'Unauthorized or invalid user type.'], 401);
        }

        $matakuliahs = $user->matakuliahs;

        return response()->json($matakuliahs, 200);
    }
}