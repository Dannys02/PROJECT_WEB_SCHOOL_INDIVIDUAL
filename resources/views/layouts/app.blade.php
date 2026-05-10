<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            min-height: 100vh;
        }

        .cosmic-bg {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        }

        .sidebar-gradients {
            background: linear-gradient(180deg, rgba(15, 12, 41, 0.95) 0%, rgba(48, 43, 99, 0.9) 100%);
            border-right: 1px solid rgba(168, 85, 247, 0.2);
        }

        .sidebar-gradients::-webkit-scrollbar {
            background: transparent;
            border-radius: 10px;
        }

        .tables::-webkit-scrollbar {
            /* background: rgba(168, 85, 247, 0.1); */
            background: transparent;
            border-radius: 10px;
        }

        .sidebar-menu-item {
            position: relative;
            transition: all 0.3s ease;
            color: #d1d5db;
        }

        .sidebar-menu-item:hover {
            color: #a855f7;
            background: rgba(168, 85, 247, 0.1);
            padding-left: 1.5rem;
        }

        .sidebar-menu-item.active {
            background: rgba(168, 85, 247, 0.2);
            border-left: 3px solid #a855f7;
            color: #a855f7;
        }

        .card-cosmic {
            background: linear-gradient(135deg, rgba(30, 27, 75, 0.8) 0%, rgba(40, 35, 85, 0.8) 100%);
            border: 1px solid rgba(168, 85, 247, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .card-cosmic:hover {
            border-color: rgba(168, 85, 247, 0.6);
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.2);
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(30, 27, 75, 0.8) 0%, rgba(40, 35, 85, 0.8) 100%);
            border: 1px solid rgba(168, 85, 247, 0.3);
            border-radius: 1rem;
            padding: 1.5rem;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(168, 85, 247, 0.6);
            box-shadow: 0 10px 30px rgba(168, 85, 247, 0.2);
        }

        .button-cosmic {
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            transition: all 0.3s ease;
            border: none;
        }

        .button-cosmic:hover {
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            box-shadow: 0 0 25px rgba(168, 85, 247, 0.5);
            transform: translateY(-2px);
        }

        .button-cosmic:active {
            transform: translateY(0);
        }

        .icon-cosmic {
            color: #a855f7;
        }

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

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 1;
            }
        }

        .nav-brand {
            font-weight: 700;
            font-size: 1.25rem;
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .table-cosmic {
            background: rgba(15, 12, 41, 0.5);
            border: 1px solid rgba(168, 85, 247, 0.2);
        }

        .table-cosmic thead {
            background: rgba(168, 85, 247, 0.1);
            border-bottom: 2px solid rgba(168, 85, 247, 0.3);
        }

        .table-cosmic tbody tr {
            border-bottom: 1px solid rgba(168, 85, 247, 0.15);
            transition: all 0.3s ease;
        }

        .table-cosmic tbody tr:hover {
            background: rgba(168, 85, 247, 0.1);
        }

        .form-input-cosmic {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(168, 85, 247, 0.3);
            color: white;
            transition: all 0.3s ease;
        }

        .form-input-cosmic:hover {
            border-color: rgba(168, 85, 247, 0.6);
            background: rgba(255, 255, 255, 0.08);
        }

        .form-input-cosmic:focus {
            outline: none;
            border-color: rgba(168, 85, 247, 1);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.3);
        }

        .form-input-cosmic::placeholder {
            color: rgba(168, 85, 247, 0.5);
        }

        .header-dashboard {
            background: linear-gradient(135deg, rgba(30, 27, 75, 0.8) 0%, rgba(40, 35, 85, 0.8) 100%);
            border-bottom: 1px solid rgba(168, 85, 247, 0.2);
        }

        .breadcrumb-cosmic {
            color: #a855f7;
        }

        @media (max-width: 768px) {
            .sidebar-mobile {
                position: fixed;
                left: -100%;
                transition: left 0.3s ease;
                z-index: 50;
            }

            .sidebar-mobile.active {
                left: 0;
            }
        }

        .note-editor .note-editable {
            background-color: white !important;
            color: black !important;
        }

        .note-editor .note-toolbar {
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="cosmic-bg">
    <!-- Decorative Stars -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="stars" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="stars" style="top: 20%; right: 15%; animation-delay: 0.5s;"></div>
        <div class="stars" style="top: 50%; left: 5%; animation-delay: 1s;"></div>
        <div class="stars" style="top: 70%; right: 10%; animation-delay: 1.5s;"></div>
        <div class="stars" style="bottom: 20%; left: 20%; animation-delay: 2s;"></div>
        <div class="stars" style="bottom: 10%; right: 25%; animation-delay: 0.3s;"></div>
    </div>

    <div class="flex h-screen overflow-hidden relative z-10">
        <!-- Sidebar -->
        <div class="sidebar-gradients sidebar-mobile w-full md:w-64 h-screen overflow-y-auto fixed md:relative">
            <!-- Logo/Brand -->
            <div class="p-6 border-b border-purple-500 border-opacity-20">
                <div class="flex items-center justify-between">
                    <div class="nav-brand flex items-center gap-2">
                        @if ($globalSchool && $globalSchool->logo_school)
                            <img src="{{ asset('storage/logos/' . $globalSchool->logo_school) }}"
                                alt="{{ $globalSchool->school_name }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div
                                class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center">
                                <i class="fas fa-school text-white"></i>
                            </div>
                        @endif

                        <span class="uppercase text-xs">{{ $globalSchool->school_name ?? 'Nama Sekolah' }}</span>
                    </div>
                    <button class="md:hidden text-gray-300 hover:text-purple-400" onclick="toggleSidebar()">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- User Info -->
            <div class="p-4 border-b border-purple-500 border-opacity-20">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-full flex items-center justify-center">
                        @if ($globalUser && $globalUser->profile_photo)
                            <img src="{{ asset('storage/profile-photos/' . $globalUser->profile_photo) }}"
                                alt="{{ $globalUser->name }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-purple-200">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <p class="text-xs text-gray-400">Administrator</p>
                    </div>
                </div>
            </div>

            <!-- Menu Items -->
            <nav class="mt-6 px-4">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.dashboard')) active @endif">
                    <i class="fas fa-chart-line w-5"></i>
                    <span class="ml-3">Dashboard</span>
                </a>

                <!-- Siswa -->
                <a href="{{ route('admin.students.index') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.students.*')) active @endif">
                    <i class="fas fa-users w-5"></i>
                    <span class="ml-3">Siswa</span>
                </a>

                <!-- Guru -->
                <a href="{{ route('admin.teachers.index') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.teachers.*')) active @endif">
                    <i class="fas fa-chalkboard-user w-5"></i>
                    <span class="ml-3">Guru</span>
                </a>

                <!-- Jurusan -->
                <a href="{{ route('admin.majors.index') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.majors.*')) active @endif">
                    <i class="fas fa-book w-5"></i>
                    <span class="ml-3">Jurusan</span>
                </a>

                <!-- Jabatan -->
                <a href="{{ route('admin.positions.index') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.positions.*')) active @endif">
                    <i class="fas fa-briefcase w-5"></i>
                    <span class="ml-3">Jabatan</span>
                </a>

                <!-- Artikel -->
                <a href="{{ route('admin.articles.index') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.articles.*')) active @endif">
                    <i class="fas fa-newspaper w-5"></i>
                    <span class="ml-3">Artikel</span>
                </a>

                <!-- Tentang Sekolah -->
                <a href="{{ route('admin.about-school.index') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.about-school.*')) active @endif">
                    <i class="fas fa-school w-5"></i>
                    <span class="ml-3">Tentang Sekolah</span>
                </a>

                <!-- Pengaturan -->
                <a href="{{ route('admin.settings') }}"
                    class="sidebar-menu-item block px-4 py-3 rounded-lg mb-2 @if (request()->routeIs('admin.settings')) active @endif">
                    <i class="fas fa-gear w-5"></i>
                    <span class="ml-3">Pengaturan</span>
                </a>
            </nav>

            <!-- Divider -->
            <div class="my-6 mx-4 border-t border-purple-500 border-opacity-20"></div>

            <!-- Logout -->
            <div class="px-4 mb-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="sidebar-menu-item w-full text-left text-red-600 px-4 py-3 rounded-lg hover:bg-red-600 hover:bg-opacity-20">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span class="ml-3">Keluar</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Header -->
            <div class="header-dashboard sticky top-0 z-40">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center gap-4">
                        <button class="md:hidden text-gray-300 hover:text-purple-400 text-xl" onclick="toggleSidebar()">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h1 class="text-2xl font-bold text-white">@yield('page_title', 'Admin Dashboard')</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        @if ($globalUser && $globalUser->profile_photo)
                            <img src="{{ asset('storage/profile-photos/' . $globalUser->profile_photo) }}"
                                alt="{{ $globalUser->name }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-white"></i>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-6 min-h-screen">
                {{-- @if ($errors->any())
                    <div id="error-alert" class="mb-6 p-4 bg-red-500 bg-opacity-20 border border-red-500 border-opacity-50 rounded-lg">
                        <h3 class="text-red-300 font-semibold mb-2">Ada beberapa kesalahan:</h3>
                        <ul class="text-red-200 text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                @if (session('success'))
                    <div id="success-alert"
                        class="mb-6 p-4 bg-green-500 bg-opacity-20 border border-green-500 border-opacity-50 rounded-lg">
                        <p class="text-green-300 flex items-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </p>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Summernote Lite -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar-mobile');
            sidebar.classList.toggle('active');
        }

        // Close sidebar when clicking on a menu item on mobile
        document.querySelectorAll('.sidebar-menu-item').forEach(item => {
            item.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    document.querySelector('.sidebar-mobile').classList.remove('active');
                }
            });
        });

        setTimeout(() => {
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');

            if (successAlert) {
                successAlert.style.display = 'none';
            }

            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 5000);

        $(document).ready(function() {
            $('#editor').summernote({
                height: 300,

                callbacks: {
                    onPaste: function(e) {

                        let bufferText = (
                            (e.originalEvent || e).clipboardData || window.clipboardData
                        ).getData('Text');

                        e.preventDefault();

                        document.execCommand('insertText', false, bufferText);
                    }
                }
            });
        });
    </script>
</body>

</html>
