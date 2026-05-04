@extends('layouts.app')

@section('title', 'Tentang Sekolah')
@section('page_title', 'Tentang Sekolah')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Informasi Sekolah</h2>
            <p class="text-gray-300">Data tampilan tentang sekolah di website publik</p>
        </div>
        @if (!isset($aboutSchools) && $aboutSchools->count() > 0)
            <a href="{{ route('admin.about-school.create') }}"
                class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
                <i class="fas fa-plus"></i> Buat Informasi Sekolah
            </a>
        @endif
    </div>

    <!-- Cards -->
    <div>
        @forelse($aboutSchools as $item)
            <div class="card-cosmic rounded-lg p-6 hover:shadow-lg transition">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-white">{{ $item->school_name ?? 'N/A' }}</h3>
                        <p class="text-sm text-gray-400 mt-1">{{ $item->about_school ?? 'Belum ada deskripsi' }}</p>
                    </div>
                    <div class="text-2xl icon-cosmic">
                        <i class="fas fa-school"></i>
                    </div>
                </div>

                <div class="border-t border-purple-500 border-opacity-30 pt-4">
                    <p class="text-xs text-gray-400 mb-3">Logo Sekolah:</p>
                    @if ($item->logo_school)
                        <img src="{{ asset('storage/logos/' . $item->logo_school) }}" alt="{{ $item->school_name }}"
                            class="h-16 w-16 rounded">
                    @else
                        <div class="h-16 w-16 bg-gray-800 rounded flex items-center justify-center text-gray-500">
                            <i class="fas fa-image"></i>
                        </div>
                    @endif
                </div>

                <div class="flex gap-2 mt-4">
                    <a href="{{ route('admin.about-school.show', $item->id) }}"
                        class="flex-1 px-3 py-2 bg-blue-500 bg-opacity-20 text-blue-300 rounded hover:bg-opacity-40 transition text-sm text-center font-semibold">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('admin.about-school.edit', $item->id) }}"
                        class="flex-1 px-3 py-2 bg-yellow-500 bg-opacity-20 text-yellow-300 rounded hover:bg-opacity-40 transition text-sm text-center font-semibold">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('admin.about-school.destroy', $item->id) }}" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                            class="w-full px-3 py-2 bg-red-500 bg-opacity-20 text-red-300 rounded hover:bg-opacity-40 transition text-sm font-semibold">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="card-cosmic rounded-lg p-12 text-center">
                    <i class="fas fa-inbox text-6xl text-gray-600 mb-4 block"></i>
                    <p class="text-gray-400 text-lg">Tidak ada data tentang sekolah</p>
                    <a href="{{ route('admin.about-school.create') }}"
                        class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold inline-block mt-4">
                        <i class="fas fa-plus"></i> Buat Data Disini
                    </a>
                </div>
            </div>
        @endforelse
    </div>
@endsection
