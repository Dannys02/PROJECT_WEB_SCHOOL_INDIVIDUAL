@extends('layouts.app')

@section('title', 'Manajemen Artikel')
@section('page_title', 'Manajemen Artikel Sekolah')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Artikel Sekolah</h2>
            <p class="text-gray-300">
                Total Artikel:
                <span class="font-bold text-purple-400">{{ $articles->count() ?? 0 }}</span>
            </p>
        </div>

        <a href="{{ route('admin.articles.create') }}"
            class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
            <i class="fas fa-plus"></i> Tulis Artikel
        </a>
    </div>

    <!-- Search -->
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

    <!-- Card Grid -->
    @if ($articles->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach ($articles as $key => $article)
                <div
                    class="card-cosmic rounded-2xl overflow-hidden border border-purple-500/20 hover:border-purple-400/40 transition duration-300 hover:-translate-y-1">

                    <!-- Header -->
                    <div>
                        <div class="flex items-start justify-between gap-3 ">
                            <span
                                class="absolute top-5 left-5 px-3 py-1 rounded-full text-xs font-semibold bg-purple-500 text-white">
                                Artikel #{{ $key + 1 }}
                            </span>

                            <span class="absolute top-5 right-5 bg-purple-500 text-xs px-3 py-1 rounded-full text-white">
                                {{ $article->created_at?->format('d M Y') ?? 'Tidak ada' }}
                            </span>

                            @if ($article->image)
                                <div class="h-80 w-full overflow-hidden relative">
                                    <img src="{{ asset('storage/articles/' . $article->image) }}"
                                        alt="{{ $article->title }}" class="w-full h-full object-cover rounded-lg">
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black to-transparent pointer-events-none">
                                    </div>
                                </div>
                            @else
                                <div
                                    class="h-80 w-full bg-gradient-to-br from-purple-600 to-purple-800 flex items-center justify-center">
                                    <i class="fas fa-newspaper text-6xl text-purple-300 opacity-30"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-5 space-y-4">
                        <h3 class="text-lg font-bold text-white line-clamp-2 mb-3">
                            {{ $article->title ?? 'Tidak ada' }}
                        </h3>
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center text-blue-300">
                                <i class="fas fa-user-graduate"></i>
                            </div>

                            <div>
                                <p class="text-xs text-gray-400">Ditulis Oleh</p>
                                <p class="text-sm text-white font-medium">
                                    {{ $article->major->major_name ?? 'Tidak ada' }}
                                </p>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="grid grid-cols-3 gap-2 pt-2">
                            <a href="{{ route('admin.articles.show', $article->id) }}"
                                class="flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-blue-500/20 text-blue-300 hover:bg-blue-500/30 transition text-sm">
                                <i class="fas fa-eye"></i>
                                <span>Lihat</span>
                            </a>

                            <a href="{{ route('admin.articles.edit', $article->id) }}"
                                class="flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-yellow-500/20 text-yellow-300 hover:bg-yellow-500/30 transition text-sm">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>

                            <form method="POST" action="{{ route('admin.articles.destroy', $article->id) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')"
                                    class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-red-500/20 text-red-300 hover:bg-red-500/30 transition text-sm">
                                    <i class="fas fa-trash"></i>
                                    <span>Hapus</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="card-cosmic rounded-2xl p-10 text-center">
            <i class="fas fa-inbox text-5xl text-gray-500 mb-4"></i>

            <h3 class="text-xl font-semibold text-white mb-2">
                Tidak ada data artikel
            </h3>

            <p class="text-gray-400 mb-6">
                Artikel yang dibuat akan muncul di sini
            </p>

            <a href="{{ route('admin.articles.create') }}"
                class="button-cosmic inline-flex items-center gap-2 px-6 py-3 rounded-lg text-white font-semibold">
                <i class="fas fa-plus"></i>
                Tulis Artikel
            </a>
        </div>
    @endif

    <!-- Pagination -->
    @if ($articles->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $articles->links() }}
        </div>
    @endif
@endsection
