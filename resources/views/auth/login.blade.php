 <x-auth-layout >
    <!-- Session Status -->
    <x-auth-session-status  :status="session('status')" />

    <!-- component -->

<!-- Right: Login Form -->
<div class= "lg:px-10 md:px-16 sm:20 px-8 w-full lg:w-4/12 mb-10">
    <a href="/" class="flex justify-center ">
    <x-application-logo > </x-application-logo>
    </a>
<div>
  <p class="my-3 text-center">Welcome Back!👋</p>
  <form method="POST" action="{{ route('login') }}" class="basis-1/2">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class=" mt-4 flex justify-between">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
    @endif
    </div>

    <div class="flex items-center justify-center mt-4">
        <x-primary-button class="px-40 py-3">
            {{ __('Log in') }}
        </x-primary-button>
    </div>

</form>
</div>
<div class="">
    <hr class="my-3">
    <div class="flex justify-around text-sm">
        <a href="{{ route('socialite.redirect', 'google') }}" class=" hover:text-gray-800 border bg-gray-100 hover:bg-gray-200 py-2 rounded-lg text-bold px-3">Login With Google <div class="flex justify-center"><img src="{{ asset('img/google.png') }}" class="h-6" alt=""></div></a>
        <a href="{{ route('socialite.redirect', 'github') }}" class=" hover:text-gray-800 border bg-gray-100 hover:bg-gray-200 py-2 rounded-lg text-bold px-3">Login with Github <div class="flex justify-center"><img src="{{ asset('img/github.png') }}" class="h-6" alt=""></div></a>
    </div>
     </div>
  <!-- Sign up  Link -->
  <div class="mt-6 text-slate-800 text-center text-sm">
    Don’t you have an account?
    <a href="/register" class="hover:underline text-blue-700 font-semibold">Sign up</a>
  </div>
</div>


</x-auth-layout>

