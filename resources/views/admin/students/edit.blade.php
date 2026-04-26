@extends('layouts.app')

@section('title', 'Edit Siswa')
@section('page_title', 'Edit Data Siswa')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.students.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Siswa: {{ $student->nama_siswa ?? 'N/A' }}</h2>

            <form method="POST" action="{{ route('admin.students.update', $student->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Siswa -->
                    <div>
                        <label for="nama_siswa" class="block text-sm font-semibold text-purple-200 mb-2">Nama Siswa</label>
                        <input
                            type="text"
                            id="nama_siswa"
                            name="nama_siswa"
                            value="{{ old('nama_siswa', $student->nama_siswa ?? '') }}"
                            placeholder="Masukkan nama siswa"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            required
                        >
                        @error('nama_siswa')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NISN -->
                    <div>
                        <label for="nisn" class="block text-sm font-semibold text-purple-200 mb-2">NISN</label>
                        <input
                            type="text"
                            id="nisn"
                            name="nisn"
                            value="{{ old('nisn', $student->nisn ?? '') }}"
                            placeholder="Nomor Induk Siswa Nasional"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            required
                        >
                        @error('nisn')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-semibold text-purple-200 mb-2">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-input-cosmic w-full px-4 py-3 rounded-lg" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @selected(old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'Laki-laki')>Laki-laki</option>
                            <option value="Perempuan" @selected(old('jenis_kelamin', $student->jenis_kelamin ?? '') == 'Perempuan')>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Siswa -->
                    <div>
                        <label for="foto_siswa" class="block text-sm font-semibold text-purple-200 mb-2">Foto Siswa</label>
                        <input
                            type="text"
                            id="foto_siswa"
                            name="foto_siswa"
                            value="{{ old('foto_siswa', $student->foto_siswa ?? '') }}"
                            placeholder="URL atau path foto"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        >
                        @error('foto_siswa')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-semibold text-purple-200 mb-2">Alamat</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        placeholder="Masukkan alamat lengkap siswa"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >{{ old('alamat', $student->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit" class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Siswa
                    </button>
                    <a href="{{ route('admin.students.index') }}" class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
