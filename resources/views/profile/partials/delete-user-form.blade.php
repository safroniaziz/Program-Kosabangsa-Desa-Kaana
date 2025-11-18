<section class="space-y-6">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">
            Hapus Akun
        </h2>
        <p class="text-sm text-gray-600">
            Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun, silakan unduh data atau informasi yang ingin Anda simpan.
        </p>
    </header>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
    >
        {{ __('Hapus Akun') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    {{ __('Apakah Anda yakin ingin menghapus akun?') }}
                </h2>
                <p class="text-sm text-gray-600">
                    {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun secara permanen.') }}
                </p>
            </div>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Kata Sandi') }}" class="text-gray-700 font-semibold mb-2" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all duration-300 bg-gray-50/50 hover:bg-white"
                    placeholder="{{ __('Masukkan kata sandi Anda') }}"
                    required
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button 
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-xl hover:bg-gray-300 transition-all duration-300">
                    {{ __('Batal') }}
                </button>

                <button 
                    type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-xl hover:from-red-700 hover:to-red-800 transition-all duration-300">
                    {{ __('Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
