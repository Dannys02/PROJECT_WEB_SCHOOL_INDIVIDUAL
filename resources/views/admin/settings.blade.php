@extends('layouts.app')

@section('title', 'Pengaturan Akun')
@section('page_title', 'Pengaturan Akun')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Photo Section -->
        <div class="lg:col-span-1">
            <div class="card-cosmic rounded-lg p-6 sticky top-24">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <i class="fas fa-user-circle icon-cosmic"></i>
                    Foto Profil
                </h3>

                <!-- Current Photo -->
                <div class="flex justify-center mb-6">
                    @if ($user->profile_photo && file_exists(public_path('storage/profile-photos/' . $user->profile_photo)))
                        <img src="{{ asset('storage/profile-photos/' . $user->profile_photo) }}"
                            alt="{{ $user->name }}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-purple-500">
                    @else
                        <div
                            class="w-32 h-32 rounded-full bg-gradient-to-br from-purple-500 to-purple-700 flex items-center justify-center border-4 border-purple-500">
                            <i class="fas fa-user text-4xl text-white"></i>
                        </div>
                    @endif
                </div>

                <!-- Info -->
                <div class="bg-purple-500 bg-opacity-10 rounded-lg p-4 mb-4">
                    <p class="text-sm text-gray-300 text-center">
                        <i class="fas fa-info-circle text-purple-400 mr-2"></i>
                        Format: JPEG, PNG, JPG (Maks 5MB)
                    </p>
                </div>

                <!-- User Info Summary -->
                <div class="border-t border-purple-500 border-opacity-30 pt-4">
                    <p class="text-sm text-gray-400 mb-2">
                        <span class="text-purple-300">Nama:</span>
                        <br> <span class="text-white font-semibold">{{ $user->name }}</span>
                    </p>
                    <p class="text-sm text-gray-400">
                        <span class="text-purple-300">Email:</span>
                        <br> <span class="text-white font-semibold truncate">{{ $user->email }}</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="lg:col-span-2">
            <div class="card-cosmic rounded-lg p-6">
                <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                    <i class="fas fa-edit icon-cosmic"></i>
                    Edit Pengaturan
                </h3>

                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-semibold text-purple-300 mb-2">
                            <i class="fas fa-user-tag w-4 mr-2"></i>Nama Lengkap
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            placeholder="Masukkan nama lengkap Anda">
                        @error('name')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-semibold text-purple-300 mb-2">
                            <i class="fas fa-envelope w-4 mr-2"></i>Alamat Email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}"
                            class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                            placeholder="Masukkan alamat email Anda">
                        @error('email')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Divider -->
                    <div class="my-8 border-t border-purple-500 border-opacity-30"></div>

                    <!-- Password Section Header -->
                    <h4 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-lock icon-cosmic"></i>
                        Ubah Password (Opsional)
                    </h4>

                    <div class="bg-purple-500 bg-opacity-10 rounded-lg p-3 mb-6">
                        <p class="text-xs text-gray-300">
                            <i class="fas fa-info-circle text-purple-400 mr-2"></i>
                            Biarkan kosong jika tidak ingin mengubah password
                        </p>
                    </div>

                    <!-- Current Password Field -->
                    <div class="mb-6">
                        <label for="current_password" class="block text-sm font-semibold text-purple-300 mb-2">
                            <i class="fas fa-key w-4 mr-2"></i>Password Saat Ini
                        </label>
                        <div class="relative">
                            <input type="password" id="current_password" name="current_password"
                                class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                                placeholder="Masukkan password saat ini">
                            <button type="button" onclick="togglePassword('current_password')"
                                class="absolute right-4 top-3 text-gray-400 hover:text-purple-400">
                                <i class="fas fa-eye w-5"></i>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- New Password Field -->
                    <div class="mb-6">
                        <label for="new_password" class="block text-sm font-semibold text-purple-300 mb-2">
                            <i class="fas fa-shield-alt w-4 mr-2"></i>Password Baru
                        </label>
                        <div class="relative">
                            <input type="password" id="new_password" name="new_password"
                                class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                                placeholder="Masukkan password baru (minimal 8 karakter)">
                            <button type="button" onclick="togglePassword('new_password')"
                                class="absolute right-4 top-3 text-gray-400 hover:text-purple-400">
                                <i class="fas fa-eye w-5"></i>
                            </button>
                        </div>
                        @error('new_password')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-6">
                        <label for="new_password_confirmation" class="block text-sm font-semibold text-purple-300 mb-2">
                            <i class="fas fa-check-circle w-4 mr-2"></i>Konfirmasi Password Baru
                        </label>
                        <div class="relative">
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="form-input-cosmic w-full px-4 py-3 rounded-lg"
                                placeholder="Konfirmasi password baru Anda">
                            <button type="button" onclick="togglePassword('new_password_confirmation')"
                                class="absolute right-4 top-3 text-gray-400 hover:text-purple-400">
                                <i class="fas fa-eye w-5"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="my-8 border-t border-purple-500 border-opacity-30"></div>

                    <!-- Profile Photo Upload -->
                    <h4 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-image icon-cosmic"></i>
                        Ganti Foto Profil
                    </h4>

                    <!-- File Input -->
                    <div class="mb-6">
                        <label for="profile_photo" class="block">
                            <div class="form-input-cosmic px-4 py-6 rounded-lg cursor-pointer hover:bg-opacity-15 transition flex items-center justify-center gap-3 border-2 border-dashed border-purple-500 border-opacity-50 hover:border-opacity-100">
                                <div>
                                    <i class="fas fa-cloud-upload-alt text-2xl text-purple-400 mb-2"></i>
                                    <p class="text-sm text-gray-300">
                                        Klik atau drag gambar ke sini
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">
                                        Format: JPEG, PNG, JPG, GIF (Maks 5MB)
                                    </p>
                                </div>
                            </div>
                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                                class="hidden" onchange="showPreview(this)">
                        </label>
                        @error('profile_photo')
                            <p class="text-red-400 text-sm mt-2 flex items-center gap-1">
                                <i class="fas fa-exclamation-circle"></i> {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Preview -->
                    <div id="preview-container" class="mb-6 hidden">
                        <p class="text-sm font-semibold text-purple-300 mb-3">
                            <i class="fas fa-eye w-4 mr-2"></i>Preview Foto
                        </p>
                        <img id="preview-image" src="" alt="Preview"
                            class="w-32 h-32 rounded-lg object-cover border-4 border-purple-500">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex gap-3 mt-8">
                        <button type="submit"
                            class="button-cosmic flex-1 text-white font-semibold py-3 px-6 rounded-lg flex items-center justify-center gap-2 hover:shadow-lg">
                            <i class="fas fa-save w-5"></i>
                            Simpan Perubahan
                        </button>
                        {{-- <a href="{{ route('admin.settings') }}"
                            class="border border-purple-500 text-purple-300 font-semibold py-3 px-6 rounded-lg flex items-center justify-center gap-2 hover:bg-purple-500 hover:bg-opacity-10 transition">
                            <i class="fas fa-times w-5"></i>
                            Batal
                        </a> --}}
                    </div>
                </form>
            </div>

            <!-- Info Card -->
            <div class="card-cosmic rounded-lg p-6 mt-6">
                <h4 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                    <i class="fas fa-shield-alt icon-cosmic"></i>
                    Tips Keamanan
                </h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-400 mt-1"></i>
                        <span>Gunakan password yang kuat dengan kombinasi huruf besar, kecil, angka, dan simbol</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-400 mt-1"></i>
                        <span>Jangan bagikan password Anda kepada siapapun</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-400 mt-1"></i>
                        <span>Gunakan foto profil yang jelas dan profesional</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-400 mt-1"></i>
                        <span>Pastikan email Anda masih aktif dan dapat diakses</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = event.target.closest('button');
            const icon = button.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Show image preview
        function showPreview(input) {
            const preview = document.getElementById('preview-container');
            const previewImage = document.getElementById('preview-image');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    preview.classList.remove('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Auto-hide alerts
        setTimeout(() => {
            const successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 5000);
    </script>
@endsection
