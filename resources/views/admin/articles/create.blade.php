@extends('layouts.app')

@section('title', 'Tulis Artikel')
@section('page_title', 'Tulis Artikel Baru')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.articles.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Tulis Artikel Baru</h2>

            <form method="POST" action="{{ route('admin.articles.store') }}" class="space-y-6">
                @csrf

                <!-- Judul Artikel -->
                <div>
                    <label for="judul_artikel" class="block text-sm font-semibold text-purple-200 mb-2">Judul Artikel</label>
                    <input
                        type="text"
                        id="judul_artikel"
                        name="judul_artikel"
                        value="{{ old('judul_artikel') }}"
                        placeholder="Masukkan judul artikel"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >
                    @error('judul_artikel')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Jurusan -->
                    <div>
                        <label for="jurusan_id" class="block text-sm font-semibold text-purple-200 mb-2">Jurusan</label>
                        <select id="jurusan_id" name="jurusan_id" class="form-input-cosmic w-full px-4 py-3 rounded-lg">
                            <option value="">Pilih Jurusan (Opsional)</option>
                            @forelse($majors ?? [] as $major)
                                <option value="{{ $major->id }}" @selected(old('jurusan_id') == $major->id)>
                                    {{ $major->nama_jurusan }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('jurusan_id')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label for="gambar" class="block text-sm font-semibold text-purple-200 mb-2">Gambar</label>
                        <input
                            type="text"
                            id="gambar"
                            name="gambar"
                            value="{{ old('gambar') }}"
                            placeholder="URL gambar artikel"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        >
                        @error('gambar')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Isi Artikel -->
                <div>
                    <label for="isi_artikel" class="block text-sm font-semibold text-purple-200 mb-2">Isi Artikel</label>
                    <textarea
                        id="isi_artikel"
                        name="isi_artikel"
                        rows="10"
                        placeholder="Tulis isi artikel di sini..."
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                        required
                    >{{ old('isi_artikel') }}</textarea>
                    @error('isi_artikel')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit" class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Publikasikan Artikel
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
