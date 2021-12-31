<x-guest-layout>
  <x-slot name="title">Masuk - Perpustakaan SMK Telkom</x-slot>

  <div class="relative h-screen overflow-y-auto flex flex-col ">
    <div class="flex h-full flex-col mx-8 md:mx-32">
      {{-- App Logo --}}
      <div class="flex justify-start py-4">
        <a href="{{route('root')}}" class=" flex flex-row items-center space-x-4 justify-center ">
          <div class="w-14 h-14">
            <x-icons.app />
          </div>
          <div class="font-poppins">
            <h1 class="text-xl font-semibold text-blue-600">Perpustakaan</h1>
            <h4 class="">SMK Telkom</h4>
          </div>
        </a>
      </div>
      {{-- Grid Wrapper --}}
      <div class="flex w-full flex-col md:flex-row ">
        {{-- Left --}}
        <div class="w-full md:w-3/5 my-8 md:mt-20">
          <div class="w-full font-poppins flex gap-8 md:gap-y-20 flex-col ">
            <div class="md:space-y-6">
              <h1 id="texthero" class="relative font-bold text-3xl xl:text-7xl img-shadow">Sistem
                Informasi Perpustakaan Digital
              </h1>
              <h3 class="font-medium  md:font-semibold text-2xl xl:text-4xl">SMK Telkom Pekanbaru</h3>
            </div>
            <div class="w-full md:w-2/3 md:flex ">
              <img class="img-shadow  -scale-x-100" src="{{asset('img/hero.webp')}}" alt="" srcset="">
            </div>
          </div>
        </div>
        {{-- Right --}}
        <div class="w-full md:w-2/5 h-full pt-12 md:pt-32">
          <div class="h-full flex items-center flex-col gap-16">
            <div
              class="bg-gradient-to-br w-full from-cyan-400 to-blue-500 px-8 md:px-16 py-8 md:pb-20 md:pt-16 rounded-lg space-y-8 shadow-2xl shadow-blue-500/60">
              <div class="self-start">
                <h3 class="relative font-poppins font-semibold text-3xl xl:text-3xl text-white">Silahkan Login
                </h3>
              </div>
              <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf
                <!-- Email Address -->
                <div>
                  <x-label for="email" :value="__('Email')" class="text-white" />

                  <input id="email"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="email" name="email" placeholder="Email" value="{{old('email')}}" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                  <x-label for="password" :value="__('Password')" class="text-white" />

                  <input id="password"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                  <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                      class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                      name="remember">
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                  </label>
                </div>

                <div class="flex items-center justify-end mt-4">

                </div>
                <x-button class=" block w-full justify-center  !bg-white !text-gray-600">
                  {{ __('Log in') }}
                </x-button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>









</x-guest-layout>
{{-- <x-auth-card>
  <x-slot name="logo">
    <a href="{{route('root')}}" class=" flex flex-row items-center space-x-4 justify-center ">
      <div class="w-14 h-14">
        <x-icons.app />
      </div>
      <div class="font-poppins">
        <h1 class="text-xl font-semibold text-blue-600">Perpustakaan</h1>
        <h4 class="">SMK Telkom</h4>
      </div>
    </a>
  </x-slot>

  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

  <!-- Validation Errors -->
  <x-auth-validation-errors class="mb-4" :errors="$errors" />

  <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
      <x-label for="email" :value="__('Email')" />

      <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="{{old('email')}}" required
        autofocus />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-label for="password" :value="__('Password')" />

      <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
      <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
          class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
      </label>
    </div>

    <div class="flex items-center justify-end mt-4">
      @if (Route::has('password.request'))
      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
      </a>
      @endif

      <x-button class="ml-3">
        {{ __('Log in') }}
      </x-button>
    </div>
  </form>
</x-auth-card> --}}