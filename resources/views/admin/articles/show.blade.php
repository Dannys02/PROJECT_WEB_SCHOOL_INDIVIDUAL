@extends('layouts.app')

@section('title', 'Detail Artikel')
@section('page_title', 'Detail Artikel')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.articles.index') }}"
            class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg overflow-hidden">
            <!-- Header dengan Gambar -->
            @if ($article->image)
                <div class="h-80 overflow-hidden relative">
                    <img src="{{ asset('storage/articles/' . $article->image) }}" alt="{{ $article->title }}"
                        class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent pointer-events-none"></div>
                </div>
            @else
                <div class="h-80 bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center">
                    <i class="fas fa-newspaper text-6xl text-purple-300 opacity-30"></i>
                </div>
            @endif

            <!-- Konten -->
            <div class="p-8">
                <!-- Judul dan Meta -->
                <div class="mb-6 pb-6 border-b border-purple-500 border-opacity-30">
                    <h1 class="text-4xl font-bold text-white mb-3">{{ $article->title ?? 'Tidak ada' }}</h1>
                    <div class="flex flex-wrap gap-4 text-sm text-gray-400">
                        <span class="flex items-center gap-2">
                            <i class="fas fa-calendar"></i>
                            {{ $article->created_at?->format('d M Y') ?? 'Tidak ada' }}
                        </span>
                        <span class="flex items-center gap-2">
                            <i class="fas fa-user"></i>
                            Admin
                        </span>
                        @if ($article->jurusan)
                            <span class="flex items-center gap-2">
                                <i class="fas fa-book"></i>
                                {{ $article->major->major_name ?? 'Tidak ada' }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Isi Artikel -->
                <div class="prose prose-invert max-w-none mb-8">
                    <div class="text-gray-300 leading-relaxed">
                        {{ $article->article ?? 'Tidak ada' }}
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-purple-500 border-opacity-30 pt-6 mb-6">
                    <p class="text-gray-400 text-sm mb-4">Informasi Artikel</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="stat-card">
                            <p class="text-gray-400 text-xs mb-1">Terakhir Diperbarui</p>
                            <p class="text-white font-semibold text-sm">
                                {{ $article->updated_at?->format('d M Y') ?? 'Tidak ada' }}</p>
                        </div>
                        <div class="stat-card">
                            <p class="text-gray-400 text-xs mb-1">ID Artikel</p>
                            <p class="text-white font-semibold text-sm">{{ $article->id ?? 'Tidak ada' }}</p>
                        </div>
                        <div class="stat-card">
                            <p class="text-gray-400 text-xs mb-1">Status</p>
                            <p class="text-green-400 font-semibold text-sm">
                                <i class="fas fa-check-circle"></i> Terpublikasi
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-3">
                    <a href="{{ route('admin.articles.edit', $article->id) }}"
                        class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold text-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                            class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm font-semibold transition">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
