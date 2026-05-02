@extends('layouts.app')

@section('title', 'Detail Guru')
@section('page_title', 'Detail Data Guru')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.teachers.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="px-8 py-6 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-gray-800 font-bold text-2xl">
                            {{-- {{ substr($teacher->name ?? 'G', 0, 1) }} --}}
                            <img src="{{ asset('storage/teachers/' . $teacher->teacher_picture) }}" alt="{{ $teacher->name }}" class="rounded-full w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-1">{{ $teacher->name ?? 'N/A' }}</h2>
                            <p class="text-blue-100">NIP: {{ $teacher->nip ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="button-cosmic px-4 py-2 rounded-lg text-white text-sm font-semibold">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.teachers.destroy', $teacher->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-semibold transition">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Nama Lengkap</p>
                            <p class="text-white font-semibold text-lg">{{ $teacher->name ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Jurusan</p>
                            <p class="text-white font-semibold text-lg">{{ $teacher->major->major_name ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Nomor Induk Pegawai (NIP)</p>
                            <p class="text-white font-semibold text-lg">{{ $teacher->nip ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Jenis Kelamin</p>
                            <p class="text-white font-semibold text-lg">
                                <span class="inline-block px-3 py-1 bg-blue-500 bg-opacity-20 text-blue-300 rounded">
                                    {{ $teacher->gender ?? 'N/A' }}
                                </span>
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Jabatan</p>
                            <p class="text-white font-semibold text-lg">
                                {{ $teacher->position->position ?? 'Belum ditentukan' }}
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    {{-- <div class="space-y-6">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Foto Guru</p>
                            @if($teacher->teacher_picture)
                                <img src="{{ asset('storage/teachers/' . $teacher->teacher_picture) }}" alt="{{ $teacher->name }}" class="w-full h-62 object-cover rounded-full">
                            @else
                                <div class="w-48 h-48 bg-gray-800 rounded-lg flex items-center justify-center text-gray-500">
                                    <i class="fas fa-image text-4xl"></i>
                                </div>
                            @endif
                        </div>
                    </div> --}}
                </div>

                <!-- Alamat -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6">
                    <p class="text-gray-400 text-sm mb-2">Alamat</p>
                    <p class="text-white text-base leading-relaxed">{{ $teacher->address ?? 'N/A' }}</p>
                </div>

                <!-- Mata Pelajaran -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6">
                    <p class="text-gray-400 text-sm mb-2">Mata Pelajaran</p>
                    <p class="text-white text-base leading-relaxed">{{ $teacher->lessons ?? 'Belum ditentukan' }}</p>
                </div>

                <!-- Info Tambahan -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Dibuat Pada</p>
                        <p class="text-white font-semibold text-sm">{{ $teacher->created_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Diperbarui</p>
                        <p class="text-white font-semibold text-sm">{{ $teacher->updated_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Status</p>
                        <p class="text-green-400 font-semibold">
                            <i class="fas fa-check-circle"></i> Aktif
                        </p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">ID Guru</p>
                        <p class="text-white font-semibold text-sm">{{ $teacher->id ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
