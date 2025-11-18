<section>
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">
            Informasi Profile
        </h2>
        <p class="text-sm text-gray-600">
            Perbarui informasi profil dan alamat email Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="group">
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-semibold mb-2" />
            <x-text-input 
                id="name" 
                name="name" 
                type="text" 
                class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white" 
                :value="old('name', $user->name)" 
                required 
                autofocus 
                autocomplete="name" 
                placeholder="Masukkan nama lengkap Anda" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="group">
            <x-input-label for="email" :value="__('Alamat Email')" class="text-gray-700 font-semibold mb-2" />
            <x-text-input 
                id="email" 
                name="email" 
                type="email" 
                class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-gray-50/50 hover:bg-white" 
                :value="old('email', $user->email)" 
                required 
                autocomplete="username" 
                placeholder="contoh@email.com" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-sm text-yellow-800 mb-2">
                        {{ __('Alamat email Anda belum diverifikasi.') }}
                    </p>
                    <button 
                        form="send-verification" 
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium underline">
                        {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button 
                type="submit" 
                class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="flex items-center gap-2 px-4 py-2 bg-green-50 text-green-700 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="text-sm font-medium">{{ __('Berhasil disimpan.') }}</span>
                </div>
            @endif
        </div>
    </form>
</section>
