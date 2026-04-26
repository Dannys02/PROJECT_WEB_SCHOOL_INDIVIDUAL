<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Position;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $query = Teacher::with('jabatan');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_guru', 'like', "%{$search}%")
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
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:teachers',
            'jenis_kelamin_guru' => 'required|string',
            'alamat' => 'required|string',
            'foto_guru' => 'nullable|string',
            'jabatan_id' => 'nullable|exists:positions,id',
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
            'nama_guru' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:teachers,nip,' . $teacher->id,
            'jenis_kelamin_guru' => 'required|string',
            'alamat' => 'required|string',
            'foto_guru' => 'nullable|string',
            'jabatan_id' => 'nullable|exists:positions,id',
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
