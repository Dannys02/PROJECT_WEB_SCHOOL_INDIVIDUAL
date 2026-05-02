@extends('layouts.app')

@section('title', 'Detail Jurusan')
@section('page_title', 'Detail Data Jurusan')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.majors.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="px-8 py-6 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 rounded-full flex items-center justify-center text-gray-800 font-bold text-2xl">
                            {{-- <i class="fas fa-book"></i> --}}
                            <img src="{{ asset('storage/majors/' . $major->major_logo) }}" class="h-full w-full object-cover rounded-full" alt="{{ $major->major_name }}">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-1">{{ $major->major_name ?? 'N/A' }}</h2>
                            <p class="text-green-100">Program Studi</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.majors.edit', $major->id) }}" class="button-cosmic px-4 py-2 rounded-lg text-white text-sm font-semibold">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.majors.destroy', $major->id) }}" class="inline">
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
                <!-- Nama Jurusan -->
                <div>
                    <p class="text-gray-400 text-sm mb-2">Nama Jurusan</p>
                    <p class="text-white font-semibold text-lg">{{ $major->major_name ?? 'N/A' }}</p>
                </div>

                <!-- Tentang Jurusan -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6">
                    <p class="text-gray-400 text-sm mb-3">Tentang Jurusan</p>
                    <p class="text-white text-base leading-relaxed">{{ $major->major_about ?? 'N/A' }}</p>
                </div>

                <!-- Info Tambahan -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Dibuat Pada</p>
                        <p class="text-white font-semibold text-sm">{{ $major->created_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Diperbarui</p>
                        <p class="text-white font-semibold text-sm">{{ $major->updated_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Status</p>
                        <p class="text-green-400 font-semibold">
                            <i class="fas fa-check-circle"></i> Aktif
                        </p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">ID Jurusan</p>
                        <p class="text-white font-semibold text-sm">{{ $major->id ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
