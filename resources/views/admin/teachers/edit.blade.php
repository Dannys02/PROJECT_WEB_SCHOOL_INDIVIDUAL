@extends('layouts.app')

@section('title', 'Edit Guru')
@section('page_title', 'Edit Data Guru')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.teachers.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Guru: {{ $teacher->nama_guru ?? 'N/A' }}</h2>

            <form method="POST" action="{{ route('admin.teachers.update', $teacher->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Guru -->
                    <div>
                        <label for="nama_guru" class="block text-sm font-semibold text-purple-200 mb-2">Nama Guru</label>
                        <input
                            type="text"
                            id="nama_guru"
                            name="nama_guru"
                            value="{{ old('nama_guru', $teacher->nama_guru ?? '') }}"
                            placeholder="Masukkan nama guru"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            required
                        >
                        @error('nama_guru')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div>
                        <label for="nip" class="block text-sm font-semibold text-purple-200 mb-2">NIP</label>
                        <input
                            type="text"
                            id="nip"
                            name="nip"
                            value="{{ old('nip', $teacher->nip ?? '') }}"
                            placeholder="Nomor Induk Pegawai"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            required
                        >
                        @error('nip')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="jenis_kelamin_guru" class="block text-sm font-semibold text-purple-200 mb-2">Jenis Kelamin</label>
                        <select id="jenis_kelamin_guru" name="jenis_kelamin_guru" class="form-input-cosmic w-full px-4 py-3 rounded-lg" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @selected(old('jenis_kelamin_guru', $teacher->jenis_kelamin_guru ?? '') == 'Laki-laki')>Laki-laki</option>
                            <option value="Perempuan" @selected(old('jenis_kelamin_guru', $teacher->jenis_kelamin_guru ?? '') == 'Perempuan')>Perempuan</option>
                        </select>
                        @error('jenis_kelamin_guru')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="jabatan_id" class="block text-sm font-semibold text-purple-200 mb-2">Jabatan</label>
                        <select id="jabatan_id" name="jabatan_id" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                            <option value="">Pilih Jabatan</option>
                            @forelse($positions ?? [] as $position)
                                <option value="{{ $position->id }}" @selected(old('jabatan_id', $teacher->jabatan_id ?? '') == $position->id)>
                                    {{ $position->nama_jabatan }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('jabatan_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Guru -->
                    <div>
                        <label for="foto_guru" class="block text-sm font-semibold text-purple-200 mb-2">Foto Guru</label>
                        <input
                            type="text"
                            id="foto_guru"
                            name="foto_guru"
                            value="{{ old('foto_guru', $teacher->foto_guru ?? '') }}"
                            placeholder="URL atau path foto"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        >
                        @error('foto_guru')
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
                        placeholder="Masukkan alamat lengkap guru"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >{{ old('alamat', $teacher->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit" class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Guru
                    </button>
                    <a href="{{ route('admin.teachers.index') }}" class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
