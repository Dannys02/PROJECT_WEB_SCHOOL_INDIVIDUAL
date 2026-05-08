<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .cosmic-gradient {
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        }

        .glow-effect {
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.3),
                        0 0 60px rgba(139, 92, 246, 0.2);
        }

        .input-focus:focus {
            box-shadow: 0 0 20px rgba(168, 85, 247, 0.5), inset 0 0 10px rgba(168, 85, 247, 0.1);
        }

        .button-gradient {
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            transition: all 0.3s ease;
        }

        .button-gradient:hover {
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            box-shadow: 0 0 25px rgba(168, 85, 247, 0.5);
        }

        .stars {
            position: fixed;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .form-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(168, 85, 247, 0.3);
            transition: all 0.3s ease;
        }

        .form-input:hover {
            border-color: rgba(168, 85, 247, 0.6);
            background: rgba(255, 255, 255, 0.08);
        }

        .form-input:focus {
            border-color: rgba(168, 85, 247, 1);
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="cosmic-gradient min-h-screen ">
    <!-- Decorative Stars -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="stars" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="stars" style="top: 20%; right: 15%; animation-delay: 0.5s;"></div>
        <div class="stars" style="top: 50%; left: 5%; animation-delay: 1s;"></div>
        <div class="stars" style="top: 70%; right: 10%; animation-delay: 1.5s;"></div>
        <div class="stars" style="bottom: 20%; left: 20%; animation-delay: 2s;"></div>
        <div class="stars" style="bottom: 10%; right: 25%; animation-delay: 0.3s;"></div>
    </div>

    <!-- Main Content -->
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 py-12 sm:py-16 relative z-10">
        <div class="w-full max-w-md">
            <!-- Glow Background -->
            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-purple-700 rounded-2xl blur-3xl opacity-20 -z-10"></div>

            <!-- Card -->
            <div class="glow-effect bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-2xl p-8 sm:p-10 backdrop-blur-xl border border-purple-500 border-opacity-30">

                <!-- Header -->
                <div class="text-center mb-8">
                    <div class="inline-block p-3 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-white mb-2">Selamat Datang</h1>
                    <p class="text-purple-300 text-sm sm:text-base">Masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <!-- Form -->
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-purple-200 mb-2">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            class="form-input input-focus w-full px-4 py-3 text-white placeholder-purple-300 placeholder-opacity-50 rounded-lg focus:outline-none"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-purple-200 mb-2">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Masukkan password Anda"
                            class="form-input input-focus w-full px-4 py-3 text-white placeholder-purple-300 placeholder-opacity-50 rounded-lg focus:outline-none"
                        >
                        @error('password')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">

                        <a href="{{ route('register') }}" class="text-sm text-purple-400 hover:text-purple-300 transition">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        class="button-gradient w-full text-white font-semibold py-3 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-slate-900"
                    >
                        Masuk
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-purple-500 border-opacity-30"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-slate-800 text-purple-300">atau</span>
                    </div>
                </div>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="text-purple-200 text-sm">
                        Belum memiliki akun?
                        <a href="{{ route('register') }}" class="text-purple-400 font-semibold hover:text-purple-300 transition">
                            Daftar sekarang
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="text-center mt-8 text-purple-300 text-xs sm:text-sm">
                <p>© 2026 Manajemen Sekolah. Semua hak dilindungi.</p>
            </div>
        </div>
    </div>
</body>
</html>
