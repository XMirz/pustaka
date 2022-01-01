<x-guest-layout>
  <x-slot name="title">Masuk - Perpustakaan SMK Telkom</x-slot>
  <div class="relative h-screen overflow-y-auto xl:pt-6 flex flex-col">

    <div class="flex flex-col  gap-y-12">
      <div class="px-4 md:px-8 xl:px-32 gap-y-16">
        <div class="flex justify-start py-4 scale-95 md:scale-100">
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
        <div class="w-full md:w-3/5 xl:w-1/2 mt-4 md:mt-8 xl:mt-12 font-poppins flex flex-col md:space-y-4">
          <h1 id="texthero" class="relative font-bold text-3xl md:text-5xl img-shadow">Sistem
            Informasi Perpustakaan Digital
          </h1>
          <h3 class="font-medium  md:font-semibold text-2xl xl:text-3xl">SMK Telkom Pekanbaru</h3>
          <div class="hidden md:flex w-4/5 md:w-1/2 self-end md:absolute right-0 md:top-24 xl:top-12 ">
            <img class="img-shadow" src="{{asset('img/hero.webp')}}" alt="" srcset="">
          </div>
          <div class="w-full xl:w-2/3 pt-8">
            <div
              class="bg-gradient-to-br w-full from-cyan-400 to-blue-500 px-12 md:px-16 py-8 md:pb-20 md:pt-16 rounded-lg space-y-8 shadow-2xl shadow-blue-500/60">
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

                <x-button class=" block w-full justify-center  !bg-white !text-gray-600">
                  {{ __('Log in') }}
                </x-button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class=" opacity-100 mt-auto mb-0 ">
      <div class="relative w-full max-h-48 xl:max-h-56 overflow-y-hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="">
          <defs>
            <linearGradient id="grad1" x1="100%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" style="stop-color:rgb(34, 211, 238);stop-opacity:0.7" />=
              <stop offset="100%" style="stop-color:rgb(59, 130, 246);stop-opacity:1" />
            </linearGradient>
          </defs>
          <path fill="url(#grad1)" fill-opacity="1"
            d="M0,128L80,112C160,96,320,64,480,64C640,64,800,96,960,96C1120,96,1280,64,1360,48L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
          </path>
        </svg>
        <div class="w-full h-16 bg-blue-500"></div>
        <div class="absolute inset-0 flex flex-col justify-end text-white md:text-gray-800 font-poppins">
          <div class="flex flex-col items-center justify-end pb-12 md:pb-8 md:text-lg">
            <h3 class="font-semibold">Perpustakaan SMK Telkom - Pekanbaru</h3>
            <h3>Copyright, Kelompok 2 <span class="font-semibold">&copy;</span> 2022</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-slot name="script">
    <script>
    </script>
  </x-slot>
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