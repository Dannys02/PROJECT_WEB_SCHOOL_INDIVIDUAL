<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'major_id' => 'required|exists:majors,id',
            'class' => 'required|in:X,XI,XII',
            'nisn' => 'required|string|max:255|unique:students,nisn,' . $this->student?->id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'student_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'social_media' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 255 karakter.',

            'major_id.required' => 'Jurusan wajib dipilih.',
            'major_id.exists' => 'Jurusan yang dipilih tidak valid.',

            'class.required' => 'Kelas wajib dipilih.',
            'class.in' => 'Kelas harus X, XI, atau XII.',

            'nisn.required' => 'NISN wajib diisi.',
            'nisn.string' => 'NISN harus berupa teks.',
            'nisn.max' => 'NISN maksimal 255 karakter.',
            'nisn.unique' => 'NISN sudah terdaftar.',

            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',

            'student_picture.image' => 'File harus berupa gambar.',
            'student_picture.mimes' => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'student_picture.max' => 'Ukuran gambar maksimal 2 MB.',

            'social_media.string' => 'Media sosial harus berupa teks.',
        ];
    }
}
