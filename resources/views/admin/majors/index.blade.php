@extends('layouts.app')

@section('title', 'Manajemen Jurusan')
@section('page_title', 'Manajemen Jurusan')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h2 class="text-gray-400 text-sm mb-2">Kelola Data Jurusan</h2>

            <p class="text-gray-300">
                Total Jurusan:
                <span class="font-bold text-purple-400">
                    {{ $majors->count() ?? 0 }}
                </span>
            </p>
        </div>

        <a href="{{ route('admin.majors.create') }}"
            class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold flex items-center gap-2">
            <i class="fas fa-plus"></i>
            Tambah Jurusan
        </a>
    </div>

    <!-- Search -->
    <div class="card-cosmic rounded-lg p-4 mb-6">
        <form method="GET" action="{{ route('admin.majors.index') }}" class="flex flex-col md:flex-row gap-3">

            <div class="flex-1">
                <input type="text" name="search" placeholder="Cari nama jurusan..." value="{{ request('search') }}"
                    class="form-input-cosmic w-full px-4 py-2 rounded-lg">
            </div>

            <button type="submit" class="button-cosmic px-6 py-2 rounded-lg text-white font-semibold">
                <i class="fas fa-search"></i>
                Cari
            </button>
        </form>
    </div>

    <!-- Card Grid -->
    @if ($majors->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach ($majors as $key => $major)
                <div
                    class="card-cosmic rounded-2xl overflow-hidden border border-purple-500/20 hover:border-purple-400/40 transition duration-300 hover:-translate-y-1">

                    <!-- Header -->
                    <div class="relative p-6 pb-0">

                        <!-- Badge -->
                        <span
                            class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-semibold bg-purple-500 text-white">
                            Jurusan #{{ $key + 1 }}
                        </span>

                        <!-- Logo -->
                        <div class="flex justify-center mb-5">
                            @if ($major->major_logo)
                                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-purple-500/30 shadow-lg">
                                    <img src="{{ asset('storage/majors/' . $major->major_logo) }}"
                                        alt="{{ $major->major_name }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div
                                    class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center w-24 h-24 shadow-lg">
                                    <i class="fas fa-graduation-cap text-white text-3xl"></i>
                                </div>
                            @endif
                        </div>

                        <!-- Title -->
                        <div class="text-center">
                            <h3 class="text-xl font-bold text-white mb-2">
                                {{ $major->major_name ?? 'Tidak ada' }}
                            </h3>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 pt-4">

                        <!-- Description -->
                        <div class="bg-white/5 border border-white/5 rounded-xl p-4 min-h-[100px] mb-5">
                            <p class="text-sm text-gray-300 leading-relaxed line-clamp-4">
                                {{ $major->major_about ?? 'Tidak ada deskripsi jurusan.' }}
                            </p>
                        </div>

                        <!-- Actions -->
                        <div class="grid grid-cols-3 gap-2">

                            <a href="{{ route('admin.majors.show', $major->id) }}"
                                class="flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-blue-500/20 text-blue-300 hover:bg-blue-500/30 transition text-sm">
                                <i class="fas fa-eye"></i>
                                <span>Lihat</span>
                            </a>

                            <a href="{{ route('admin.majors.edit', $major->id) }}"
                                class="flex items-center justify-center gap-2 px-3 py-2 rounded-lg bg-yellow-500/20 text-yellow-300 hover:bg-yellow-500/30 transition text-sm">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>

                            <form method="POST" action="{{ route('admin.majors.destroy', $major->id) }}">
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
            <i class="fas fa-inbox text-5xl text-gray-500 mb-4 block"></i>

            <h3 class="text-xl font-semibold text-white mb-2">
                Tidak ada data jurusan
            </h3>

            <p class="text-gray-400 mb-6">
                Jurusan yang dibuat akan muncul di sini
            </p>

            <a href="{{ route('admin.majors.create') }}"
                class="button-cosmic inline-flex items-center gap-2 px-6 py-3 rounded-lg text-white font-semibold">
                <i class="fas fa-plus"></i>
                Tambah Jurusan
            </a>
        </div>
    @endif

    <!-- Pagination -->
    @if ($majors->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $majors->links() }}
        </div>
    @endif
@endsection
