@extends('layouts.app')

@section('title', 'Manajemen Jabatan')
@section('page_title', 'Manajemen Jabatan')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Data Jabatan</h2>
            <p class="text-gray-300">Total Jabatan: <span class="font-bold text-purple-400">{{ $positions->count() ?? 0 }}</span></p>
        </div>
        <a href="{{ route('admin.positions.create') }}" class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Jabatan
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="card-cosmic rounded-lg p-4 mb-6">
        <form method="GET" action="{{ route('admin.positions.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama jabatan..."
                    value="{{ request('search') }}"
                    class="form-input-cosmic w-full px-4 py-2 rounded-lg"
                >
            </div>
            <button type="submit" class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold">
                <i class="fas fa-search"></i> Cari
            </button>
        </form>
    </div>

    <!-- Table -->
    <div class="card-cosmic rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table-cosmic w-full">
                <thead class="font-semibold text-white">
                    <tr>
                        <th class="px-6 py-3 text-left">No</th>
                        <th class="px-6 py-3 text-left">Nama Jabatan</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300">
                    @forelse($positions as $key => $position)
                        <tr>
                            <td class="px-6 py-3">{{ $key + 1 }}</td>
                            <td class="px-6 py-3 font-semibold text-white">{{ $position->position ?? 'N/A' }}</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.positions.show', $position->id) }}" class="px-3 py-1 bg-blue-500 bg-opacity-20 text-blue-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.positions.edit', $position->id) }}" class="px-3 py-1 bg-yellow-500 bg-opacity-20 text-yellow-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.positions.destroy', $position->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="px-3 py-1 bg-red-500 bg-opacity-20 text-red-300 rounded hover:bg-opacity-40 transition text-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                                <i class="fas fa-inbox text-4xl mb-2 block"></i>
                                Tidak ada data jabatan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($positions->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $positions->links() }}
        </div>
    @endif
@endsection
