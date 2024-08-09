@extends('auth.template')

@section('title')
Halaman Registrasi
@endsection

@section('content')
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <h1 class="mt-5 py-5 font-bold text-2xl ">Register to <span class="underline">bukuwaktu.com</span></h1>

      <form class="space-y-4" action="{{ route('register.post') }}" method="POST" >
        @csrf
        <div>
          {{-- <label for="" class="mx-3 text-red-500">Nama : <span>{{ $errors->first('name') }}</span></label>
          <input type="text" class="border border-black bg-gray-200" name="name" value="{{ old('name') }}" /> --}}
          
          
          <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Nama<span>{{ $errors->first('name') }}</span></label>

            <div class="mt-2">  
              <input id="name" name="name" type="text" autocomplete="name" required  value="{{ old('name') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-slate-800 sm:text-sm sm:leading-6">
            </div>
          </div>

          <div>
          
            
            
            <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username<span>{{ $errors->first('username') }}</span></label>
  
              <div class="mt-2">  
                <input id="username" name="username" type="text" autocomplete="username" required  value="{{ old('username') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-slate-800 sm:text-sm sm:leading-6">
              </div>
            </div>

          <div>
      
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-slate-800 sm:text-sm sm:leading-6" value="{{ old('email') }}" />
            </div>
          </div>
   
        
  
        <div>
       

            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
            <div class="mt-2">
              <input id="password" name="password" type="password" autocomplete="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-700 focus:ring-2 focus:ring-inset focus:ring-indigo-800 sm:text-sm sm:leading-6">
            </div>
          </div>
  
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-slate-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-800">Register</button>
        </div>
      </form>
  
      <p class="mt-10 text-center text-sm text-gray-500">
       Already Have Account?
        <a href="{{ "/login" }}" class="font-semibold leading-6 text-slate-800 hover:text-slate-900">Please Login</a>
      </p>
    </div>
  </div>
  
  @endsection