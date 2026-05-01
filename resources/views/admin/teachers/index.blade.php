@extends('layouts.app')

@section('title', 'Manajemen Guru')
@section('page_title', 'Manajemen Guru')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Data Guru</h2>
            <p class="text-gray-300">Total Guru: <span class="font-bold text-purple-400">{{ $teachers->count() ?? 0 }}</span></p>
        </div>
        <a href="{{ route('admin.teachers.create') }}" class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Guru
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="card-cosmic rounded-lg p-4 mb-6">
        <form method="GET" action="{{ route('admin.teachers.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama atau NIP guru..."
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
                        <th class="px-6 py-3 text-left">Foto</th>
                        <th class="px-6 py-3 text-left">Nama Guru</th>
                        <th class="px-6 py-3 text-left">NIP</th>
                        <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left">Jabatan</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300">
                    @forelse($teachers as $key => $teacher)
                        <tr>
                            <td class="px-6 py-3 text-center">{{ $key + 1 }}</td>
                            <td class="px-3 py-3">
                                @if($teacher->teacher_picture)
                                    <img src="{{ asset('storage/teachers/' . $teacher->teacher_picture) }}" alt="Foto Guru" class="aspect-square h-16 object-cover rounded-full">
                                @else
                                    <div class="bg-gray-300 border-2 border-dashed rounded-xl w-16 h-16"></div>
                                @endif
                            </td>
                            <td class="px-6 py-3 font-semibold text-white">{{ $teacher->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $teacher->nip ?? 'N/A' }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-block px-3 py-1 bg-purple-500 bg-opacity-20 text-purple-300 rounded text-xs">
                                    {{ $teacher->gender ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-sm">{{ $teacher->position->position ?? 'N/A' }}</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.teachers.show', $teacher->id) }}" class="px-3 py-1 bg-blue-500 bg-opacity-20 text-blue-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="px-3 py-1 bg-yellow-500 bg-opacity-20 text-yellow-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.teachers.destroy', $teacher->id) }}" class="inline">
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
                            <td colspan="6" class="px-6 py-8 text-center text-gray-400">
                                <i class="fas fa-inbox text-4xl mb-2 block"></i>
                                Tidak ada data guru
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($teachers->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $teachers->links() }}
        </div>
    @endif
@endsection
