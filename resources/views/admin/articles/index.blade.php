@extends('layouts.app')

@section('title', 'Manajemen Artikel')
@section('page_title', 'Manajemen Artikel Sekolah')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Artikel Sekolah</h2>
            <p class="text-gray-300">Total Artikel: <span
                    class="font-bold text-purple-400">{{ $articles->count() ?? 0 }}</span></p>
        </div>
        <a href="{{ route('admin.articles.create') }}"
            class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
            <i class="fas fa-plus"></i> Tulis Artikel
        </a>
    </div>

    <!-- Search & Filter -->
    <div class="card-cosmic rounded-lg p-4 mb-6">
        <form method="GET" action="{{ route('admin.articles.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <input type="text" name="search" placeholder="Cari judul artikel..." value="{{ request('search') }}"
                    class="form-input-cosmic w-full px-4 py-2 rounded-lg">
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
                        <th class="px-6 py-3 text-left">Judul Artikel</th>
                        <th class="px-6 py-3 text-left">Ditulis Oleh</th>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-300">
                    @forelse($articles as $key => $article)
                        <tr>
                            <td class="px-6 py-3">{{ $key + 1 }}</td>
                            <td class="px-6 py-3 font-semibold text-white">{{ $article->title ?? 'N/A' }}</td>
                            <td class="px-6 py-3">{{ $article->major->major_name ?? 'N/A' }}</td>
                            <td class="px-6 py-3 text-sm">{{ $article->created_at?->format('d M Y') ?? 'N/A' }}</td>
                            <td class="px-6 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.articles.show', $article->id) }}"
                                        class="px-3 py-1 bg-blue-500 bg-opacity-20 text-blue-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.articles.edit', $article->id) }}"
                                        class="px-3 py-1 bg-yellow-500 bg-opacity-20 text-yellow-300 rounded hover:bg-opacity-40 transition text-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                            class="px-3 py-1 bg-red-500 bg-opacity-20 text-red-300 rounded hover:bg-opacity-40 transition text-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                <i class="fas fa-inbox text-4xl mb-2 block"></i>
                                Tidak ada data artikel
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if ($articles->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $articles->links() }}
        </div>
    @endif
@endsection
