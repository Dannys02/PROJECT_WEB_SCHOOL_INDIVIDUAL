<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Position;
use Illuminate\Http\Request;
use Illumintae\Support\Facades\File;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::with('jabatan');

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
        return view('admin.teachers.create', ['positions' => $positions]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:teachers,nip',
            'gender' => 'required|enum:Laki-laki,Perempuan',
            'address' => 'required|string',
            'teacher_picture' => 'nullable|string',
            'position_id' => 'required|exists:positions,id',
            'lesson' => 'nullable|string',
            'social_media' => 'nullable|string',
        ]);

        Teacher::create($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function show(Teacher $teacher)
    {
        $teacher->load('jabatan');
        return view('admin.teachers.show', ['teacher' => $teacher]);
    }

    public function edit(Teacher $teacher)
    {
        $positions = Position::all();
        return view('admin.teachers.edit', ['teacher' => $teacher, 'positions' => $positions]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:teachers,nip,',
            'gender' => 'required|enum:Laki-laki,Perempuan',
            'address' => 'required|string',
            'teacher_picture' => 'nullable|string',
            'position_id' => 'required|exists:positions,id',
        ]);

        $teacher->update($validated);
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil diperbarui');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Guru berhasil dihapus');
    }
}
