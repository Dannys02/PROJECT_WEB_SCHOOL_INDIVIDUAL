<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MajorController extends Controller
{
    public function index(Request $request)
    {
        $query = Major::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('major_name', 'like', "%{$search}%");
        }

        $majors = $query->paginate(15);
        return view('admin.majors.index', ['majors' => $majors]);
    }

    public function create()
    {
        // $students = Student::all();
        // $teachers = Teacher::all();
        return view('admin.majors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'major_name' => 'required|string|max:255|unique:majors',
            'major_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'major_about' => 'required|string',
            // 'class' => 'required|in:X,XI,XII',
            // 'student_id' => 'required|exists:students,id',
            // 'teacher_id' => 'required|exists:teachers,id',
        ], [
            'major_name.required' => 'Nama jurusan wajib diisi.',
            'major_name.string' => 'Nama jurusan harus berupa teks.',
            'major_name.max' => 'Nama jurusan maksimal 255 karakter.',
            'major_name.unique' => 'Nama jurusan sudah digunakan.',

            'major_logo.image' => 'Logo jurusan harus berupa gambar.',
            'major_logo.mimes' => 'Format logo harus jpeg, png, jpg, atau gif.',
            'major_logo.max' => 'Ukuran logo maksimal 2 MB.',

            'major_about.required' => 'Deskripsi jurusan wajib diisi.',
            'major_about.string' => 'Deskripsi jurusan harus berupa teks.',
        ]);

        if ($request->hasFile('major_logo')) {
            $file = $request->file('major_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('majors', $filename, 'public');
            $validated['major_logo'] = $filename;
        }

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
            'major_name' => 'required|string|max:255|unique:majors,major_name,' . $major->id,
            'major_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'major_about' => 'required|string',
            // 'class' => 'required|in:X,XI,XII',
            // 'student_id' => 'required|exists:students,id',
            // 'teacher_id' => 'required|exists:teachers,id',
        ], [
            'major_name.required' => 'Nama jurusan wajib diisi.',
            'major_name.string' => 'Nama jurusan harus berupa teks.',
            'major_name.max' => 'Nama jurusan maksimal 255 karakter.',
            'major_name.unique' => 'Nama jurusan sudah digunakan.',

            'major_logo.image' => 'Logo jurusan harus berupa gambar.',
            'major_logo.mimes' => 'Format logo harus jpeg, png, jpg, atau gif.',
            'major_logo.max' => 'Ukuran logo maksimal 2 MB.',

            'major_about.required' => 'Deskripsi jurusan wajib diisi.',
            'major_about.string' => 'Deskripsi jurusan harus berupa teks.',
        ]);

        if ($request->hasFile('major_logo')) {
            if ($major->major_logo) {
                Storage::disk('public')->delete('majors/' . $major->major_logo);
            }
            $file = $request->file('major_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('majors', $filename, 'public');
            $validated['major_logo'] = $filename;
        }

        $major->update($validated);
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil diperbarui');
    }

    public function destroy(Major $major)
    {
        if ($major->major_logo) {
            Storage::disk('public')->delete('majors/' . $major->major_logo);
        }
        $major->delete();
        return redirect()->route('admin.majors.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
