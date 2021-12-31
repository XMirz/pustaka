<x-dashboard-layout>
  <x-slot name="title">Buku</x-slot>
  <x-section-card class="">
    <x-section-header title="Tambah Buku">
    </x-section-header>
    <div class="">
      <form action="{{route('books.store')}}" method="POST">
        <div class="flex flex-col lg:flex-row gap-y-2 lg:gap-x-8 my-4">
          {{-- Form Kiri --}}
          <div class="contents flex-1 md:flex flex-col gap-y-4">
            <div class="flex flex-col gap-y-1 lg:gap-y-2" x-data="category">
              <x-label for="category_id" :value="__('Kategori')" />

              {{-- Custom Select Dropdowm --}}
              <input type="hidden" id="category_id" name="category_id" x-model="currentId" />
              <div class="relative">
                <button type="button" x-on:click="open=true"
                  class="relative  text-left w-full px-3 py-[9px] ring-1 ring-gray-300 hover:ring-blue-500  focus:ring-2 focus:ring-blue-500 rounded-md transition"
                  x-text="current">
                </button>
                <x-validation-error field="category_id" />
                <div @click.outside="open = false"
                  class="absolute z-10 top-11 right-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                  x-show="open">
                  <ul class="">
                    @foreach ($categories as $cat)
                    <li class="px-3 py-2  hover:bg-gray-100 cursor-pointer"
                      x-on:click="select('{{$cat->name}}', '{{$cat->id}}')">
                      {{$cat->name}}
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              {{-- End custom select --}}
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="title" :value="__('Judul buku')" />
              <x-input id="title" name="title" type="text" placeholder="Judul" :value="old('title')" required
                autofocus />
            </div>

            <div class="relative flex flex-col space-y-2" x-data="inputSelect('author')">
              <x-label for="author" :value="__('Penulis')" />
              <x-input id="author" name="author" type="text" placeholder="Penulis" :value="old('author')" required
                autofocus autocomplete="off" x-on:keyup="open = false" x-on:keyup.debounce.500="onChange()"
                x-model="author" x-init="initialize('{{old('author')}}')" />
              {{-- Untuk dropdown penulis --}}
              <div @click.outside="open = false"
                class="absolute block z-10 top-[calc(100%-0.5rem)] inset-x-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                x-show="open">
                <ul class="" x-html="list">
                </ul>
              </div>
            </div>
            <div class="relative flex flex-col space-y-2" x-data="inputSelect('publisher')">
              <x-label for="publisher" :value="__('Penerbit')" />
              <x-input id="publisher" name="publisher" type="text" placeholder="Penerbit" :value="old('publisher')"
                required autofocus autocomplete="off" x-on:keyup="open = false" x-on:keyup.debounce.750="onChange()"
                x-model="publisher" x-init="initialize('{{old('publisher')}}')" />
              {{-- Untuk dropdown penerbit --}}
              <div @click.outside="open = false"
                class="absolute block z-10 top-[calc(100%-0.5rem)] inset-x-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                x-show="open">
                <ul class="" x-html="list">
                </ul>
              </div>
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="published_at" :value="__('Kota terbit')" />
              <x-input id="published_at" name="published_at" type="text" placeholder="Alamat"
                :value="old('published_at')" required autofocus />
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="publication_year" :value="__('Tahun terbit')" />
              <x-input id="publication_year" name="publication_year" type="number" placeholder="Tahun"
                :value="old('publication_year')" required autofocus />
            </div>
          </div>
          {{-- Form Kanan --}}
          <div class="contents flex-1 md:flex flex-col gap-y-4">
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="book_code" :value="__('Kode buku')" />
              <x-input id="book_code" name="book_code" type="text" placeholder="Kode" :value="old('book_code')" required
                autofocus />
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="isbn" :value="__('ISBN')" />
              <x-input id="isbn" name="isbn" type="text" placeholder="ISBN" :value="old('isbn')" required autofocus />
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="edition" :value="__('Edisi')" />
              <x-input id="edition" name="edition" type="text" placeholder="Edisi" :value="old('edition')" required
                autofocus />
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="exemplar" :value="__('Jumlah halaman')" />
              <x-input id="exemplar" name="exemplar" type="number" placeholder="Halaman" :value="old('exemplar')"
                required autofocus />
            </div>
            <div class="flex flex-col gap-y-1 lg:gap-y-2">
              <x-label for="amount" :value="__('Jumlah buku')" />
              <x-input id="amount" name="amount" type="number" placeholder="Jumlah" :value="old('amount')" required
                autofocus />
            </div>
          </div>
        </div>
        @csrf
        <x-button class="w-full lg:w-auto justify-center lg:justify-start">
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
      function inputSelect(name) {
        return {
          [name]: '',
          open: false,
          list: '',
          initialize(value){
            this[name] = value
          },
          select(selectedInput){
            this.open = false,
            this[name] = selectedInput
          },
          async onChange(){
              let uri = `{{route('root')}}/ajax/${name}s/${this[name]}`;
              console.log(uri);
              await fetch(uri)
              .then((response) => response.json())
              .then((response) => {
                let fetchedList = ' ';
                response.forEach(function (element){
                  fetchedList += `<li class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                    x-on:click="select('${element.name}')">
                    ${element.name}
                  </li>`
                });
                this.list = fetchedList
              })
              .catch(err => console.log(err))
              this.open = true
          }
        }
      }
    </script>
  </x-slot>
</x-dashboard-layout>