@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')
    <!-- Welcome Card -->
    <div class="card-cosmic rounded-lg p-6  mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!
                    👋</h2>
                <p class="text-gray-400">Kelola data sekolah Anda dengan mudah dan efisien melalui dashboard yang
                    intuitif.</p>
            </div>
            <div class="hidden lg:block text-6xl opacity-20">
                <i class="fas fa-graduation-cap"></i>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Siswa -->
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Siswa</p>
                    <p class="text-3xl font-bold text-white">{{ $totalStudents ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">
                        <i class="fas fa-graduation-cap"></i>
                        Siswa aktif
                    </p>
                </div>
                <div class="text-5xl icon-cosmic">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <!-- Total Guru -->
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Guru</p>
                    <p class="text-3xl font-bold text-white">{{ $totalTeachers ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">
                        <i class="fas fa-user"></i> Staf mengajar
                    </p>
                </div>
                <div class="text-5xl icon-cosmic">
                    <i class="fas fa-chalkboard-user"></i>
                </div>
            </div>
        </div>

        <!-- Total Jurusan -->
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Jurusan</p>
                    <p class="text-3xl font-bold text-white">{{ $totalMajors ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-2">
                        <i class="fas fa-book"></i> Program studi
                    </p>
                </div>
                <div class="text-5xl icon-cosmic">
                    <i class="fas fa-book"></i>
                </div>
            </div>
        </div>

        <!-- Total Artikel -->
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Artikel</p>
                    <p class="text-3xl font-bold text-white">{{ $totalArticles ?? 0 }}</p>
                    <p class="text-xs text-blue-400 mt-2">
                        <i class="fas fa-newspaper"></i> Artikel sekolah
                    </p>
                </div>
                <div class="text-5xl icon-cosmic">
                    <i class="fas fa-newspaper"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Access & Recent Activities -->
    <div class="w-full">

        <!-- Quick Actions -->
        <div>
            <div class="card-cosmic rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-bolt icon-cosmic"></i>
                    Akses Cepat
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.students.index') }}"
                        class="group p-4 bg-gradient-to-br from-purple-900 to-purple-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-purple-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-user-plus text-2xl text-purple-400 group-hover:text-purple-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tambah Siswa</p>
                    </a>

                    <a href="{{ route('admin.teachers.index') }}"
                        class="group p-4 bg-gradient-to-br from-blue-900 to-blue-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-blue-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-user-tie text-2xl text-blue-400 group-hover:text-blue-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tambah Guru</p>
                    </a>

                    <a href="{{ route('admin.majors.index') }}"
                        class="group p-4 bg-gradient-to-br from-green-900 to-green-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-green-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-plus text-2xl text-green-400 group-hover:text-green-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tambah Jurusan</p>
                    </a>

                    <a href="{{ route('admin.articles.index') }}"
                        class="group p-4 bg-gradient-to-br from-indigo-900 to-indigo-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-indigo-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-pen text-2xl text-indigo-400 group-hover:text-indigo-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tulis Artikel</p>
                    </a>

                    <a href="{{ route('admin.positions.index') }}"
                        class="group p-4 bg-gradient-to-br from-orange-900 to-orange-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-orange-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-sitemap text-2xl text-orange-400 group-hover:text-orange-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Kelola Jabatan</p>
                    </a>

                    <a href="{{ route('admin.about-school.index') }}"
                        class="group p-4 bg-gradient-to-br from-pink-900 to-pink-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-pink-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-info-circle text-2xl text-pink-400 group-hover:text-pink-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tentang Sekolah</p>
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- Latest Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
        <!-- Latest Students -->
        <div class="card-cosmic rounded-lg p-6">
            <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                <i class="fas fa-user-clock icon-cosmic"></i>
                User Terbaru
            </h2>
            <div class="tables space-y-3 max-h-80 overflow-y-auto">
                @forelse($latestUsers ?? [] as $user)
                    @php
                        $isStudent = isset($user->nisn);

                        $photo = $isStudent ? $user->student_picture : $user->teacher_picture;

                        $photoPath = $photo
                            ? asset('storage/' . ($isStudent ? 'students/' : 'teachers/') . $photo)
                            : null;
                    @endphp

                    <div
                        class="flex items-center justify-between p-3 bg-gray-900/30 rounded hover:bg-opacity-50 transition">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full overflow-hidden flex items-center justify-center">

                                @if ($photoPath)
                                    <img src="{{ $photoPath }}" class="aspect-square h-full w-full object-cover">
                                @else
                                    <i class="fas fa-user text-white text-sm"></i>
                                @endif
                            </div>

                            <div>
                                <p class="text-sm font-semibold text-white">
                                    {{ $user->name ?? 'Tidak ada' }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $isStudent ? $user->nisn : 'Guru' }}
                                </p>
                            </div>
                        </div>

                        <span class="text-xs text-purple-300">
                            Baru
                        </span>
                    </div>

                @empty
                    <p class="text-center text-gray-400 py-8">
                        Tidak ada data
                    </p>
                @endforelse
            </div>
            {{-- <a href="{{ route('admin.students.index') }}"
                class="mt-4 block text-center text-purple-400 hover:text-purple-300 text-sm font-semibold transition">
                Lihat Semua Siswa →
            </a> --}}
        </div>

        <!-- Latest Articles -->
        <div class="card-cosmic rounded-lg p-6">
            <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                <i class="fas fa-newspaper-clock icon-cosmic"></i>
                Artikel Terbaru
            </h2>
            <div class="tables space-y-3 max-h-80 overflow-y-auto">
                @forelse($latestArticles ?? [] as $article)
                    <div class="p-3 bg-gray-900 bg-opacity-30 rounded hover:bg-opacity-50 transition">
                        <p class="text-sm font-semibold text-white mb-1">{{ $article->title ?? 'Tidak ada' }}</p>
                        <p class="text-xs text-gray-400 line-clamp-2">{!! $article->article ?? 'Tidak ada' !!}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-400 py-8">Tidak ada data artikel</p>
                @endforelse
            </div>
            <a href="{{ route('admin.articles.index') }}"
                class="mt-4 block text-center text-purple-400 hover:text-purple-300 text-sm font-semibold transition">
                Lihat Semua Artikel →
            </a>
        </div>
    </div>
@endsection
