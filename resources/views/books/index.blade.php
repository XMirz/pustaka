<x-dashboard-layout>
  <x-slot name="title">Buku</x-slot>
  <div class="flex flex-row flex-wrap gap-4 md:gap-6">
    <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
    <x-cards.total-categories totalCategories="{{$totalCategories ?? 0}}" />
  </div>



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
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Kode buku</th>
            <th class="px-4 py-3">ISBN</th>
            <th class="px-4 py-3">Penulis</th>
            <th class="px-4 py-3">Penerbit</th>
            <th class="px-4 py-3">Alamat penerbit</th>
            <th class="px-4 py-3">Stok</th>
            <th scope=" col" class="relative px-4 py-1">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="text-base lg:text-lg w-full leading-5">
          @foreach ($books as $book)
          <tr class="hover:bg-gray-100">
            <td class="px-0 py-1 lg:py-2 text-center">{{$loop->iteration}}</td>
            <td class="px-4 py-1 lg:py-2">{{$book->title}}</td>
            <td class="px-4 py-1 lg:py-2">{{$book->book_code}}</td>
            <td class="px-4 py-1 lg:py-2">{{$book->isbn}}</td>
            <td class="px-4 py-1 lg:py-2">{{$book->author->name}}</td>
            <td class="px-4 py-1 lg:py-2">{{$book->publisher->name}}</td>
            <td class="px-4 py-1 lg:py-2">{{$book->published_at}}</td>
            <td class="px-4 py-1 lg:py-2"><span
                class="flex text-right flex-nowrap whitespace-nowrap">{{$book->stock->stock}}/{{$book->amount}}</span>
            </td>
            <td class="px-4 py-1 lg:py-2">
              <div class="flex flex-row justify-end items-center space-x-2  ">
                <x-button-link class="px-[6px] py-[6px]  hover:scale-110"
                  link="{{ route('books.edit', ['book' => $book->id]) }}">
                  <x-icons.edit size="5" />
                </x-button-link>
                @if (!$book->borrowings->where('status', '=', 'NOT_RETURNED' )->count() >
                0)
                <x-button
                  class="px-[6px] py-[6px] !bg-red-500 shadow-red-500/30 hover:shadow-red-500/50  hover:scale-110"
                  onclick="deleteRow('books','{{$book->id}}','Hapus {{$book->title}}?' , 'Yakin ingin menghapus buku {{$book->title}}?','Berhasil dihapus', 'Buku {{$book->title}} telah dihapus!' )">
                  <x-icons.trash size="5" />
                </x-button>
                @endif
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </x-section-card>
</x-dashboard-layout>