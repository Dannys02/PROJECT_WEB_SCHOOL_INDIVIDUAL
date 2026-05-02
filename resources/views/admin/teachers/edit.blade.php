@extends('layouts.app')

@section('title', 'Edit Guru')
@section('page_title', 'Edit Data Guru')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.teachers.index') }}"
            class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Guru: {{ $teacher->name ?? 'N/A' }}</h2>

            <form method="POST" action="{{ route('admin.teachers.update', $teacher->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Guru -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-purple-200 mb-2">Nama Guru</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $teacher->name ?? '') }}"
                            placeholder="Masukkan nama guru" class="form-input-cosmic w-full px-4 py-3 rounded-lg" required>
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label for="major_id" class="block text-sm font-semibold text-purple-200 mb-2">Jurusan</label>
                        <select id="major_id" name="major_id" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                            <option class="text-black" value="">Pilih Jurusan</option>
                            @forelse($majors ?? [] as $major)
                                <option class="text-black" value="{{ $major->id }}" @selected(old('major_id', $teacher->major_id) == $major->id)>
                                    {{ $major->major_name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('major_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div>
                        <label for="nip" class="block text-sm font-semibold text-purple-200 mb-2">NIP</label>
                        <input type="text" id="nip" name="nip" value="{{ old('nip', $teacher->nip ?? '') }}"
                            placeholder="Nomor Induk Pegawai" class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            required>
                        @error('nip')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="gender" class="block text-sm font-semibold text-purple-200 mb-2">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            required>
                            <option class="text-black" value="">Pilih Jenis Kelamin</option>
                            <option class="text-black" value="Laki-laki" @selected(old('gender', $teacher->gender ?? '') == 'Laki-laki')>Laki-laki</option>
                            <option class="text-black" value="Perempuan" @selected(old('gender', $teacher->gender ?? '') == 'Perempuan')>Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div>
                        <label for="position_id" class="block text-sm font-semibold text-purple-200 mb-2">Jabatan</label>
                        <select id="position_id" name="position_id" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                            <option class="text-black" value="">Pilih Jabatan</option>
                            @forelse($positions ?? [] as $position)
                                <option class="text-black" value="{{ $position->id }}" @selected(old('position_id', $teacher->position_id ?? '') == $position->id)>
                                    {{ $position->position ?? 'N/A' }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('position_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Guru -->
                    <div>
                        <label for="teacher_picture" class="block text-sm font-semibold text-purple-200 mb-2">Foto
                            Guru</label>
                        <input type="file" id="teacher_picture" name="teacher_picture"
                            value="{{ old('teacher_picture') }}" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                        @error('teacher_picture')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-semibold text-purple-200 mb-2">Alamat</label>
                    <textarea id="address" name="address" rows="4" placeholder="Masukkan alamat lengkap guru"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg" required>{{ old('address', $teacher->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mata Pelajaran -->
                <div>
                    <label for="lessons" class="block text-sm font-semibold text-purple-200 mb-2">Mata Pelajaran</label>
                    <input type="text" id="lessons" name="lessons" value="{{ old('lessons', $teacher->lessons ?? 'N/A') }}"
                        placeholder="Masukkan mata pelajaran" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                    @error('lessons')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit"
                        class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Guru
                    </button>
                    <a href="{{ route('admin.teachers.index') }}"
                        class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
