<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Position;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::with('position');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%");
        }

        $teachers = $query->paginate(15);
        return view('admin.teachers.index', ['teachers' => $teachers]);
    }

    public function create()
    {
        $positions = Position::all();
        $majors = Major::all();
        return view('admin.teachers.create', ['positions' => $positions, 'majors' => $majors]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'nip' => 'required|string|max:255|unique:teachers,nip',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'teacher_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'position_id' => 'required|exists:positions,id',
            'lessons' => 'nullable|string',
            'social_media' => 'nullable|string',
        ], [
            'name.required' => 'Nama guru wajib diisi.',
            'name.string' => 'Nama guru harus berupa teks.',
            'name.max' => 'Nama guru maksimal 255 karakter.',

            'major_id.required' => 'Jurusan wajib dipilih.',
            'major_id.exists' => 'Jurusan yang dipilih tidak valid.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.string' => 'NIP harus berupa teks.',
            'nip.max' => 'NIP maksimal 255 karakter.',
            'nip.unique' => 'NIP sudah terdaftar.',

            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',

            'teacher_picture.image' => 'File harus berupa gambar.',
            'teacher_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'teacher_picture.max' => 'Ukuran gambar maksimal 2 MB.',

            'position_id.required' => 'Jabatan wajib dipilih.',
            'position_id.exists' => 'Jabatan yang dipilih tidak valid.',

            'lessons.string' => 'Mata pelajaran harus berupa teks.',

            'social_media.string' => 'Media sosial harus berupa teks.',
        ]);

        if ($request->hasFile('teacher_picture')) {
            $file = $request->file('teacher_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('teachers', $filename, 'public');
            $validated['teacher_picture'] = $filename;
        }

        Teacher::create($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function show(Teacher $teacher)
    {
        $teacher->load('position');
        return view('admin.teachers.show', ['teacher' => $teacher]);
    }

    public function edit(Teacher $teacher)
    {
        $positions = Position::all();
        $majors = Major::all();
        $teacher->load('position');
        return view('admin.teachers.edit', ['teacher' => $teacher, 'positions' => $positions, 'majors' => $majors]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'nip' => 'required|string|max:255|unique:teachers,nip,' . $teacher->id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'teacher_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'position_id' => 'required|exists:positions,id',
            'lessons' => 'nullable|string',
            'social_media' => 'nullable|string',
        ]);

        if ($request->hasFile('teacher_picture')) {
            if ($teacher->teacher_picture) {
                Storage::disk('public')->delete('teachers/' . $teacher->teacher_picture);
            }
            $file = $request->file('teacher_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('teachers', $filename, 'public');
            $validated['teacher_picture'] = $filename;
        }

        $teacher->update($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil diperbarui');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->teacher_picture) {
            Storage::disk('public')->delete('teachers/' . $teacher->teacher_picture);
        }
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil dihapus');
    }
}
