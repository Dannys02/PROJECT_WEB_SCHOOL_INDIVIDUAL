<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Position;
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
        return view('admin.teachers.create', ['positions' => $positions]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|string|max:255|unique:teachers,nip',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'teacher_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'position_id' => 'required|exists:positions,id',
            'lessons' => 'nullable|string',
            'social_media' => 'nullable|string',
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
        $teacher->load('position');
        return view('admin.teachers.edit', ['teacher' => $teacher, 'positions' => $positions]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
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
