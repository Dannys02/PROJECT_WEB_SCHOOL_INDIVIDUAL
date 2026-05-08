@extends('layouts.app')

@section('title', 'Edit Artikel')
@section('page_title', 'Edit Artikel')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.articles.index') }}"
            class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Artikel: {{ substr($article->title ?? 'N/A', 0, 40) }}</h2>

            <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Judul Artikel -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-purple-200 mb-2">Judul Artikel</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $article->title ?? '') }}"
                        placeholder="Masukkan judul artikel" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                    @error('title')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Jurusan -->
                    <div>
                        <label for="major_id" class="block text-sm font-semibold text-purple-200 mb-2">Jurusan</label>
                        <select id="major_id" name="major_id" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                            <option class="text-black" value="">Pilih Jurusan</option>
                            @forelse($majors ?? [] as $major)
                                <option class="text-black" value="{{ $major->id }}" @selected(old('major_id', $article->major_id ?? '') == $major->id)>
                                    {{ $major->major_name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('major_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="image" class="block text-sm font-semibold text-purple-200 mb-2">Gambar</label>
                        <input type="file" id="image" name="image"
                            value="{{ old('image', $article->image ?? '') }}"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                        @error('image')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Isi Artikel -->
                <div>
                    <label for="article" class="block text-sm font-semibold text-purple-200 mb-2">Isi Artikel</label>
                    <textarea id="article" name="article" rows="10" placeholder="Tulis isi artikel di sini..."
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg">{{ old('article', $article->article ?? '') }}</textarea>
                    @error('article')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit"
                        class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Artikel
                    </button>
                    <a href="{{ route('admin.articles.index') }}"
                        class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
