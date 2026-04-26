<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index(Request $request)
    {
        $query = Major::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_jurusan', 'like', "%{$search}%");
        }

        $majors = $query->paginate(15);
        return view('admin.majors.index', ['majors' => $majors]);
    }

    public function create()
    {
        return view('admin.majors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:majors',
            'logo_jurusan' => 'nullable|string',
            'tentang_jurusan' => 'required|string',
        ]);

        Major::create($validated);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function show(Major $major)
    {
        return view('admin.majors.show', ['major' => $major]);
    }

    public function edit(Major $major)
    {
        return view('admin.majors.edit', ['major' => $major]);
    }

    public function update(Request $request, Major $major)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:majors,nama_jurusan,' . $major->id,
            'logo_jurusan' => 'nullable|string',
            'tentang_jurusan' => 'required|string',
        ]);

        $major->update($validated);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil diperbarui');
    }

    public function destroy(Major $major)
    {
        $major->delete();
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
