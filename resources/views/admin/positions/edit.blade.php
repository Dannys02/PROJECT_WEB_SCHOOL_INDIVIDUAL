@extends('layouts.app')

@section('title', 'Edit Jabatan')
@section('page_title', 'Edit Data Jabatan')

@section('content')
    <div class="max-w-4xl">
        <a href="{{ route('admin.positions.index') }}" class="text-purple-400 hover:text-purple-300 text-sm mb-6 inline-flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="card-cosmic rounded-lg p-8">
            <h2 class="text-2xl font-bold text-white mb-6">Edit Jabatan: {{ $position->position ?? 'N/A' }}</h2>

            <form method="POST" action="{{ route('admin.positions.update', $position->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Jabatan -->
                <div>
                    <label for="position" class="block text-sm font-semibold text-purple-200 mb-2">Nama Jabatan</label>
                    <input
                        type="text"
                        id="position"
                        name="position"
                        value="{{ old('position', $position->position ?? '') }}"
                        placeholder="Contoh: Kepala Sekolah"
                        class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                    >
                    @error('position')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex gap-4">
                    <button type="submit" class="button-cosmic px-8 py-3 rounded-lg text-white font-semibold flex items-center gap-2">
                        <i class="fas fa-save"></i> Perbarui Jabatan
                    </button>
                    <a href="{{ route('admin.positions.index') }}" class="px-8 py-3 rounded-lg text-white font-semibold border border-gray-600 hover:border-gray-500 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
