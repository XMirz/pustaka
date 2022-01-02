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
                {{-- Show --}}
                <x-button
                  class="px-[6px] py-[6px] bg-gray-500 shadow-gray-500/30 hover:shadow-gray-500/50  hover:scale-110"
                  onclick="showBook('{{$book->id}}')">
                  <x-icons.eye size="5" />
                </x-button>

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
  {{-- Modal template --}}
  <x-slot name="modal">
    {{-- Loading --}}
    <div id="spinner" class="flex justify-center items-center overflow-hidden">
      <div class="w-12 h-12 border-4 animate-spin border-gray-300 border-t-4 border-t-blue-500 rounded-full"></div>
    </div>
    {{-- Book Card --}}
  </x-slot>
  <x-slot name="script">
    <script>
      let spinner = document.querySelector('#spinner').outerHTML;
      async function showBook(id){
        let url = '{{route('root')}}/books/'+id;
        let swal = Swal;
        swal.fire({
            // title: '',
            html: spinner,
            showCancelButton: false,
            showConfirmButton: false,
        });
        fetch(url)
        .then(res => res.json())
        .then(res => {
          if(res.status == 'ok'){
            console.log(res);
            swal.fire({
              width: 'auto',
              html: res.html,
              showCancelButton: false,
              showConfirmButton: false,
            });
          }
        });
      };
    </script>
  </x-slot>
</x-dashboard-layout>