@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('page_title', 'Dashboard')

@section('content')
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Siswa -->
        <div class="stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-sm mb-1">Total Siswa</p>
                    <p class="text-3xl font-bold text-white">{{ $totalStudents ?? 0 }}</p>
                    <p class="text-xs text-green-400 mt-2">
                        <i class="fas fa-arrow-up"></i> +12% dari bulan lalu
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
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Quick Actions -->
        <div class="lg:col-span-2">
            <div class="card-cosmic rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-bolt icon-cosmic"></i>
                    Akses Cepat
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.students.index') }}" class="group p-4 bg-gradient-to-br from-purple-900 to-purple-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-purple-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-user-plus text-2xl text-purple-400 group-hover:text-purple-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tambah Siswa</p>
                    </a>

                    <a href="{{ route('admin.teachers.index') }}" class="group p-4 bg-gradient-to-br from-blue-900 to-blue-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-blue-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-user-tie text-2xl text-blue-400 group-hover:text-blue-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tambah Guru</p>
                    </a>

                    <a href="{{ route('admin.majors.index') }}" class="group p-4 bg-gradient-to-br from-green-900 to-green-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-green-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-plus text-2xl text-green-400 group-hover:text-green-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tambah Jurusan</p>
                    </a>

                    <a href="{{ route('admin.articles.index') }}" class="group p-4 bg-gradient-to-br from-indigo-900 to-indigo-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-indigo-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-pen text-2xl text-indigo-400 group-hover:text-indigo-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tulis Artikel</p>
                    </a>

                    <a href="{{ route('admin.positions.index') }}" class="group p-4 bg-gradient-to-br from-orange-900 to-orange-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-orange-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-sitemap text-2xl text-orange-400 group-hover:text-orange-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Kelola Jabatan</p>
                    </a>

                    <a href="{{ route('admin.about-school.index') }}" class="group p-4 bg-gradient-to-br from-pink-900 to-pink-800 bg-opacity-50 rounded-lg hover:bg-opacity-100 transition border border-pink-500 border-opacity-30 hover:border-opacity-100">
                        <i class="fas fa-info-circle text-2xl text-pink-400 group-hover:text-pink-300 mb-2 block"></i>
                        <p class="text-sm font-semibold text-white">Tentang Sekolah</p>
                    </a>
                </div>
            </div>

            <!-- Welcome Card -->
            <div class="card-cosmic rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}! 👋</h2>
                        <p class="text-gray-400">Kelola data sekolah Anda dengan mudah dan efisien melalui dashboard yang intuitif.</p>
                    </div>
                    <div class="hidden lg:block text-6xl opacity-20">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="card-cosmic rounded-lg p-6">
            <h2 class="text-xl font-bold text-white mb-6 flex items-center gap-2">
                <i class="fas fa-chart-circle icon-cosmic"></i>
                Statistik Cepat
            </h2>

            <div class="space-y-4">
                <!-- Stat Item 1 -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm text-gray-400">Siswa Aktif</p>
                        <p class="text-xs font-semibold text-purple-300">85%</p>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-purple-500 to-purple-700 h-2 rounded-full" style="width: 85%;"></div>
                    </div>
                </div>

                <!-- Stat Item 2 -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm text-gray-400">Data Lengkap</p>
                        <p class="text-xs font-semibold text-green-300">92%</p>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-green-500 to-green-700 h-2 rounded-full" style="width: 92%;"></div>
                    </div>
                </div>

                <!-- Stat Item 3 -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm text-gray-400">Artikel Terbaru</p>
                        <p class="text-xs font-semibold text-blue-300">78%</p>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-700 h-2 rounded-full" style="width: 78%;"></div>
                    </div>
                </div>

                <!-- Stat Item 4 -->
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-sm text-gray-400">Konten Sekolah</p>
                        <p class="text-xs font-semibold text-orange-300">95%</p>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-gradient-to-r from-orange-500 to-orange-700 h-2 rounded-full" style="width: 95%;"></div>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="my-6 border-t border-purple-500 border-opacity-20"></div>

            <!-- Quick Info -->
            <div class="space-y-3 text-sm">
                <div class="flex items-center justify-between">
                    <span class="text-gray-400">Last Update</span>
                    <span class="text-purple-300 font-semibold">{{ now()->format('d M Y') }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-400">Server Status</span>
                    <span class="inline-block px-2 py-1 bg-green-500 bg-opacity-20 text-green-300 rounded text-xs font-semibold">
                        <i class="fas fa-circle text-green-400"></i> Online
                    </span>
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
                Siswa Terbaru
            </h2>
            <div class="space-y-3 max-h-80 overflow-y-auto">
                @forelse($latestStudents ?? [] as $student)
                    <div class="flex items-center justify-between p-3 bg-gray-900 bg-opacity-30 rounded hover:bg-opacity-50 transition">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{-- {{ substr($student->name ?? 'S', 0, 1) }} --}}
                                <img src="{{ asset('storage/students/' . $student->student_picture) }}" alt="{{ $student->name }}" class="rounded-full w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-white">{{ $student->name ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-400">{{ $student->nisn ?? 'NISN N/A' }}</p>
                            </div>
                        </div>
                        <span class="text-xs text-purple-300">Baru</span>
                    </div>
                @empty
                    <p class="text-center text-gray-400 py-8">Tidak ada data siswa</p>
                @endforelse
            </div>
            <a href="{{ route('admin.students.index') }}" class="mt-4 block text-center text-purple-400 hover:text-purple-300 text-sm font-semibold transition">
                Lihat Semua Siswa →
            </a>
        </div>

        <!-- Latest Articles -->
        <div class="card-cosmic rounded-lg p-6">
            <h2 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                <i class="fas fa-newspaper-clock icon-cosmic"></i>
                Artikel Terbaru
            </h2>
            <div class="space-y-3 max-h-80 overflow-y-auto">
                @forelse($latestArticles ?? [] as $article)
                    <div class="p-3 bg-gray-900 bg-opacity-30 rounded hover:bg-opacity-50 transition">
                        <p class="text-sm font-semibold text-white mb-1">{{ $article->judul_artikel ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-400 line-clamp-2">{{ $article->isi_artikel ?? 'N/A' }}</p>
                    </div>
                @empty
                    <p class="text-center text-gray-400 py-8">Tidak ada data artikel</p>
                @endforelse
            </div>
            <a href="{{ route('admin.articles.index') }}" class="mt-4 block text-center text-purple-400 hover:text-purple-300 text-sm font-semibold transition">
                Lihat Semua Artikel →
            </a>
        </div>
    </div>
@endsection
