@extends('layouts.app')

@section('title', 'Detail Jabatan')
@section('page_title', 'Detail Data Jabatan')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.positions.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="px-8 py-6 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-bold text-2xl">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-1">{{ $position->position ?? 'N/A' }}</h2>
                            <p class="text-orange-100">Posisi</p>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.positions.edit', $position->id) }}" class="button-cosmic px-4 py-2 rounded-lg text-white text-sm font-semibold">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.positions.destroy', $position->id) }}" class="inline">
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
                <!-- Nama Jabatan -->
                <div>
                    <p class="text-gray-400 text-sm mb-2">Nama Jabatan</p>
                    <p class="text-white font-semibold text-lg">{{ $position->position ?? 'N/A' }}</p>
                </div>

                <!-- Info Tambahan -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Dibuat Pada</p>
                        <p class="text-white font-semibold text-sm">{{ $position->created_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Diperbarui</p>
                        <p class="text-white font-semibold text-sm">{{ $position->updated_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    {{-- <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Status</p>
                        <p class="text-green-400 font-semibold">
                            <i class="fas fa-check-circle"></i> Aktif
                        </p>
                    </div> --}}
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">ID Jabatan</p>
                        <p class="text-white font-semibold text-sm">{{ $position->id ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
