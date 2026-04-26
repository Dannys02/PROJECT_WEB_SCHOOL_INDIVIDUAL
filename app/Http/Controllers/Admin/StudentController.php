<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_siswa', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%");
        }

        $students = $query->paginate(15);
        return view('admin.students.index', ['students' => $students]);
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:students',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'foto_siswa' => 'nullable|string',
        ]);

        Student::create($validated);
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', ['student' => $student]);
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', ['student' => $student]);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|string|max:255|unique:students,nisn,' . $student->id,
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'foto_siswa' => 'nullable|string',
        ]);

        $student->update($validated);
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil dihapus');
    }
}
