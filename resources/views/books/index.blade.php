<x-dashboard-layout>
  <x-slot name="title">Buku</x-slot>
  <div class="flex flex-row space-x-8">
    <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
    <x-cards.total-categories totalCategories="{{$totalCategories ?? 0}}" />
  </div>
  {{-- Category --}}
  <x-section-card class="">
    <x-section-header title="Daftar Kategory">
      <div class="flex flex-row justify-around items-center">
        <x-button-link title="Tambah" link="{{ route('categories.create') }}">
          <x-icons.plus size="5" />
        </x-button-link>
      </div>
    </x-section-header>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="border-b border-gray-200 uppercase tracking-wider font-poppins font-semibold text-center">
          <tr class="">
            <th class="px-0 pb-3">#</th>
            <th class="px-2 py-3">Nama</th>
            <th class="px-2 py-3">Tempat</th>
            <th class="px-2 py-3">Jumlah buku</th>
            <th scope=" col" class="relative px-4 py-1">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="text-lg w-full">
          @foreach ($categories as $cat)
          <tr class="hover:bg-gray-100">
            <td class="px-0 py-3 text-center">{{$loop->iteration}}</td>
            <td class="px-2 py-3">{{$cat->name}}</td>
            <td class="px-2 py-3">{{$cat->place}}</td>
            <td class="px-2 py-3">{{$cat->books_count}}</td>
            <td class="px-2 py-3">
              <div class="flex flex-row justify-center items-center">
                <x-button-link class="px-[6px] py-[6px]"
                  link="{{ route('categories.edit', ['category' => $cat->id]) }}">
                  <x-icons.edit size="5" />
                </x-button-link>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-section-card>


  <x-section-card class="">
    <x-section-header title="Daftar Buku">
      <div class="flex flex-row justify-around items-center">
        <x-button-link title="Tambah" link="{{ route('books.create') }}">
          <x-icons.plus size="5" />
        </x-button-link>
      </div>
    </x-section-header>
    <div class="overflow-x-auto">
      <table class="w-full">
        <thead class="border-b border-gray-200 uppercase tracking-wider font-poppins font-semibold text-center">
          <tr class="">
            <th class="px-0 pb-3">#</th>
            <th class="px-2 py-3">Judul</th>
            <th class="px-2 py-3">Kode buku</th>
            <th class="px-2 py-3">ISBN</th>
            <th class="px-2 py-3">Penulis</th>
            <th class="px-2 py-3">Penerbit</th>
            <th class="px-2 py-3">Alamat penerbit</th>
            <th class="px-2 py-3">Stok</th>
            <th scope=" col" class="relative px-4 py-1">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="text-lg w-full">
          @foreach ($books as $book)
          <tr class="hover:bg-gray-100">
            <td class="px-0 py-3 text-center">{{$loop->iteration}}</td>
            <td class="px-2 py-3">{{$book->title}}</td>
            <td class="px-2 py-3">{{$book->book_code}}</td>
            <td class="px-2 py-3">{{$book->isbn}}</td>
            <td class="px-2 py-3">{{$book->author->name}}</td>
            <td class="px-2 py-3">{{$book->publisher->name}}</td>
            <td class="px-2 py-3">{{$book->published_at}}</td>
            <td class="px-2 py-3"><span
                class="flex text-right flex-nowrap whitespace-nowrap">{{$book->stock->stock}}/{{$book->amount}}</span>
            </td>
            <td class="px-2 py-3">
              <div class="flex flex-row justify-center items-center">
                <x-button-link class="px-[6px] py-[6px]" link="{{ route('books.edit', ['book' => $book->id]) }}">
                  <x-icons.edit size="5" />
                </x-button-link>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-section-card>
</x-dashboard-layout>