<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('nisn', 'like', "%{$search}%");
        }

        $students = $query->paginate(15);
        return view('admin.students.index', ['students' => $students]);
    }

    public function create()
    {
        $majors = Major::all();
        return view('admin.students.create', ['majors' => $majors]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'nisn' => 'required|string|max:255|unique:students,nisn',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'student_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'social_media' => 'nullable|string',
        ]);

        if ($request->hasFile('student_picture')) {
            $file = $request->file('student_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('students', $filename, 'public');
            $validated['student_picture'] = $filename;
        }

        Student::create($validated);
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', ['student' => $student]);
    }

    public function edit(Student $student)
    {
        $majors = Major::all();
        return view('admin.students.edit', ['student' => $student, 'majors' => $majors]);
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'nisn' => 'required|string|max:255|unique:students,nisn,' . $student->id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'student_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'social_media' => 'nullable|string',
        ]);

        if ($request->hasFile('student_picture')) {
            if ($student->student_picture) {
                Storage::disk('public')->delete('students/' . $student->student_picture);
            }
            $file = $request->file('student_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('students', $filename, 'public');
            $validated['student_picture'] = $filename;
        }

        $student->update($validated);
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy(Student $student)
    {
        if ($student->student_picture) {
            Storage::disk('public')->delete('students/' . $student->student_picture);
        }
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Siswa berhasil dihapus');
    }
}
