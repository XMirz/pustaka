<x-guest-layout>
  <x-slot name="title">Masuk - Perpustakaan SMK Telkom</x-slot>
  <div class="relative h-screen overflow-y-auto xl:pt-12 flex flex-col">

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
          <h1 id="texthero" class="relative font-bold text-3xl md:text-5xl xl:text-7xl img-shadow">Sistem
            Informasi Perpustakaan Digital
          </h1>
          <h3 class="font-medium  md:font-semibold text-2xl xl:text-4xl">SMK Telkom Pekanbaru</h3>
          <div class="w-4/5 md:w-1/2 flex self-end md:absolute right-0 md:top-24 xl:top-12 ">
            <img class="img-shadow" src="{{asset('img/hero.webp')}}" alt="" srcset="">
          </div>
          <div class="w-full md:w-2/3 pt-8">
            <form action="{{route('root')}}" method="GET">
              <h4 class="text-blue-600 font-semibold text-lg md:text-2xl md:my-4">Cari buku</h4>
              <div
                class="w-full py-2 px-4 md:px-6 border border-blue-500/10 shadow-2xl shadow-blue-500/30 rounded-md flex flex-row space-x-4">
                <div class="flex-grow">
                  <label for="" class="text-blue-600 tracking-wider md:font-semibold">Judul buku</label>
                  <input id="title" name="title" type="text" placeholder="Kata kunci"
                    class="md:text-xl px-0 w-full border-0 focus:border-0 outline-none focus:outline-none focus:ring-0 bg-transparent"
                    value="{{request('title') ?? ''}}" required />
                </div>
                <div class="flex items-center">
                  <button type="submit">
                    <x-icons.search size="8" class="text-blue-600" />
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>

      @if(request('title'))
      <div
        class="w-full bg-gray-100 flex flex-col font-sans space-y-4 md:space-y-8 px-4 md:px-8 xl:px-32  py-8 md:py-12 ">
        <h4 class="text-blue-600 font-poppins text-lg md:text-2xl font-semibold ">Hasil penelusuran</h4>
        @if($results->count() > 0)
        <div class="flex flex-row flex-wrap justify-between gap-4 md:gap-6">
          @foreach($results as $book)
          <x-cards.front-book :book="$book" />
          @endforeach
        </div>
        @else
        <h4 class="font-poppins md:text-xl mx-6 text-center">Tidak ditemukan buku dengan judul
          <span class="text-blue-600 font-semibold cya4">{{request('title')}}!</span>
        </h4>
        @endif
      </div>
      @endif
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