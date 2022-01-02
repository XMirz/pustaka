<x-guest-layout>
  <x-slot name="title">Daftar - Perpustakaan SMK Telkom</x-slot>
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
        <div class="w-full mt-4 md:mt-8 xl:mt-12 font-poppins flex flex-col xl:flex-row md:space-y-4">
          <div class="xl:w-3/5 flex flex-col md:space-y-4">
            <h1 id="texthero" class="relative font-bold text-3xl md:text-5xl img-shadow">Sistem
              Informasi Perpustakaan Digital
            </h1>
            <h3 class="font-medium  md:font-semibold text-2xl xl:text-3xl">SMK Telkom Pekanbaru</h3>
            <div class="hidden xl:flex w-4/5 self-start pt-4">
              <img class="img-shadow -scale-x-100" src="{{asset('img/hero.webp')}}" alt="" srcset="">
            </div>
          </div>
          <div class="w-full md:w-2/3 xl:w-2/5 md:self-end  pt-8">
            {{-- Form Wrapper --}}
            <div
              class="bg-gradient-to-br w-full from-cyan-400 to-blue-500 px-12 md:px-16 py-8 md:pb-20 md:pt-16 rounded-lg space-y-8 shadow-2xl shadow-blue-500/60">
              <div class="self-start">
                <h3 class="relative font-poppins font-semibold text-3xl xl:text-3xl text-white">Silahkan
                  Login
                </h3>
              </div>
              <form method="POST" action="{{ route('register') }}" class="w-full space-y-4">

                <!-- Nama -->
                <div>
                  <x-label for="name" :value="__('Nama lengkap')" class="text-white" />
                  <input id="name"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="text" name="name" placeholder="Nama" value="{{old('name')}}" required autofocus />
                  <x-validation-error field="name" class="text-sm" />
                </div>

                <!-- Username -->
                <div>
                  <x-label for="username" :value="__('Username')" class="text-white" />
                  <input id="username"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="text" name="username" placeholder="Username" value="{{old('username')}}" required autofocus />
                  <x-validation-error field="username" class="text-sm" />
                </div>

                {{-- Email --}}
                <div>
                  <x-label for="email" :value="__('Email')" class="text-white" />
                  <input id="email"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="email" name="email" placeholder="Email" value="{{old('email')}}" required />
                  <x-validation-error field="email" class="text-sm" />
                </div>

                <!-- Password -->
                <div>
                  <x-label for="password" :value="__('Password')" class="text-white" />
                  <input id="password"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                  <x-validation-error field="password" class="text-sm" />
                </div>

                <!-- Password Confirm -->
                <div>
                  <x-label for="password_confirmation" :value="__('Konfirmasi ')" class="text-white" />
                  <input id="password_confirmation"
                    class="block mt-1 w-full bg-blue-50 focus:bg-blue-100 rounded-md px-4 py-2 outline-none border-none  focus:ring-0"
                    type="password" name="password_confirmation" placeholder="Password" required
                    autocomplete="current-password" />
                </div>

                <div class="flex flex-col items-end gap-2 text-gray-200 hover:text-white">
                  <a class="underline text-sm" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                  </a>
                  <x-button class=" block w-full justify-center  !bg-white !text-gray-600">
                    {{ __('Log in') }}
                  </x-button>
                </div>
                @csrf
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


{{-- <x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
      </a>
    </x-slot>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Name -->
      <div>
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label for="password" :value="__('Password')" />

        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
          autocomplete="new-password" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
          required />
      </div>

      <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <x-button class="ml-4">
          {{ __('Register') }}
        </x-button>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout> --}}