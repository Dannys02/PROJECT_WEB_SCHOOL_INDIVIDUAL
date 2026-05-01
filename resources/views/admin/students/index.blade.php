@extends('layouts.app')

@section('title', 'Manajemen Siswa')
@section('page_title', 'Manajemen Siswa')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Data Siswa</h2>
            <p class="text-gray-300">Total Siswa: <span class="font-bold text-purple-400">{{ $students->count() ?? 0 }}</span></p>
        </div>
        <a href="{{ route('admin.students.create') }}" class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
            <i class="fas fa-plus"></i> Tambah Siswa
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="card-cosmic rounded-lg p-4 mb-6">
        <form method="GET" action="{{ route('admin.students.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama atau NISN siswa..."
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
                        <th class="px-6 py-3 text-left">Nama Siswa</th>
                        <th class="px-6 py-3 text-left">NISN</th>
                        <th class="px-6 py-3 text-left">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left">Alamat</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300">
                    @forelse($students as $key => $student)
                        <tr>
                            <td class="px-6 py-3 text-center">{{ $key + 1 }}</td>
                            <td class="px-3 py-3">
                                @if($student->student_picture)
                                    <img src="{{ asset('storage/students/' . $student->student_picture) }}" alt="Foto Siswa" class="aspect-square h-16 object-cover rounded-full">
                                @else
                                    <div class="bg-gray-300 border-2 border-dashed rounded-xl w-16 h-16"></div>
                                @endif
                            </td>
                            <td class="px-6 py-3 font-semibold text-white">{{ $student->name ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $student->nisn ?? 'N/A' }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-block px-3 py-1 bg-purple-500 bg-opacity-20 text-purple-300 rounded text-xs">
                                    {{ $student->gender ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-sm">{{ substr($student->address ?? 'N/A', 0, 30) }}...</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.students.show', $student->id) }}" class="px-3 py-1 bg-blue-500 bg-opacity-20 text-blue-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="px-3 py-1 bg-yellow-500 bg-opacity-20 text-yellow-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.students.destroy', $student->id) }}" class="inline">
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
                                Tidak ada data siswa
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($students->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $students->links() }}
        </div>
    @endif
@endsection
