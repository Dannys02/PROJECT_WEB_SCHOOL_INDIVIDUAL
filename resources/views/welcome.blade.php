<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $schoolInfo->school_name ?? 'Sekolah' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            background-attachment: fixed;
            min-height: 100vh;
            color: white;
        }

        .cosmic-bg {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            background-attachment: fixed;
        }

        /* Modern Glassmorphism Card */
        .cosmic-card {
            background: rgba(30, 27, 75, 0.4);
            border: 1px solid rgba(168, 85, 247, 0.25);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .cosmic-card:hover {
            background: rgba(30, 27, 75, 0.6);
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 8px 32px rgba(168, 85, 247, 0.15);
            transform: translateY(-8px);
        }

        /* Modern Buttons */
        .button-cosmic {
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
            border: none;
            color: white;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .button-cosmic::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .button-cosmic:hover::before {
            left: 0;
        }

        .button-cosmic:hover {
            box-shadow: 0 8px 24px rgba(168, 85, 247, 0.4);
            transform: translateY(-2px);
        }

        .button-outline-cosmic {
            border: 2px solid rgba(168, 85, 247, 0.8);
            color: rgba(168, 85, 247, 0.9);
            background: rgba(168, 85, 247, 0.05);
            transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
            font-weight: 600;
        }

        .button-outline-cosmic:hover {
            background: rgba(168, 85, 247, 0.15);
            border-color: rgba(168, 85, 247, 1);
            color: #f0f0f0;
            box-shadow: 0 4px 16px rgba(168, 85, 247, 0.2);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.08) 0%, rgba(139, 92, 246, 0.03) 50%, transparent 100%);
            border-bottom: 1px solid rgba(168, 85, 247, 0.1);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-text {
            animation: fadeInUp 0.8s ease-out;
            position: relative;
            z-index: 2;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.1rem;
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 0.5px;
        }

        .navbar {
            background: linear-gradient(180deg, rgba(15, 12, 41, 0.7) 0%, rgba(48, 43, 99, 0.5) 100%);
            border-bottom: 1px solid rgba(168, 85, 247, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Section Title */
        .section-title {
            position: relative;
            display: inline-block;
            justify-content: center;
            align-items: center;
            font-weight: 800;
            font-size: 2.5rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 5px;
            background: linear-gradient(90deg, #a855f7, #8b5cf6);
            border-radius: 3px;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        }

        /* Cards Styling */
        .teacher-card {
            position: relative;
            overflow: hidden;
            group: true;
        }

        .teacher-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .teacher-card:hover .teacher-image {
            transform: scale(1.08);
        }

        .article-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .article-card:hover .article-image {
            transform: scale(1.08);
        }

        /* Stats Box */
        .stat-box {
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.15) 0%, rgba(139, 92, 246, 0.08) 100%);
            border: 1px solid rgba(168, 85, 247, 0.25);
            padding: 2.5rem 2rem;
            text-align: center;
            border-radius: 1rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-box::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.1), transparent);
            transition: all 0.4s ease;
        }

        .stat-box:hover {
            border-color: rgba(168, 85, 247, 0.5);
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.25) 0%, rgba(139, 92, 246, 0.15) 100%);
            box-shadow: 0 12px 32px rgba(168, 85, 247, 0.2);
            transform: translateY(-6px);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
            margin: 0.5rem 0;
        }

        .stat-label {
            font-size: 1rem;
            color: rgba(200, 200, 200, 0.9);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            z-index: 2;
        }

        .footer-section {
            border-top: 1px solid rgba(168, 85, 247, 0.15);
            padding-top: 3.5rem;
            background: linear-gradient(180deg, transparent 0%, rgba(15, 12, 41, 0.3) 100%);
        }

        /* Decorative Elements */
        .stars {
            position: fixed;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
            pointer-events: none;
        }

        @keyframes twinkle {
            0%, 100% {
                opacity: 0.2;
            }
            50% {
                opacity: 1;
            }
        }

        .gradient-text {
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Responsiveness */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 1.75rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .teacher-image {
                height: 220px;
            }

            .article-image {
                height: 180px;
            }
        }
            </style>
    </head>
