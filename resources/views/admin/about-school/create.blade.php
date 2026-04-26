@extends('layouts.app')

@section('title', 'Tambah Info Sekolah')
@section('page_title', 'Tambah Informasi Sekolah')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.about-school.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Tambah Informasi Sekolah Baru</h2>

            <form method="POST" action="{{ route('admin.about-school.store') }}" class="space-y-6">
                @csrf

                <!-- Nama Sekolah -->
                <div>
                    <label for="nama_sekolah" class="block text-sm font-semibold text-purple-200 mb-2">Nama Sekolah</label>
                    <input
                        type="text"
                        id="nama_sekolah"
                        name="nama_sekolah"
                        value="{{ old('nama_sekolah') }}"
                        placeholder="Masukkan nama sekolah"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >
                    @error('nama_sekolah')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Logo Sekolah -->
                    <div>
                        <label for="logo_sekolah" class="block text-sm font-semibold text-purple-200 mb-2">Logo Sekolah</label>
                        <input
                            type="text"
                            id="logo_sekolah"
                            name="logo_sekolah"
                            value="{{ old('logo_sekolah') }}"
                            placeholder="URL atau path logo"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        >
                        @error('logo_sekolah')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tentang Sekolah / Jurusan -->
                    <div>
                        <label for="tentang_jurusan" class="block text-sm font-semibold text-purple-200 mb-2">Tentang Sekolah</label>
                        <input
                            type="text"
                            id="tentang_jurusan"
                            name="tentang_jurusan"
                            value="{{ old('tentang_jurusan') }}"
                            placeholder="Singkat tentang sekolah"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        >
                        @error('tentang_jurusan')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tentang Sekolah Detail -->
                <div>
                    <label for="tentang_sekolah" class="block text-sm font-semibold text-purple-200 mb-2">Deskripsi Lengkap Sekolah</label>
                    <textarea
                        id="tentang_sekolah"
                        name="tentang_sekolah"
                        rows="8"
                        placeholder="Deskripsi lengkap tentang sekolah, visi, misi, dll"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >{{ old('tentang_sekolah') }}</textarea>
                    @error('tentang_sekolah')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit" class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Simpan Informasi
                    </button>
                    <a href="{{ route('admin.about-school.index') }}" class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
