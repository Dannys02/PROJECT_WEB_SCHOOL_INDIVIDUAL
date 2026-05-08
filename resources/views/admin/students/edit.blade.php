@extends('layouts.app')

@section('title', 'Edit Siswa')
@section('page_title', 'Edit Data Siswa')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.students.index') }}"
            class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Siswa: {{ $student->name ?? 'N/A' }}</h2>

            <form method="POST" action="{{ route('admin.students.update', $student->id) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Siswa -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-purple-200 mb-2">Nama Siswa</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $student->name ?? '') }}"
                            placeholder="Masukkan nama siswa" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                        @error('name')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label for="major_id" class="block text-sm font-semibold text-purple-200 mb-2">Jurusan</label>
                        <select id="major_id" name="major_id" class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            >
                            <option class="text-black" value="">Pilih Jurusan</option>
                            @foreach ($majors as $major)
                                <option class="text-black" value="{{ $major->id }}" @selected(old('major_id', $student->major_id ?? '') == $major->id)>{{ $major->major_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('major_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Kelas -->
                    <div>
                        <label for="class" class="block text-sm font-semibold text-purple-200 mb-2">Kelas</label>
                        <select id="class" name="class" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                            <option class="text-black" value="">Pilih Kelas</option>
                            <option class="text-black" value="X" @selected(old('class', $student->class ?? '') == 'X')>X</option>
                            <option class="text-black" value="XI" @selected(old('class', $student->class ?? '') == 'XI')>XI</option>
                            <option class="text-black" value="XII" @selected(old('class', $student->class ?? '') == 'XII')>XII</option>
                        </select>
                        @error('class')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NISN -->
                    <div>
                        <label for="nisn" class="block text-sm font-semibold text-purple-200 mb-2">NISN</label>
                        <input type="text" id="nisn" name="nisn" value="{{ old('nisn', $student->nisn ?? '') }}"
                            placeholder="Nomor Induk Siswa Nasional" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                        @error('nisn')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div>
                        <label for="gender" class="block text-sm font-semibold text-purple-200 mb-2">Jenis Kelamin</label>
                        <select id="gender" name="gender" class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            >
                            <option class="text-black" value="">Pilih Jenis Kelamin</option>
                            <option class="text-black" value="Laki-laki" @selected(old('gender', $student->gender ?? '') == 'Laki-laki')>Laki-laki</option>
                            <option class="text-black" value="Perempuan" @selected(old('gender', $student->gender ?? '') == 'Perempuan')>Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Foto Siswa -->
                    <div>
                        <label for="student_picture" class="block text-sm font-semibold text-purple-200 mb-2">Foto
                            Siswa</label>
                        <input type="file" id="student_picture" name="student_picture"
                            value="{{ old('student_picture', $student->student_picture ?? '') }}"
                            placeholder="URL atau path foto" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                        @error('student_picture')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block text-sm font-semibold text-purple-200 mb-2">Alamat</label>
                    <textarea id="address" name="address" rows="4" placeholder="Masukkan address lengkap siswa"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg" >{{ old('address', $student->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit"
                        class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Siswa
                    </button>
                    <a href="{{ route('admin.students.index') }}"
                        class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