<body class="cosmic-bg scroll-smooth">
    <!-- Decorative Stars -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="stars" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="stars" style="top: 20%; right: 15%; animation-delay: 0.5s;"></div>
        <div class="stars" style="top: 50%; left: 5%; animation-delay: 1s;"></div>
        <div class="stars" style="top: 70%; right: 10%; animation-delay: 1.5s;"></div>
        <div class="stars" style="bottom: 20%; left: 20%; animation-delay: 2s;"></div>
        <div class="stars" style="bottom: 10%; right: 25%; animation-delay: 0.3s;"></div>
    </div>

    <!-- Navbar -->
    <nav class="navbar sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    @if ($schoolInfo && $schoolInfo->logo_school)
                        <img src="{{ asset('storage/logos/' . $schoolInfo->logo_school) }}"
                             alt="{{ $schoolInfo->school_name }}"
                             class="w-12 h-12 rounded-full object-cover" loading="lazy">
                    @else
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                            <i class="fas fa-school text-white text-lg"></i>
                        </div>
                    @endif
                    <div>
                        <h1 class="nav-brand uppercase text-sm font-bold">
                            {{ $schoolInfo->school_name ?? 'Sekolah' }}
                        </h1>
                        <p class="text-xs text-gray-400">Good skill, good atitude</p>
                    </div>
                </div>

                <!-- Nav Links & Auth -->
                <div class="hidden md:flex items-center gap-6">
                    <a href="#" class="text-gray-300 hover:text-purple-400 transition">Beranda</a>
                    <a href="#about" class="text-gray-300 hover:text-purple-400 transition">Tentang</a>
                    <a href="#majors" class="text-gray-300 hover:text-purple-400 transition">Jurusan</a>
                    <a href="#teachers" class="text-gray-300 hover:text-purple-400 transition">Guru</a>
                    <a href="#articles" class="text-gray-300 hover:text-purple-400 transition">Artikel</a>

                    {{-- @auth
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-purple-400 transition">
                                <i class="fas fa-cog"></i> Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="button-cosmic px-6 py-2 rounded-lg text-sm">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="button-outline-cosmic px-6 py-2 rounded-lg text-sm">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="button-cosmic px-6 py-2 rounded-lg text-sm">
                            Daftar
                        </a>
                    @endauth --}}
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="md:hidden text-gray-300 hover:text-purple-400" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4 border-t border-purple-500 border-opacity-20">
                <a href="#about" class="block py-2 text-gray-300 hover:text-purple-400">Tentang</a>
                <a href="#majors" class="block py-2 text-gray-300 hover:text-purple-400">Jurusan</a>
                <a href="#teachers" class="block py-2 text-gray-300 hover:text-purple-400">Guru</a>
                <a href="#articles" class="block py-2 text-gray-300 hover:text-purple-400">Artikel</a>
                <div class="pt-2 border-t border-purple-500 border-opacity-20 mt-4">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-300 hover:text-purple-400">
                            <i class="fas fa-cog"></i> Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="button-cosmic w-full px-4 py-2 rounded-lg text-sm mt-2">
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block button-outline-cosmic px-4 py-2 rounded-lg text-sm mb-2 text-center">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="block button-cosmic px-4 py-2 rounded-lg text-sm text-center">
                            Daftar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 lg:gap-16 items-center">
                <!-- Left Content -->
                <div class="hero-text space-y-8">
                    <div>
                        <span class="text-sm font-bold text-purple-400 uppercase tracking-widest">Selamat Datang</span>
                        <h2 class="text-5xl md:text-6xl lg:text-7xl font-black mt-3 leading-tight">
                            <span class="gradient-text">{{ $schoolInfo->school_name ?? 'Sekolah' }}</span>
                        </h2>
                    </div>

                    <p class="text-lg text-gray-300 leading-relaxed max-w-xl">
                        {{ $schoolInfo->about_school ? Str::limit($schoolInfo->about_school, 150) : 'Membangun generasi masa depan dengan pendidikan berkualitas, inovatif, dan berkarakter.' }}
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="#about" class="button-cosmic px-8 py-4 rounded-xl text-base inline-flex items-center justify-center gap-2 group">
                            <span>Pelajari Lebih Lanjut</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="mailto:sekolah@example.com" class="button-outline-cosmic px-8 py-4 rounded-xl text-base inline-flex items-center justify-center gap-2">
                            <i class="fas fa-envelope"></i>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="cosmic-card p-6 lg:p-8 rounded-2xl overflow-hidden h-full min-h-96">
                    @if ($schoolInfo && $schoolInfo->logo_school)
                        <img src="{{ asset('storage/logos/' . $schoolInfo->logo_school) }}"
                             alt="{{ $schoolInfo->school_name }}"
                             class="w-full h-full object-cover rounded-xl"
                             onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 400 400%22><rect fill=%22%23a855f7%22 width=%22400%22 height=%22400%22/><text x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22Poppins%22 font-size=%2248%22 fill=%22white%22 font-weight=%22bold%22>LOGO</text></svg>'" loading="lazy">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-purple-500 via-purple-600 to-purple-700 rounded-xl flex items-center justify-center">
                            <i class="fas fa-school text-white text-9xl opacity-40"></i>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats-section py-24 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-6 lg:gap-8">
                <!-- Total Stats -->
                <div class="stat-box group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-purple-500/20 to-purple-600/10 group-hover:from-purple-500/30 group-hover:to-purple-600/20 transition-all duration-300">
                            <i class="fas fa-graduation-cap text-purple-400 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-purple-400 uppercase tracking-widest">Sekolah</span>
                    </div>
                    <div class="stat-number text-4xl font-black">1</div>
                    <p class="stat-label mt-3 text-gray-400">Institusi Pendidikan</p>
                </div>

                <!-- Majors Stats -->
                <div class="stat-box group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-blue-500/20 to-blue-600/10 group-hover:from-blue-500/30 group-hover:to-blue-600/20 transition-all duration-300">
                            <i class="fas fa-book text-blue-400 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-blue-400 uppercase tracking-widest">Program</span>
                    </div>
                    <div class="stat-number text-4xl font-black">{{ $stats['majors'] ?? 0 }}</div>
                    <p class="stat-label mt-3 text-gray-400">Program Studi</p>
                </div>

                <!-- Teachers Stats -->
                <div class="stat-box group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-green-500/20 to-green-600/10 group-hover:from-green-500/30 group-hover:to-green-600/20 transition-all duration-300">
                            <i class="fas fa-chalkboard-user text-green-400 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-green-400 uppercase tracking-widest">Tim</span>
                    </div>
                    <div class="stat-number text-4xl font-black">{{ $stats['teachers'] ?? 0 }}</div>
                    <p class="stat-label mt-3 text-gray-400">Guru Berpengalaman</p>
                </div>

                <!-- Articles Stats -->
                <div class="stat-box group">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-gradient-to-br from-pink-500/20 to-pink-600/10 group-hover:from-pink-500/30 group-hover:to-pink-600/20 transition-all duration-300">
                            <i class="fas fa-newspaper text-pink-400 text-2xl"></i>
                        </div>
                        <span class="text-xs font-bold text-pink-400 uppercase tracking-widest">Berita</span>
                    </div>
                    <div class="stat-number text-4xl font-black">{{ $stats['articles'] ?? 0 }}</div>
                    <p class="stat-label mt-3 text-gray-400">Artikel & Berita</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About School Section -->
    <section id="about" class="about-section py-24 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col items-center flex flex-col items-center mb-16 text-center">
                <span class="text-sm font-bold text-purple-400 uppercase tracking-widest">Tentang Kami</span>
                <h2 class="section-title text-5xl md:text-6xl font-black mt-4 mb-6">Visi & Misi Sekolah</h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">Membangun generasi masa depan dengan pendidikan berkualitas, inovatif, dan berkarakter</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 lg:gap-12 mb-12">
                <!-- Vision Card -->
                <div class="cosmic-card p-8 lg:p-10 rounded-2xl overflow-hidden group">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="p-4 rounded-xl bg-gradient-to-br from-purple-500/20 to-purple-600/10 group-hover:from-purple-500/30 group-hover:to-purple-600/20 transition-all duration-300">
                            <i class="fas fa-telescope text-purple-400 text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-purple-300 mb-2">Visi Kami</h3>
                            <div class="w-12 h-1 bg-gradient-to-r from-purple-500 to-transparent rounded-full"></div>
                        </div>
                    </div>
                    <p class="text-gray-300 text-lg leading-relaxed mt-6">
                        Menjadi sekolah terdepan dalam menciptakan sumber daya manusia yang berkualitas, berakhlak mulia, dan siap menghadapi tantangan global dengan inovasi berkelanjutan.
                    </p>
                </div>

                <!-- Mission Card -->
                <div class="cosmic-card p-8 lg:p-10 rounded-2xl overflow-hidden group">
                    <div class="flex items-start gap-4 mb-6">
                        <div class="p-4 rounded-xl bg-gradient-to-br from-blue-500/20 to-blue-600/10 group-hover:from-blue-500/30 group-hover:to-blue-600/20 transition-all duration-300">
                            <i class="fas fa-compass text-blue-400 text-3xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-blue-300 mb-2">Misi Kami</h3>
                            <div class="w-12 h-1 bg-gradient-to-r from-blue-500 to-transparent rounded-full"></div>
                        </div>
                    </div>
                    <p class="text-gray-300 text-lg leading-relaxed mt-6">
                        Menyelenggarakan pendidikan yang inklusif, inovatif, dan berorientasi pada pengembangan kompetensi akademik, keterampilan, dan karakter siswa yang kuat.
                    </p>
                </div>
            </div>

            <!-- About Text Card -->
            <div class="cosmic-card p-8 lg:p-12 rounded-2xl">
                <p class="text-gray-200 text-lg leading-relaxed">
                    {{ $schoolInfo->about_school ?? 'Sekolah kami berkomitmen penuh untuk memberikan pendidikan terbaik kepada semua siswa. Dengan fasilitas modern, guru-guru berpengalaman, dan kurikulum yang komprehensif, kami memastikan setiap siswa mendapatkan kesempatan untuk berkembang sesuai dengan potensi unik mereka. Kami percaya bahwa pendidikan adalah kunci kesuksesan masa depan, dan kami berkomitmen untuk membimbing setiap siswa menuju masa depan yang cerah.' }}
                </p>
            </div>
        </div>
    </section>

    <!-- Majors Section -->
    <section id="majors" class="majors-section py-24 px-4 bg-gradient-to-b from-transparent via-purple-500/5 to-transparent">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col items-center mb-16 text-center">
                <span class="text-sm font-bold text-purple-400 uppercase tracking-widest">Program Unggulan</span>
                <h2 class="section-title text-5xl md:text-6xl font-black mt-4 mb-6">Program Jurusan Kami</h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">Pilih jurusan sesuai dengan minat, bakat, dan cita-cita Anda untuk masa depan gemilang</p>
            </div>

            @if ($majors->isNotEmpty())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($majors as $major)
                        <div class="cosmic-card rounded-2xl overflow-hidden group hover:border-purple-400/50 transition-all duration-300">
                            <!-- Image Container -->
                            <div class="relative h-48 overflow-hidden bg-gradient-to-br from-purple-600 to-blue-600">
                                @if ($major->major_logo)
                                    <img src="{{ asset('storage/majors/' . $major->major_logo) }}"
                                         alt="{{ $major->major_name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                         loading="lazy"
                                         onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 300 300%22><rect fill=%22url%23grad%22 width=%22300%22 height=%22300%22/><defs><linearGradient id=%22grad%22><stop offset=%220%25%22 style=%22stop-color:%239333ea%22/><stop offset=%22100%25%22 style=%22stop-color:%237c3aed%22/></linearGradient></defs><text x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22Poppins%22 font-size=%2232%22 fill=%22white%22 font-weight=%22bold%22>JURUSAN</text></svg>'">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-book text-white text-6xl opacity-30"></i>
                                    </div>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6 lg:p-8">
                                <h3 class="text-2xl font-bold text-white mb-2 group-hover:text-purple-300 transition-colors">
                                    {{ $major->major_name }}
                                </h3>
                                <div class="w-8 h-1 bg-gradient-to-r from-purple-500 to-transparent rounded-full mb-4 group-hover:from-purple-400 transition-colors"></div>

                                <p class="text-gray-300 text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{ $major->major_about ?? 'Program jurusan dengan kurikulum berkualitas internasional dan fasilitas pembelajaran terlengkap.' }}
                                </p>

                                <a href="#" class="button-cosmic w-full px-4 py-3 rounded-lg text-center font-semibold inline-flex items-center justify-center gap-2">
                                    <span>Pelajari Lebih</span>
                                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="cosmic-card p-12 rounded-2xl text-center">
                    <i class="fas fa-inbox text-6xl text-purple-400 mb-6 block opacity-50"></i>
                    <p class="text-gray-300 text-lg">Belum ada program jurusan yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Teachers Section -->
    <section id="teachers" class="teachers-section py-24 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col items-center mb-16 text-center">
                <span class="text-sm font-bold text-purple-400 uppercase tracking-widest">Pendidik Kami</span>
                <h2 class="section-title text-5xl md:text-6xl font-black mt-4 mb-6">Tim Guru Profesional</h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">Guru-guru berpengalaman dan berdedikasi siap membimbing perjalanan pendidikan Anda menuju kesuksesan</p>
            </div>

            @if ($teachers->isNotEmpty())
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($teachers as $teacher)
                        <div class="teacher-card cosmic-card rounded-2xl overflow-hidden group">
                            <!-- Image Container -->
                            <div class="relative h-72 overflow-hidden bg-gradient-to-br from-purple-600 to-blue-600">
                                @if ($teacher->teacher_picture)
                                    <img src="{{ asset('storage/teachers/' . $teacher->teacher_picture) }}"
                                         alt="{{ $teacher->name }}"
                                         class="teacher-image w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                         loading="lazy"
                                         onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 300 400%22><rect fill=%22%239333ea%22 width=%22300%22 height=%22400%22/><circle cx=%22150%22 cy=%22100%22 r=%2250%22 fill=%22rgba(255,255,255,0.2)%22/><rect x=%2250%22 y=%22180%22 width=%22200%22 height=%22150%22 rx=%2210%22 fill=%22rgba(255,255,255,0.2)%22/></svg>'">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-user text-white text-8xl opacity-20"></i>
                                    </div>
                                @endif
                                <!-- Overlay Gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-300"></div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-white group-hover:text-purple-300 transition-colors">{{ $teacher->name }}</h3>

                                @if ($teacher->position)
                                    <p class="text-purple-400 text-xs font-bold uppercase tracking-widest mt-1 mb-3">
                                        {{ $teacher->position->position_name }}
                                    </p>
                                @endif

                                @if ($teacher->major)
                                    <div class="inline-flex items-center gap-2 mb-3 px-3 py-1 rounded-full bg-purple-500/10 border border-purple-500/20">
                                        <i class="fas fa-book text-purple-400 text-xs"></i>
                                        <span class="text-gray-300 text-xs">{{ $teacher->major->major_name }}</span>
                                    </div>
                                @endif

                                @if ($teacher->lessons)
                                    <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                                        <i class="fas fa-graduation-cap text-purple-400 mr-1"></i>
                                        {{ $teacher->lessons }}
                                    </p>
                                @endif

                                @if ($teacher->social_media)
                                    <div class="flex gap-3 pt-4 border-t border-purple-500/20">
                                        @if (strpos($teacher->social_media, 'instagram') !== false)
                                            <a href="{{ $teacher->social_media }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-400 hover:bg-purple-500/30 hover:text-purple-300 transition-all duration-300">
                                                <i class="fab fa-instagram text-sm"></i>
                                            </a>
                                        @endif
                                        @if (strpos($teacher->social_media, 'facebook') !== false)
                                            <a href="{{ $teacher->social_media }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-400 hover:bg-purple-500/30 hover:text-purple-300 transition-all duration-300">
                                                <i class="fab fa-facebook text-sm"></i>
                                            </a>
                                        @endif
                                        @if (strpos($teacher->social_media, 'twitter') !== false)
                                            <a href="{{ $teacher->social_media }}" target="_blank" rel="noopener noreferrer" class="w-8 h-8 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-400 hover:bg-purple-500/30 hover:text-purple-300 transition-all duration-300">
                                                <i class="fab fa-twitter text-sm"></i>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="cosmic-card p-12 rounded-2xl text-center">
                    <i class="fas fa-users text-6xl text-purple-400 mb-6 block opacity-50"></i>
                    <p class="text-gray-300 text-lg">Belum ada data guru yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Articles Section -->
    <section id="articles" class="articles-section py-24 px-4 bg-gradient-to-b from-transparent via-purple-500/5 to-transparent">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col items-center mb-16 text-center">
                <span class="text-sm font-bold text-purple-400 uppercase tracking-widest">Informasi & Berita</span>
                <h2 class="section-title text-5xl md:text-6xl font-black mt-4 mb-6">Artikel Terbaru</h2>
                <p class="text-lg text-gray-400 max-w-2xl mx-auto">Perkembangan terkini dan informasi penting dari sekolah kami</p>
            </div>

            @if ($articles->isNotEmpty())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($articles as $article)
                        <div class="article-card cosmic-card rounded-2xl overflow-hidden group hover:border-purple-400/50 transition-all duration-300">
                            <!-- Image Container -->
                            <div class="relative h-56 overflow-hidden bg-gradient-to-br from-purple-600 to-pink-600">
                                @if ($article->image)
                                    <img src="{{ asset('storage/articles/' . $article->image) }}"
                                         alt="{{ $article->title }}"
                                         class="article-image w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                         loading="lazy"
                                         onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 300 300%22><rect fill=%22%23c084fc%22 width=%22300%22 height=%22300%22/><text x=%2250%25%22 y=%2250%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22Poppins%22 font-size=%2232%22 fill=%22white%22 font-weight=%22bold%22>ARTIKEL</text></svg>'">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-newspaper text-white text-6xl opacity-30"></i>
                                    </div>
                                @endif
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-300"></div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <!-- Category Badge -->
                                @if ($article->major)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 bg-gradient-to-r from-purple-500/20 to-purple-600/10 text-purple-300 text-xs font-bold rounded-full mb-3 border border-purple-500/30">
                                        <i class="fas fa-tag text-xs"></i>
                                        {{ $article->major->major_name }}
                                    </span>
                                @endif

                                <h3 class="text-xl font-bold text-white mb-3 line-clamp-2 group-hover:text-purple-300 transition-colors">{{ $article->title }}</h3>

                                <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-3">
                                    {{-- {!! Str::limit(strip_tags($article->article), 100) !!} --}}
                                    {!! $article->article !!}
                                </p>

                                <div class="flex items-center justify-between pt-4 border-t border-purple-500/20">
                                    <span class="text-gray-500 text-xs flex items-center gap-1">
                                        <i class="fas fa-calendar-days text-purple-400"></i>
                                        {{ $article->created_at->format('d M Y') }}
                                    </span>
                                    <a href="#" class="w-8 h-8 rounded-full bg-purple-500/10 flex items-center justify-center text-purple-400 hover:bg-purple-500/30 hover:text-purple-300 transition-all duration-300 group-hover:translate-x-1">
                                        <i class="fas fa-arrow-right text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="cosmic-card p-12 rounded-2xl text-center">
                    <i class="fas fa-newspaper text-6xl text-purple-400 mb-6 block opacity-50"></i>
                    <p class="text-gray-300 text-lg">Belum ada artikel yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-24 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="cosmic-card rounded-2xl p-8 md:p-16 text-center overflow-hidden relative">
                <!-- Background Decoration -->
                <div class="absolute top-0 right-0 w-96 h-96 bg-purple-500/5 rounded-full -mr-48 -mt-48 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-80 h-80 bg-blue-500/5 rounded-full -ml-40 -mb-40 pointer-events-none"></div>

                <div class="relative z-10">
                    <span class="text-sm font-bold text-purple-400 uppercase tracking-widest">Ambil Langkah Selanjutnya</span>
                    <h2 class="text-5xl md:text-6xl font-black mt-4 mb-6 leading-tight max-w-3xl mx-auto">
                        Tertarik Bergabung?
                    </h2>
                    <p class="text-lg text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                        Ambil langkah pertama menuju masa depan yang cerah dan gemilang. Daftar sekarang dan jadilah bagian dari keluarga besar kami yang terus berkembang.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register') }}" class="button-cosmic px-8 py-4 rounded-xl font-semibold inline-flex items-center justify-center gap-2 group">
                            <i class="fas fa-user-plus"></i>
                            <span>Daftar Sekarang</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="mailto:sekolah@example.com" class="button-outline-cosmic px-8 py-4 rounded-xl font-semibold inline-flex items-center justify-center gap-2">
                            <i class="fas fa-envelope"></i>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-section px-12 py-12 w-full mx-auto">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <!-- About -->
            <div>
                <h4 class="text-lg font-bold mb-4 text-purple-400">{{ $schoolInfo->school_name ?? 'Sekolah' }}</h4>
                <p class="text-gray-400 text-sm">Membangun generasi penerus bangsa yang berkarakter, kompeten, dan berjiwa nasionalisme.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-lg font-bold mb-4">Navigasi Cepat</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-purple-400 transition">Beranda</a></li>
                    <li><a href="#about" class="hover:text-purple-400 transition">Tentang Kami</a></li>
                    <li><a href="#majors" class="hover:text-purple-400 transition">Program Jurusan</a></li>
                    <li><a href="#teachers" class="hover:text-purple-400 transition">Guru</a></li>
                    <li><a href="#articles" class="hover:text-purple-400 transition">Artikel</a></li>
                </ul>
            </div>

            <!-- Programs -->
            <div>
                <h4 class="text-lg font-bold mb-4">Program</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    @foreach ($majors->take(4) as $major)
                        <li><a href="#majors" class="hover:text-purple-400 transition">{{ $major->major_name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-lg font-bold mb-4">Kontak</h4>
                <div class="space-y-3 text-sm text-gray-400">
                    <p><i class="fas fa-phone text-purple-400 mr-2"></i>(021) XXXX-XXXX</p>
                    <p><i class="fas fa-envelope text-purple-400 mr-2"></i>info@sekolah.sch.id</p>
                    <p><i class="fas fa-map-marker-alt text-purple-400 mr-2"></i>Jl. Sekolah No. 1, Kota</p>
                </div>
            </div>
        </div>

        <div class="border-t border-purple-500 border-opacity-20 pt-8 text-center">
            <p class="text-gray-500 text-sm">
                &copy; {{ date('Y') }} {{ $schoolInfo->school_name ?? 'Sekolah' }}. Semua hak dilindungi. |
                <a href="{{ route('login') }}" class="text-purple-400 hover:text-purple-300 transition">Admin Portal</a>
            </p>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking on links
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.add('hidden');
            });
        });
    </script>
</body>
</html>

    </body>
</html>
