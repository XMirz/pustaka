<x-guest-layout>
  <x-slot name="title">{{request('title') ? 'Cari Buku - ' : ''}}Perpustakaan SMK Telkom</x-slot>
  <div class="relative h-screen overflow-y-auto flex flex-col  xl:pt-12">

    <div class="flex flex-col space-y-12 md:space-y-56">
      <div class="px-8 xl:px-32 space-y-16">
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
        <div class="">
          <div class="w-full xl:w-1/2 font-poppins flex flex-col md:space-y-4">
            <h1 id="texthero" class="relative font-bold text-3xl xl:text-7xl img-shadow">Sistem
              Informasi Perpustakaan Digital
            </h1>
            <h3 class="font-medium  md:font-semibold text-2xl xl:text-4xl">SMK Telkom Pekanbaru</h3>
            <div class="w-4/5 md:w-1/2 flex self-end md:absolute right-0 top-12 ">
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

      </div>

      @if(request('title'))
      <div class="w-full bg-gray-100 flex flex-col font-sans space-y-4 md:space-y-8 px-8 xl:px-32  py-8 md:py-12 ">
        <h4 class="text-blue-600 font-poppins text-lg md:text-2xl font-semibold ">Hasil penelusuran</h4>
        @if($results->count() > 0)
        <div class="flex flex-row flex-wrap justify-between gap-4 md:gap-6">
          @foreach($results as $book)
          <x-cards.front-book :book="$book" />
          @endforeach
        </div>
        @else
        <h4 class="font-poppins md:text-xl mx-6 text-center">Tidak ditemukan buku dengan judul
          <span class="text-blue-600 font-semibold">{{request('title')}}!</span>
        </h4>
        @endif
      </div>
      @endif
      <div class="text-blue-500 {{request('title') ? 'pt-12' : 'pt-12 md:pt-32'}} opacity-50">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#0099ff" fill-opacity="1"
            d="M0,160L40,176C80,192,160,224,240,234.7C320,245,400,235,480,197.3C560,160,640,96,720,101.3C800,107,880,181,960,181.3C1040,181,1120,107,1200,64C1280,21,1360,11,1400,5.3L1440,0L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
          </path>
        </svg>
      </div>
    </div>
  </div>

  <x-slot name="script">
    <script>

    </script>
  </x-slot>
</x-guest-layout>