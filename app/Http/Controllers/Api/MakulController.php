<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    public function index()
    {
        return response()->json(Makul::all());
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'kode_mata_kuliah' => 'required|unique:makuls|max:15',
            'nama_mata_kuliah' => 'required|string|max:255',
            'sks_mata_kuliah' => 'required|integer|min:1|max:6',
        ]);

        $makul = Makul::create($validatedData);
        return response()->json(['message' => 'Makul created successfully', 'data' => $makul], 201);
    }

    public function read($id)
    {
        $makul = Makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'Makul not found'], 404);
        }
        return response()->json($makul);
    }

    public function all()
    {
        $makul = Makul::all();
        if (!$makul) {
            return response()->json(['message' => 'Makul not found'], 404);
        }
        return response()->json($makul);
    }

    public function update(Request $request, $id)
    {
        $makul = Makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'Makul not found'], 404);
        }

        $validatedData = $request->validate([
            'kode_mata_kuliah' => 'sometimes|unique:makuls,kode,' . $id,
            'nama_mata_kuliah' => 'sometimes|string|max:255',
            'sks_mata_kuliah' => 'sometimes|integer|min:1|max:6',
        ]);

        $makul->update($validatedData);
        return response()->json(['message' => 'Makul updated successfully', 'data' => $makul]);
    }

    public function delete($id)
    {
        $makul = Makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'Makul not found'], 404);
        }

        $makul->delete();
        return response()->json(['message' => 'Makul deleted successfully']);
    }
}
