<x-guest-layout>
    <!-- Header Section -->
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Buat Akun Baru</h2>
        <p class="text-gray-600 text-sm">Bergabunglah dengan komunitas digital Desa Kaana</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div class="group">
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-semibold mb-1 flex items-center" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
            <x-text-input id="name"
                    class="block w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <!-- Email Address -->
        <div class="group">
            <x-input-label for="email" :value="__('Alamat Email')" class="text-gray-700 font-semibold mb-1 flex items-center" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                </div>
            <x-text-input id="email"
                    class="block w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                    placeholder="contoh@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <!-- Password -->
        <div class="group">
            <x-input-label for="password" :value="__('Kata Sandi')" class="text-gray-700 font-semibold mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <x-text-input id="password"
                    class="block w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Minimal 8 karakter" />
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <!-- Confirm Password -->
        <div class="group">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="text-gray-700 font-semibold mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <x-text-input id="password_confirmation"
                    class="block w-full pl-10 pr-12 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Ulangi kata sandi" />
                <button type="button" id="togglePasswordConfirm" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-blue-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <!-- Divider for Additional Info -->
        <div class="relative my-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500 font-medium text-xs">Informasi Demografi (Opsional)</span>
            </div>
        </div>

        <!-- Gender -->
        <div class="group">
            <x-input-label for="gender" :value="__('Jenis Kelamin')" class="text-gray-700 font-semibold mb-1" />
            <div class="mt-2 flex gap-4">
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="gender" value="male" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('gender') === 'male' ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Laki-laki</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="gender" value="female" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('gender') === 'female' ? 'checked' : '' }}>
                    <span class="ml-2 text-sm text-gray-700">Perempuan</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('gender')" class="mt-1" />
        </div>

        <!-- Birth Date -->
        <div class="group">
            <x-input-label for="birth_date" :value="__('Tanggal Lahir')" class="text-gray-700 font-semibold mb-1 flex items-center" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <x-text-input id="birth_date"
                    class="block w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white"
                    type="date"
                    name="birth_date"
                    :value="old('birth_date')"
                    max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                    autocomplete="bday" />
            </div>
            <x-input-error :messages="$errors->get('birth_date')" class="mt-1" />
        </div>

        <!-- Religion -->
        <div class="group">
            <x-input-label for="religion" :value="__('Agama')" class="text-gray-700 font-semibold mb-1 flex items-center" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <select id="religion" name="religion" class="block w-full pl-10 pr-10 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white appearance-none cursor-pointer">
                    <option value="">Pilih Agama</option>
                    <option value="islam" {{ old('religion') === 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ old('religion') === 'kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="katolik" {{ old('religion') === 'katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="hindu" {{ old('religion') === 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="buddha" {{ old('religion') === 'buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="konghucu" {{ old('religion') === 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                    <option value="lainnya" {{ old('religion') === 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('religion')" class="mt-1" />
        </div>

        <!-- Socioeconomic Status -->
        <div class="group">
            <x-input-label for="socioeconomic_status" :value="__('Status Sosial Ekonomi')" class="text-gray-700 font-semibold mb-1 flex items-center" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <select id="socioeconomic_status" name="socioeconomic_status" class="block w-full pl-10 pr-10 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white appearance-none cursor-pointer">
                    <option value="">Pilih Status</option>
                    <option value="sangat_miskin" {{ old('socioeconomic_status') === 'sangat_miskin' ? 'selected' : '' }}>Sangat Miskin</option>
                    <option value="miskin" {{ old('socioeconomic_status') === 'miskin' ? 'selected' : '' }}>Miskin</option>
                    <option value="menengah_bawah" {{ old('socioeconomic_status') === 'menengah_bawah' ? 'selected' : '' }}>Menengah Bawah</option>
                    <option value="menengah" {{ old('socioeconomic_status') === 'menengah' ? 'selected' : '' }}>Menengah</option>
                    <option value="menengah_atas" {{ old('socioeconomic_status') === 'menengah_atas' ? 'selected' : '' }}>Menengah Atas</option>
                    <option value="kaya" {{ old('socioeconomic_status') === 'kaya' ? 'selected' : '' }}>Kaya</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('socioeconomic_status')" class="mt-1" />
        </div>

        <!-- Education Level -->
        <div class="group">
            <x-input-label for="education_level" :value="__('Tingkat Pendidikan')" class="text-gray-700 font-semibold mb-1 flex items-center" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <select id="education_level" name="education_level" class="block w-full pl-10 pr-10 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white appearance-none cursor-pointer">
                    <option value="">Pilih Pendidikan</option>
                    <option value="tidak_sekolah" {{ old('education_level') === 'tidak_sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                    <option value="sd" {{ old('education_level') === 'sd' ? 'selected' : '' }}>SD</option>
                    <option value="smp" {{ old('education_level') === 'smp' ? 'selected' : '' }}>SMP</option>
                    <option value="sma" {{ old('education_level') === 'sma' ? 'selected' : '' }}>SMA/SMK</option>
                    <option value="diploma" {{ old('education_level') === 'diploma' ? 'selected' : '' }}>Diploma</option>
                    <option value="sarjana" {{ old('education_level') === 'sarjana' ? 'selected' : '' }}>Sarjana</option>
                    <option value="pascasarjana" {{ old('education_level') === 'pascasarjana' ? 'selected' : '' }}>Pascasarjana</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
            <x-input-error :messages="$errors->get('education_level')" class="mt-1" />
        </div>

        <!-- Terms and Privacy -->
        <div class="flex items-start pt-1">
            <input id="terms" type="checkbox" class="w-4 h-4 mt-1 rounded border-2 border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 focus:ring-2 transition-all" name="terms" required>
            <label for="terms" class="ml-2 text-sm text-gray-600">
                Saya setuju dengan
                <a href="#" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">Syarat & Ketentuan</a>
                dan
                <a href="#" class="text-blue-600 hover:text-blue-700 font-medium hover:underline">Kebijakan Privasi</a>
            </label>
        </div>

        <!-- Register Button -->
        <div>
            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 focus:ring-4 focus:ring-blue-500/25 focus:outline-none group">
                <span class="flex items-center justify-center">
                    <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                {{ __('Daftar Sekarang') }}
                </span>
            </button>
        </div>

        <!-- Divider -->
        <div class="relative my-5">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500 font-medium">Sudah punya akun?</span>
            </div>
        </div>

        <!-- Login Link -->
        <div class="text-center">
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 border-2 border-blue-200 bg-blue-50 hover:bg-blue-100 text-blue-700 font-semibold rounded-xl transition-all duration-300 hover:border-blue-300 hover:-translate-y-0.5 hover:shadow-md group">
                <svg class="w-4 h-4 mr-2 group-hover:rotate-12 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Masuk ke Akun
            </a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const passwordField = document.getElementById('password');
            
            if (togglePassword && passwordField) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordField.setAttribute('type', type);

                // Toggle icon
                if (type === 'text') {
                        togglePassword.innerHTML = `
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                        </svg>
                        `;
                } else {
                        togglePassword.innerHTML = `
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        `;
                }
            });
            }

            // Toggle password confirmation visibility
            const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
            const passwordConfirmField = document.getElementById('password_confirmation');
            
            if (togglePasswordConfirm && passwordConfirmField) {
                togglePasswordConfirm.addEventListener('click', function() {
                    const type = passwordConfirmField.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordConfirmField.setAttribute('type', type);

                // Toggle icon
                if (type === 'text') {
                        togglePasswordConfirm.innerHTML = `
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                        </svg>
                        `;
                } else {
                        togglePasswordConfirm.innerHTML = `
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        `;
                    }
                });
            }

            // Form validation dengan visual feedback
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.closest('.group')?.classList.add('focused');
                });
                input.addEventListener('blur', function() {
                    this.closest('.group')?.classList.remove('focused');
                });
            });

            // Smooth form submission
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = `
                            <span class="flex items-center justify-center">
                                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Memproses...
                            </span>
                        `;
                        submitBtn.disabled = true;
                    }
                });
            }
        });
    </script>
</x-guest-layout>
