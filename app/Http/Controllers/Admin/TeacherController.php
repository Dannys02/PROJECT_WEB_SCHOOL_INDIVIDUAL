<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Position;
use App\Models\Major;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
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

    public function store(TeacherRequest $request)
    {
        $validated = $request->validated();

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

    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $validated = $request->validated();

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
