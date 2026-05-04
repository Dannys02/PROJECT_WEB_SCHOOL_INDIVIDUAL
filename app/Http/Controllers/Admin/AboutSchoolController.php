<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSchoolController extends Controller
{
    public function index()
    {
        $aboutSchools = AboutSchool::all();
        return view('admin.about-school.index', ['aboutSchools' => $aboutSchools]);
    }

    public function create()
    {
        return view('admin.about-school.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_name' => 'required|string|max:255',
            'logo_school' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_school' => 'required|string',
        ]);

        if ($request->hasFile('logo_school')) {
            $file = $request->file('logo_school');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('logos', $filename, 'public');
            $validated['logo_school'] = $filename;
        }

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
            'school_name' => 'required|string|max:255',
            'logo_school' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_school' => 'required|string',
        ]);

        if ($request->hasFile('logo_school')) {
            if ($aboutSchool->logo_school) {
                Storage::disk('public')->delete('logos/' . $aboutSchool->logo_school);
            }
            $file = $request->file('logo_school');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('logos', $filename, 'public');
            $validated['logo_school'] = $filename;
        }

        $aboutSchool->update($validated);
        return redirect()->route('admin.about-school.index')->with('success', 'Informasi sekolah berhasil diperbarui');
    }

    public function destroy(AboutSchool $aboutSchool)
    {
        if ($aboutSchool->logo_school) {
            Storage::disk('public')->delete('logos/' . $aboutSchool->logo_school);
        }
        $aboutSchool->delete();
        return redirect()->route('admin.about-school.index')->with('success', 'Informasi sekolah berhasil dihapus');
    }
}
