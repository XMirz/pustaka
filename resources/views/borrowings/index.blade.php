<x-dashboard-layout>
  <x-slot name="title">Peminjaman</x-slot>
  <div class="flex flex-row  space-x-8">
    <x-cards.total-borrowings totalBorrowedTitle="{{$totalBorrowedTitle ?? 0}}"
      totalBorrowedBooks="{{$totalBorrowedBooks ?? 0}}" />
  </div>
  <x-section-card>
    <x-section-header title="Peminjaman baru">
      <div class="flex flex-row justify-around items-center">
        {{-- <x-button-link title="Tambah" link="{{ route('borrowings.create') }}">
          <x-icons.plus size="5" />
        </x-button-link> --}}
      </div>

    </x-section-header>
    <form action="{{route('borrowings.store')}}" method="post">
      <div class="w-full flex flex-col lg:flex-row gap-y-4 gap-x-8 ">
        {{-- Right form --}}
        <div class="contents lg:w-1/2 lg:flex lg:flex-col gap-y-4">
          <div class="relative flex flex-col space-y-1 md:space-y-2" x-data="bookcodes()">
            <x-label for="book_code" :value="__('Kode buku')" />
            <x-input id="book_code" name="book_code" type="text" placeholder="Kode" :value="old('book_code')" required
              autofocus autocomplete="off" x-on:keyup="open = false" x-on:keyup.debounce.750="onChange()"
              x-model="bookcode" x-init="initialize('{{old('book_code' )}}')" />
            @error('book_code')
            <span class="text-red-500">{{$message}}</span>
            @enderror
            {{-- Untuk dropdown peminjam --}}
            <div @click.outside="open = false"
              class="absolute block z-10 top-[calc(100%-0.5rem)] inset-x-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
              x-show="open">
              <ul class="" x-html="list">
              </ul>
            </div>
          </div>
          <div class="relative flex flex-col space-y-2 flex-grow" x-data="inputSelect('member')">
            <x-label for="borrower" :value="__('Nama Peminjam')" />
            <x-input id="borrower" name="borrower" type="text" placeholder="Nama" required autofocus autocomplete="off"
              x-on:keyup="open = false" x-on:keyup.debounce.750="onChange()" x-model="member"
              x-init="initialize('{{old('borrower')}}')" />
            @error('borrower')
            <span class="text-red-500">{{$message}}</span>
            @enderror
            {{-- Untuk dropdown peminjam --}}
            <div @click.outside="open = false"
              class="absolute block z-10 top-[calc(100%-0.5rem)] inset-x-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
              x-show="open">
              <ul class="" x-html="list">
              </ul>
            </div>
          </div>

        </div>
        {{-- Left from --}}
        <div class="contents lg:w-1/2 lg:flex lg:flex-col gap-y-4">
          <div class="flex flex-col space-y-2">
            <x-label for="return_date" :value="__('Tanggal Pengembalian')" />
            <x-input id="return_date" name="return_date" type="date" :value="old('return_date')" required autofocus />
            <x-validation-error field="return_date" />
          </div>
          <div class="flex flex-col space-y-2">
            <x-label for="amount" :value="__('Jumlah buku')" />
            <div class="w-full flex flex-row justify-between gap-x-4 md:gap-x-8">
              <x-input id="amount" name="amount" type="number" placeholder="Jumlah" :value="old('amount')" required
                autofocus autocomplete="off" class="flex-grow" />
              <x-button class="">
                {{ __('Simpan') }}
              </x-button>
            </div>
            @error('amount')
            <span class="text-red-500">{{$message}}</span>
            @enderror
          </div>
          @csrf
        </div>
      </div>
    </form>
  </x-section-card>
  <x-section-card class="">
    <x-section-header title="Peminjaman berlangsung">
      <div class="flex flex-row justify-around items-center">
        {{-- <x-button-link title="Tambah" link="{{ route('borrowings.create') }}">
          <x-icons.plus size="5" />
        </x-button-link> --}}
      </div>
    </x-section-header>
    <div class="overflow-x-auto">
      @if($borrowings->count() > 0)
      <table class="w-full">
        <thead class="border-b border-gray-200 uppercase tracking-wider font-poppins font-semibold text-center">
          <tr class="">
            <th class="px-0 pb-3">#</th>
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Kode buku</th>
            <th class="px-4 py-3">Nama peminjam</th>
            <th class="px-4 py-3">Jumlah</th>
            <th class="px-4 py-3">Tanggal peminjaman</th>
            <th class="px-4 py-3">Batas pengembalian</th>
            <th scope=" col" class="relative px-4 py-1">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="text-base lg:text-lg w-full leading-5">
          @foreach ($borrowings as $b)
          <tr class="hover:bg-gray-100" data-id="{{$b->id}}">
            <td class="px-0 py-1 lg:py-2 text-center">{{$loop->iteration}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->book->title}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->book->book_code}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->member->name}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->amount}}</td>
            <td class="px-4 py-1 lg:py-2">{{Date('d F Y', strtotime($b->created_at))}}</td>
            <td class="px-4 py-1 lg:py-2">{{Date('d F Y', strtotime($b->return_date))}}</td>
            <td class="px-4 py-1 lg:py-2">
              <div class="flex flex-row justify-end items-center space-x-2">
                <x-button class="px-[6px] py-[6px] bg-green-500  hover:scale-110"
                  onclick="returnBook({{$b->id}},'{{$b->book->title}}', '{{$b->member->name}}')">
                  <x-icons.check size="5" />
                </x-button>
                <x-button class="px-[6px] py-[6px]  hover:scale-110"
                  onclick="addMoreDate({{$b->id}},'{{$b->book->title}}', '{{$b->member->name}}', '{{$b->return_date}}')">
                  <x-icons.plus size="5" />
                </x-button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="flex flex-col justify-center items-center space-y-4">
        <x-icons.cross-circle size="12" />
        <h4 class="text-xl">Tidak ada peminjaman berlangsung</h4>
      </div>
      @endif
    </div>
  </x-section-card>

  <x-section-card class="">
    <x-section-header title="Riwayat peminjaman">
      <div class=" flex flex-row justify-around items-center">
        {{-- <x-button-link title="Tambah" link="{{ route('borrowings.create') }}">
          <x-icons.plus size="5" />
        </x-button-link> --}}
      </div>
    </x-section-header>
    <div class="overflow-x-auto">
      @if($borrowingsHistory->count() > 0)
      <table class="w-full">
        <thead class="border-b border-gray-200 uppercase tracking-wider font-poppins font-semibold text-center">
          <tr class="">
            <th class="px-0 pb-3">#</th>
            <th class="px-4 py-3">Judul</th>
            <th class="px-4 py-3">Kode buku</th>
            <th class="px-4 py-3">Nama peminjam</th>
            <th class="px-4 py-3">Jumlah</th>
            <th class="px-4 py-3">Tanggal peminjaman</th>
            <th class="px-4 py-3">Tanggal pengembalian</th>
            {{-- <th scope=" col" class="relative px-4 py-1">
              <span class="sr-only">Edit</span>
            </th> --}}
          </tr>
        </thead>
        <tbody id="history" class="text-base lg:text-lg w-full leading-5">
          @foreach ($borrowingsHistory as $b)
          <tr class="hover:bg-gray-100" data-id="{{$b->id}}">
            <td class="px-0 py-1 lg:py-2 text-center">{{$loop->iteration}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->book->title}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->book->book_code}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->member->name}}</td>
            <td class="px-4 py-1 lg:py-2">{{$b->amount}}</td>
            <td class="px-4 py-1 lg:py-2">{{Date('d F Y', strtotime($b->created_at))}}</td>
            <td class="px-4 py-1 lg:py-2">{{Date('d F Y', strtotime($b->returned_at))}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="flex flex-col justify-center items-center space-y-4">
        <x-icons.cross-circle size="12" />
        <h4 class="text-xl">Tidak ada riwayat peminjaman</h4>
      </div>
      @endif
    </div>
  </x-section-card>

  {{-- <x-slot name="modal">
    <div class="absolute inset-0 z-20 h-screen w-screen bg-black bg-opacity-50 flex items-center justify-center">
      <div class=" w-1/2 p-8 bg-white rounded-2xl flex-flex">

      </div>
    </div>
  </x-slot> --}}







  <x-slot name="script">
    <script>
      // @var token ada di layout induk , dashboard-layout
      function addMoreDate(borrowingId, title, borrower, currentDate, error = null){
        Swal.fire({
          title: 'Perbarui waktu pengembalian',
          html: ''+
            '<div class="flex flex-col items-center justify-center py-1 space-y-4">'+
              '<div class="flex flex-col">'+
                '<span> Judul : '+title+'</span>'+
                '<span> Peminjam : '+borrower+'</span>'+
                '<span> Tanggal pengembalian : '+currentDate+'</span>'+
              '</div>'+
                '<input type="date" id="update_return_date" name="return_date" value="'+currentDate+'" class="block w-1/2 rounded-md outline-none border-1 border-gray-300 hover:border-blue-500 focus:border-blue-500 transition-all"></input>'+
                (error ? '<span class="text-red-500">' : '') + (error ? error : '') + (error ? '</span>' : '') +
            '</div>',
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
            url = '{{route('root')}}/borrowings/'+borrowingId;
            let returndate = document.querySelector('#update_return_date').value;
            console.log(returndate);
            fetch(url, {
              headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
              method: 'PUT',
              body: JSON.stringify({
                '_token': token,
                'return_date' : returndate
              })
            })
            .then(res => res.json())
            .then(res=> {
              // console.log(res);
              if(res.status == 'ok'){
                Swal.fire({
                  title: 'Berhasil',
                  text: 'Tanggal pengembalian diperpanjang',
                  icon:'success',
                  closeOnClickOutside: false
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                })
              } else {
                addMoreDate(borrowingId, title, borrower, returndate, res.message);
              }
            })
          }
        });
      };

      function returnBook(borrowingId,title, borrower){
        console.log(borrowingId)
        Swal.fire({
          title: 'Konfirmasi pengembalian?',
          text: "Konfirmasi pengembalian buku "+title+" oleh "+borrower+ "?",
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
            url = '{{route('root')}}/borrowings/'+borrowingId;
            fetch(url, {
              headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
              method: 'PATCH',
            })
            .then(res => res.json())
            .then(res=> {
              // console.log(res);
              if(res.status == 'ok'){
                // let selector = "[data-id='"+borrowingId+"']";
                // $returnedElement = document.querySelector(selector);
                // document.querySelector('#history').append($returnedElement);
                Swal.fire({
                  title: 'Berhasil',
                  text: 'Pengembalian tersimpan',
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