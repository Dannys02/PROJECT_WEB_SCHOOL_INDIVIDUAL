<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use Illuminate\Http\Request;

class AboutSchoolController extends Controller
{
    public function index()
    {
        $aboutSchools = AboutSchool::paginate(15);
        return view('admin.about-school.index', ['aboutSchools' => $aboutSchools]);
    }

    public function create()
    {
        return view('admin.about-school.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'logo_sekolah' => 'nullable|string',
            'tentang_jurusan' => 'nullable|string',
            'tentang_sekolah' => 'required|string',
        ]);

        AboutSchool::create($validated);
        return redirect()->route('admin.about-school.index')->with('success', 'Informasi sekolah berhasil ditambahkan');
    }

    public function show(AboutSchool $aboutSchool)
    {
        return view('admin.about-school.show', ['aboutSchool' => $aboutSchool]);
    }

    public function edit(AboutSchool $aboutSchool)
    {
        return view('admin.about-school.edit', ['aboutSchool' => $aboutSchool]);
    }

    public function update(Request $request, AboutSchool $aboutSchool)
    {
        $validated = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'logo_sekolah' => 'nullable|string',
            'tentang_jurusan' => 'nullable|string',
            'tentang_sekolah' => 'required|string',
        ]);

        $aboutSchool->update($validated);
        return redirect()->route('admin.about-school.index')->with('success', 'Informasi sekolah berhasil diperbarui');
    }

    public function destroy(AboutSchool $aboutSchool)
    {
        $aboutSchool->delete();
        return redirect()->route('admin.about-school.index')->with('success', 'Informasi sekolah berhasil dihapus');
    }
}
