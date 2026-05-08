<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'nip' => 'required|string|max:255|unique:teachers,nip,' . $this->teacher?->id,
            'gender' => 'required|in:Laki-laki,Perempuan',
            'address' => 'required|string',
            'teacher_picture' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'position_id' => 'required|exists:positions,id',
            'lessons' => 'nullable|string',
            'social_media' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
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
        ];
    }
}
