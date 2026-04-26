<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $query = Position::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_jabatan', 'like', "%{$search}%");
        }

        $positions = $query->paginate(15);
        return view('admin.positions.index', ['positions' => $positions]);
    }

    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:255|unique:positions',
            'tentang_jabatan' => 'required|string',
        ]);

        Position::create($validated);
        return redirect()->route('admin.positions.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    public function show(Position $position)
    {
        return view('admin.positions.show', ['position' => $position]);
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit', ['position' => $position]);
    }

    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:255|unique:positions,nama_jabatan,' . $position->id,
            'tentang_jabatan' => 'required|string',
        ]);

        $position->update($validated);
        return redirect()->route('admin.positions.index')->with('success', 'Jabatan berhasil diperbarui');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('admin.positions.index')->with('success', 'Jabatan berhasil dihapus');
    }
}
