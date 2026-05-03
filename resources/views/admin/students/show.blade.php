@extends('layouts.app')

@section('title', 'Detail Siswa')
@section('page_title', 'Detail Data Siswa')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.students.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="px-8 py-6 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-gray-800 font-bold text-2xl">
                            {{-- {{ substr($student->name ?? 'S', 0, 1) }} --}}
                            <img src="{{ asset('storage/students/' . $student->student_picture) }}" alt="{{ $student->name }}" class="rounded-full w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-1">{{ $student->name ?? 'N/A' }}</h2>
                            <p class="text-purple-100">NISN: {{ $student->nisn ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.students.edit', $student->id) }}" class="button-cosmic px-4 py-2 rounded-lg text-white text-sm font-semibold">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.students.destroy', $student->id) }}" class="inline">
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
                            <p class="text-white font-semibold text-lg">{{ $student->name ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Jurusan</p>
                            <p class="text-white font-semibold text-lg">{{ $student->major->major_name ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Kelas</p>
                            <p class="text-white font-semibold text-lg">{{ $student->class ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Nomor Induk Siswa Nasional (NISN)</p>
                            <p class="text-white font-semibold text-lg">{{ $student->nisn ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <p class="text-gray-400 text-sm mb-1">Jenis Kelamin</p>
                            <p class="text-white font-semibold text-lg">
                                <span class="inline-block px-3 py-1 bg-purple-500 bg-opacity-20 text-purple-300 rounded">
                                    {{ $student->gender ?? 'N/A' }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    {{-- <div class="space-y-6">
                        <div>
                            <p class="text-gray-400 text-sm mb-1">Foto Siswa</p>
                            @if($student->student_picture)
                                <img src="{{ asset('storage/students/' . $student->student_picture) }}" alt="{{ $student->name }}" class="rounded-lg max-w-xs h-auto">
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
                    <p class="text-white text-base leading-relaxed">{{ $student->address ?? 'N/A' }}</p>
                </div>

                <!-- Info Tambahan -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Dibuat Pada</p>
                        <p class="text-white font-semibold">{{ $student->created_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Diperbarui</p>
                        <p class="text-white font-semibold">{{ $student->updated_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Status</p>
                        <p class="text-green-400 font-semibold">
                            <i class="fas fa-check-circle"></i> Aktif
                        </p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">ID Siswa</p>
                        <p class="text-white font-semibold text-sm">{{ $student->id ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
