@extends('auth.template')

@section('title')
Halaman Login
@endsection

@section('content')

@if(session('pesan'))
<span class="w-full text-red-500">{{ session('pesan') }}</span>
@endsession





<main class=" md:mx-auto md:w-full md:max-w-sm mx-5 pt-32">

  <h1 class="pt-5 font-bold text-2xl ">Login to <span class="underline">bukuwaktu.com</span></h1>
  <form class="space-y-5 " action="{{ route('login.post') }}" method="POST">

    @csrf
    <div>
      <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
      <div class="mt-2">
        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-900 placeholder:text-gray-800 focus:ring-2 focus:ring-inset focus:ring-slate-600 sm:text-sm sm:leading-6">
      </div>
    </div>

    <div>
      <div class="flex items-center justify-between">
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <div class="text-sm">
          <a href="#" class="font-semibold text-slate-600 hover:text-slate-500">Forgot password?</a>
        </div>
      </div>
      <div class="mt-2">
        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-900 placeholder:text-gray-800 focus:ring-2 focus:ring-inset focus:ring-slate-900 sm:text-sm sm:leading-6">
      </div>
    </div>

    <div>
      <button type="submit" class="flex w-full justify-center rounded-md bg-slate-900 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-slate-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-900">Sign in</button>
    </div>
  </form>
  <p class="mt-10 text-center text-sm text-gray-500">
    Already Have Account?
     <a href="{{ "/register" }}" class="font-semibold leading-6 text-slate-800 hover:text-slate-900">Please Register</a>
   </p>

</main>


  @endsection