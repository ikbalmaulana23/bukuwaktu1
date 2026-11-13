<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->


            {{-- Password --}}
            <div class="mt-4">
                <div class="flex items-center justify-between">
                    <x-input-label for="password" :value="__('Password')" />

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                        class="text-xs text-amber-600 hover:text-amber-700 hover:underline transition">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <div class="relative">
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="block mt-1 w-full pr-12 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >

                    <button
                        type="button"
                        onclick="
                            const input = document.getElementById('password');
                            const icon = document.getElementById('eye-icon');
                            input.type = input.type === 'password' ? 'text' : 'password';
                            icon.textContent = input.type === 'password' ? '👁' : '🙈';
                        "
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500"
                    >
                        <span id="eye-icon">👁</span>
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>



        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input
    id="remember_me"
    type="checkbox"
    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
    name="remember"
>
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-center mt-4">
           <x-primary-button class="m-3">
                {{ __('Log in') }}
            </x-primary-button>



        </div>



{{-- <div class="flex items-center justify-between w-full">

    <div class="flex items-center gap-3">

        <a href="{{ route('socialite.redirect', 'google') }}"
           class="flex items-center gap-2 px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-100 transition">
            <i class="fa-brands fa-google"></i>
            <span>Login with Google</span>
        </a>

        <a href="{{ route('socialite.redirect', 'github') }}"
           class="flex items-center gap-2 px-4 py-2 border border-slate-300 rounded-lg text-slate-700 hover:bg-slate-100 transition">
            <i class="fa-brands fa-github"></i>
            <span>Login with GitHub</span>
        </a>

    </div> --}}

    {{-- Register --}}


</div>
<div class="mt-4 text-sm text-gray-500">
    Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
</div>


    </form>
</x-guest-layout>
