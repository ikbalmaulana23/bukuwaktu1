<x-auth-layout>
    <div class= "lg:px-10 md:px-16 sm:20 px-8 w-full lg:w-4/12 mb-10  ">

        <a href="/" class="flex justify-center ">
        <x-application-logo > </x-application-logo>
        </a>
        <h1 class="text-xl font-medium text- my-4 text-center ">Create an Account</h1>

    <div class="">
        <form method="POST" action="{{ route('register') }}" class="text-sm">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="px-20 py-3">
                {{ __('Register') }}
            </x-primary-button>

        </div>

        <div class="mt-6 text-slate-800 text-center text-sm mb-2">
            Already have an account?
            <a href="/login" class="hover:underline text-blue-700 font-semibold">Log in</a>
          </div>
        <div class="">
            <hr class="my-2">
            <div class="flex justify-around text-sm">
                <a href="{{ route('socialite.redirect', 'google') }}" class=" hover:text-gray-800 border bg-gray-100 hover:bg-gray-200 py-2 rounded-lg text-bold px-3">Continue With Google <div class="flex justify-center"><img src="{{ asset('img/google.png') }}" class="h-6" alt=""></div></a>
                <a href="{{ route('socialite.redirect', 'github') }}" class=" hover:text-gray-800 border bg-gray-100 hover:bg-gray-200 py-2 rounded-lg text-bold px-3">Continue with Github <div class="flex justify-center"><img src="{{ asset('img/github.png') }}" class="h-6" alt=""></div></a>
            </div>
             </div>

    </form>
</div> </div>
</x-auth-layout>
