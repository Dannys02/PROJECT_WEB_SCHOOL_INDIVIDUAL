@extends('layouts.app')

@section('title', 'Tambah Info Sekolah')
@section('page_title', 'Tambah Informasi Sekolah')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.about-school.index') }}"
            class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <h2 class="text-2xl font-bold text-white mb-6">Tambah Informasi Sekolah Baru</h2>

        <form method="POST" action="{{ route('admin.about-school.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama Sekolah -->
            <div>
                <label for="school_name" class="block text-sm font-semibold text-purple-200 mb-2">Nama Sekolah</label>
                <input type="text" id="school_name" name="school_name" value="{{ old('school_name') }}"
                    placeholder="Masukkan nama sekolah" class="form-input-cosmic w-full px-4 py-3 rounded-lg" required>
                @error('school_name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Logo Sekolah -->
            <div>
                <label for="logo_school" class="block text-sm font-semibold text-purple-200 mb-2">Logo
                    Sekolah</label>
                <input type="file" id="logo_school" name="logo_school" value="{{ old('logo_school') }}"
                    class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                @error('logo_school')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tentang Sekolah Detail -->
            <div>
                <label for="about_school" class="block text-sm font-semibold text-purple-200 mb-2">Deskripsi
                    Lengkap Sekolah</label>
                <textarea id="about_school" name="about_school" rows="8"
                    placeholder="Deskripsi lengkap tentang sekolah, visi, misi, dll"
                    class="form-input-cosmic w-full px-4 py-3 rounded-lg" required>{{ old('about_school') }}</textarea>
                @error('about_school')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <div class="flex gap-4">
                <button type="submit"
                    class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Informasi
                </button>
                <a href="{{ route('admin.about-school.index') }}"
                    class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection
