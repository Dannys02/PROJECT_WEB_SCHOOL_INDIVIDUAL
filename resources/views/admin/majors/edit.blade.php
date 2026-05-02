@extends('layouts.app')

@section('title', 'Edit Jurusan')
@section('page_title', 'Edit Data Jurusan')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.majors.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Jurusan: {{ $major->major_name ?? 'N/A' }}</h2>

            <form method="POST" action="{{ route('admin.majors.update', $major->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Jurusan -->
                <div>
                    <label for="major_name" class="block text-sm font-semibold text-purple-200 mb-2">Nama Jurusan</label>
                    <input
                        type="text"
                        id="major_name"
                        name="major_name"
                        value="{{ old('major_name', $major->major_name ?? '') }}"
                        placeholder="Contoh: Teknik Informatika"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >
                    @error('major_name')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Logo Jurusan -->
                <div>
                    <label for="major_logo" class="block text-sm font-semibold text-purple-200 mb-2">Logo Jurusan</label>
                    <input
                        type="file"
                        id="major_logo"
                        name="major_logo"
                        value="{{ old('major_logo', $major->major_logo ?? '') }}"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                    >
                    @error('major_logo')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tentang Jurusan -->
                <div>
                    <label for="major_about" class="block text-sm font-semibold text-purple-200 mb-2">Tentang Jurusan</label>
                    <textarea
                        id="major_about"
                        name="major_about"
                        rows="6"
                        placeholder="Deskripsi lengkap jurusan"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >{{ old('major_about', $major->major_about ?? '') }}</textarea>
                    @error('major_about')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit" class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Jurusan
                    </button>
                    <a href="{{ route('admin.majors.index') }}" class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
