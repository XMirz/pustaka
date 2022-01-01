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
        <thead class="table-head">
          <tr class="">
            <th>#</th>
            <th>Judul</th>
            <th>Kode buku</th>
            <th>ISBN</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Alamat penerbit</th>
            <th>Stok</th>
            <th scope=" col" class="relative">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="table-body">
          @foreach ($books as $book)
          <tr class="">
            <td>{{$loop->iteration}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->book_code}}</td>
            <td>{{$book->isbn}}</td>
            <td>{{$book->author->name}}</td>
            <td>{{$book->publisher->name}}</td>
            <td>{{$book->published_at}}</td>
            <td><span
                class="flex text-right flex-nowrap whitespace-nowrap">{{$book->stock->stock}}/{{$book->amount}}</span>
            </td>
            <td>
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