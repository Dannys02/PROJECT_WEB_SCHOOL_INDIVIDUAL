@extends('layouts.app')

@section('title', 'Detail Info Sekolah')
@section('page_title', 'Detail Informasi Sekolah')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.about-school.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="px-8 py-6 relative">
                <div class="flex items-start justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center text-gray-800 font-bold text-2xl">
                            {{-- <i class="fas fa-school"></i> --}}
                            <img src="{{ asset('storage/logos/' . $aboutSchool->logo_school) }}" alt="{{ $aboutSchool->school_name }}" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white mb-1">{{ $aboutSchool->school_name ?? 'N/A' }}</h2>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.about-school.edit', $aboutSchool->id) }}" class="button-cosmic px-4 py-2 rounded-lg text-white text-sm font-semibold">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form method="POST" action="{{ route('admin.about-school.destroy', $aboutSchool->id) }}" class="inline">
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
                <!-- Logo -->
                {{-- <div class="border-b border-purple-500 border-opacity-30 pb-6">
                    <p class="text-gray-400 text-sm mb-3">Logo Sekolah</p>
                    @if($aboutSchool->logo_sekolah)
                        <img src="{{ asset($aboutSchool->logo_sekolah) }}" alt="{{ $aboutSchool->school_name }}" class="h-32 w-32 rounded">
                    @else
                        <div class="h-32 w-32 bg-gray-800 rounded flex items-center justify-center text-gray-500">
                            <i class="fas fa-image text-4xl"></i>
                        </div>
                    @endif
                </div> --}}

                <!-- Nama Sekolah -->
                <div>
                    <p class="text-gray-400 text-sm mb-2">Nama Sekolah</p>
                    <p class="text-white font-semibold text-lg">{{ $aboutSchool->school_name ?? 'N/A' }}</p>
                </div>

                <!-- Tentang Singkat -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6">
                    <p class="text-gray-400 text-sm mb-2">Tentang Sekolah</p>
                    <p class="text-white text-base">{{ $aboutSchool->about_school ?? 'N/A' }}</p>
                </div>

                <!-- Deskripsi Lengkap -->
                {{-- <div class="border-t border-purple-500 border-opacity-30 pt-6">
                    <p class="text-gray-400 text-sm mb-3">Deskripsi Lengkap Sekolah</p>
                    <p class="text-white text-base leading-relaxed whitespace-pre-wrap">{{ $aboutSchool->tentang_sekolah ?? 'N/A' }}</p>
                </div> --}}

                <!-- Info Tambahan -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Dibuat Pada</p>
                        <p class="text-white font-semibold text-sm">{{ $aboutSchool->created_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Diperbarui</p>
                        <p class="text-white font-semibold text-sm">{{ $aboutSchool->updated_at?->format('d M Y') ?? 'N/A' }}</p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">Status</p>
                        <p class="text-green-400 font-semibold text-sm">
                            <i class="fas fa-check-circle"></i> Aktif
                        </p>
                    </div>
                    <div class="stat-card">
                        <p class="text-gray-400 text-xs mb-1">ID</p>
                        <p class="text-white font-semibold text-sm">{{ $aboutSchool->id ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
