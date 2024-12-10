<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        return response()->json(Dosen::all());
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nidn_dosen' => 'required|unique:dosens|max:15',
            'nama_dosen' => 'required|string|max:255',
            'matakuliah_dosen' => 'required|string|max:255',
        ]);

        $dosen = Dosen::create($validatedData);
        return response()->json(['message' => 'Dosen created successfully', 'data' => $dosen], 201);
    }

    public function read($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        return response()->json($dosen);
    }

    public function all()
    {
        $dosen = Dosen::all();
        if (!$dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        return response()->json($dosen);
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        $validatedData = $request->validate([
            'nidn_dosen' => 'sometimes|unique:dosens,nidn,' . $id,
            'nama_dosen' => 'sometimes|string|max:255',
            'matakuliah_dosen' => 'sometimes|string|max:255',
        ]);

        $dosen->update($validatedData);
        return response()->json(['message' => 'Dosen updated successfully', 'data' => $dosen]);
    }

    public function delete($id)
    {
        $dosen = Dosen::find($id);
        if (!$dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        $dosen->delete();
        return response()->json(['message' => 'Dosen deleted successfully']);
    }
}
