<x-dashboard-layout>
  <x-slot name="title">Buku</x-slot>
  <x-section-header title="Tambah Buku">
  </x-section-header>
  <x-section-card class="">
    <div class="">
      <form action="{{route('books.store')}}" method="POST">
        <h4 class="text-xl">Rincian buku</h4>
        <div class="flex flex-row space-x-8 my-4">
          {{-- Form Kiri --}}
          <div class="flex-1 flex flex-col space-y-4">
            <div class="flex flex-col space-y-2" x-data="category">
              <x-label for="category_id" :value="__('Kategori')" />

              {{-- Custom Select Dropdowm --}}
              <input type="hidden" id="category_id" name="category_id" x-model="currentId" />
              <div class="relative">
                <button type="button" @click="open=true"
                  class="relative text-left w-full px-3 py-[9px] ring-1 ring-gray-300 hover:ring-blue-500  focus:ring-2 focus:ring-blue-500 rounded-md transition"
                  x-text="current">
                </button>
                <div @click.outside="open = false"
                  class="absolute top-11 right-0 bg-white rounded-md overflow-hidden shadow-lg" x-show="open">
                  <ul>
                    @foreach ($categories as $cat)
                    <li class="px-3 py-1 hover:bg-blue-500 hover:text-white cursor-pointer"
                      @click="select('{{$cat->name}}', '{{$cat->id}}')">
                      {{$cat->name}}
                    </li>
                    <hr>
                    @endforeach
                  </ul>
                </div>
              </div>
              {{-- End custom select --}}
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="title" :value="__('Judul buku')" />
              <x-input id="title" name="title" type="text" placeholder="Judul" :value="old('title')" required
                autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="author" :value="__('Penulis')" />
              <x-input id="author" name="author" type="text" placeholder="Penulis" :value="old('author')" required
                autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="publisher" :value="__('Penerbit')" />
              <x-input id="publisher" name="publisher" type="text" placeholder="Penerbit" :value="old('publisher')"
                required autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="published_at" :value="__('Kota terbit')" />
              <x-input id="published_at" name="published_at" type="text" placeholder="Alamat"
                :value="old('published_at')" required autofocus />
            </div>
            {{-- <div class="flex flex-col space-y-2">
              <x-label for="publi" :value="__('Penulis')" />
              <x-input id="author" name="author" type="text" placeholder="Penulis" :value="old('author')" required
                autofocus />
            </div> --}}
          </div>
          {{-- Form Kanan --}}
          <div class="flex-1 flex flex-col space-y-4">
            <div class="flex flex-col space-y-2">
              <x-label for="book_code" :value="__('Kode buku')" />
              <x-input id="book_code" name="book_code" type="text" placeholder="Kode" :value="old('book_code')" required
                autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="isbn" :value="__('ISBN')" />
              <x-input id="isbn" name="isbn" type="text" placeholder="ISBN" :value="old('isbn')" required autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="edition" :value="__('Edisi')" />
              <x-input id="edition" name="edition" type="text" placeholder="Edisi" :value="old('edition')" required
                autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="publication_year" :value="__('Tahun terbit')" />
              <x-input id="publication_year" name="publication_year" type="number" placeholder="Tahun"
                :value="old('publication_year')" required autofocus />
            </div>
            <div class="flex flex-col space-y-2">
              <x-label for="amount" :value="__('Jumlah buku')" />
              <x-input id="amount" name="amount" type="number" placeholder="Jumlah" :value="old('amount')" required
                autofocus />
            </div>
          </div>
        </div>
        @csrf
        <x-button class="">
          {{ __('Simpan') }}
        </x-button>
      </form>
    </div>
  </x-section-card>
  <x-slot name="script">
    <script>
      document.addEventListener('alpine:init',()=>{
        Alpine.data('category', () => ({
          open : false,
          current : 'Pilih kategori',
          currentId : '',
          select(selected, selectedId){
            this.open = false;
            this.current =selected;
            this.currentId = selectedId; 
          }
        }));
      });
    </script>
  </x-slot>
</x-dashboard-layout>