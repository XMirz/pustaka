<x-dashboard-layout>
  <x-slot name="title">Kategory Buku</x-slot>
  <div class="flex flex-row space-x-8">
    <x-cards.total-categories totalCategories="{{$totalCategories ?? 0}}" />
    <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
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
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Tempat</th>
            <th class="px-4 py-3">Jumlah judul</th>
            <th class="px-4 py-3">Jumlah buku</th>
            <th scope="col" class="relative px-4 py-1 w-12 ">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="text-lg w-full">
          @foreach ($categories as $cat)
          <tr class="hover:bg-gray-100">
            <td class="px-0 py-3 text-center">{{$loop->iteration}}</td>
            <td class="px-4 py-3">{{$cat->name}}</td>
            <td class="px-4 py-3">Rak {{$cat->place}}</td>
            <td class="px-4 py-3">{{$cat->books_count}} judul</td>
            <td class="px-4 py-3">{{$cat->books_count}} buku</td>
            <td class="px-4 py-3">
              <div class="flex flex-row justify-end items-center space-x-2 ">
                <x-button-link class="px-[6px] py-[6px]  hover:scale-110"
                  link="{{ route('categories.edit', ['category' => $cat->id]) }}">
                  <x-icons.edit size="5" />
                </x-button-link>
                @if (!$cat->books->count() > 0)
                <x-button
                  class="px-[6px] py-[6px] !bg-red-500 shadow-red-500/30 hover:shadow-red-500/50  hover:scale-110"
                  onclick="destroyCategory('{{$cat->id}}', '{{$cat->name}}')">
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
  <x-slot name="script">
    <script>
      // @var token ada di layout induk , dashboard-layout
      function destroyCategory(categoryId,name){
        console.log(categoryId)
        Swal.fire({
          title: 'Konfirmasi Hapus ?',
          text: 'Hapus kategory \''+name+ '\'?',
          icon: 'warning',
          showCancelButton: true,
          customClass: {
            confirmButton: "font-poppins font-medium uppercase tracking-wider",
            cancelButton: "font-poppins font-medium uppercase tracking-wider"
          },
          confirmButtonColor: '#22C55E',
          cancelButtonColor: '#ef4444',
          confirmButtonText: 'Konfirmasi',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            url = '{{route('root')}}/categories/'+categoryId;
            fetch(url, {
              headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
              method: 'DELETE',
            })
            .then(res => res.json())
            .then(res=> {
              if(res.status == 'ok'){
                Swal.fire({
                  allowOutsideClick: false,
                  title: 'Berhasil',
                  text: 'Kategory \''+name+ '\' dihapus',
                  icon:'success'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                })
              }
            })
          }
        })
      }
    </script>
  </x-slot>
</x-dashboard-layout>