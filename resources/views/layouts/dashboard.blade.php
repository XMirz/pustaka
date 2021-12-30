<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Laravel' }}</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,800&display=swap"
    rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->

  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{$head ?? ''}}
</head>

<body class="font-sans text-gray-600 antialiased h-screen overflow-hidden">
  <div class="bg-gray-100 flex flex-row">
    <!-- Page Content -->
    @include('layouts.sidebar')
    <div class="h-screen w-full overflow-x-auto">
      @include('layouts.navbar')
      <main class="relative h-[calc(100vh-56px)] px-8 space-y-6 pb-8 overflow-y-auto">
        <div class="pt-8">
          <h1 class="font-semibold font-poppins tracking-widest text-gray-700 text-3xl">{{$title ?? ''}}</h1>
        </div>
        {{ $slot }}
      </main>
    </div>
  </div>
  {{$modal ?? ''}}
  <div class="absolute inset-0 hidden">
    <div class="w-full h-full z-20 bg-black/50 flex justify-center items-center">
      <div class="bg-white rounded-lg px-12 py-8">
        <form id="addBorrowing" class="px-8 pb-12" action="{{route('borrowings.store')}}" method="post">
          <div class="w-full flex flex-col space-y-4 text-left">
            <div class="relative flex flex-col " x-data="bookcodes()">
              <x-label class="text-base" for="book_code" :value="__('Kode buku')" />
              <x-input id="book_code" name="book_code" type="text" placeholder="Kode" :value="old('book_code')" required
                autofocus autocomplete="off" x-on:keyup="open = false" x-on:keyup.debounce.750="onChange()"
                x-model="bookcode" x-init="initialize('{{old('book_code' )}}')" />
              {{-- Untuk dropdown peminjam --}}
              <div @click.outside="open = false"
                class="absolute block z-10 top-[calc(100%-0.5rem)] inset-x-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                x-show="open">
                <ul class="" x-html="list">
                </ul>
              </div>
            </div>
            <div class="relative flex flex-col  flex-grow" x-data="inputSelect('member')">
              <x-label class="text-base" for="borrower" :value="__('Nama Peminjam')" />
              <x-input id="borrower" name="borrower" type="text" placeholder="Nama" required autofocus
                autocomplete="off" x-on:keyup="open = false" x-on:keyup.debounce.750="onChange()" x-model="member"
                x-init="initialize('{{old('borrower')}}')" />
              {{-- Untuk dropdown peminjam --}}
              <div @click.outside="open = false"
                class="absolute block z-10 top-[calc(100%-0.5rem)] inset-x-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                x-show="open">
                <ul class="" x-html="list">
                </ul>
              </div>
            </div>
            <div class="flex flex-col ">
              <x-label class="text-base" for="return_date" :value="__('Tanggal Pengembalian')" />
              <x-input id="return_date" name="return_date" type="date" :value="old('return_date')" required autofocus />
              <x-validation-error field="return_date" />
            </div>
            <div class="flex flex-col ">
              <x-label class="text-base" for="amount" :value="__('Jumlah buku')" />
              <x-input id="amount" name="amount" type="number" placeholder="Jumlah" :value="old('amount')" required
                autofocus autocomplete="off" />
            </div>
            @csrf
            <div class="">
              <x-button class="">
                {{ __('Simpan') }}
              </x-button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // sidebar
    let sidebar = document.querySelector('#sidebar');
    function closeSidebar() {
      sidebar.classList.add('-translate-x-full');
    };
    function showSidebar() {
      sidebar.classList.remove('-translate-x-full');
    };
    function checkWindowSize() {
      console.log(window.matchMedia('(min-width: 768px)'));
      if (window.matchMedia('(min-width: 768px)').matches) showSidebar();
      else closeSidebar()
    };
    window.onresize = checkWindowSize;
    window.onload = checkWindowSize;
  </script>
  <script>
    function bookcodes() {
      return {
        bookcode: '',
        open: false,
        initialize(value) {
          this.bookcode = value
        },
        list: '',
        select(selectedInput) {
          this.open = false,
            this.bookcode = selectedInput
        },
        async onChange() {
          if (this.bookcode == '') return;
          let uri = `{{route('root')}}/ajax/bookcodes/${this.bookcode}`;
          await fetch(uri)
            .then((response) => response.json())
            .then((response) => {
              let fetchedList = ' ';
              if (response.length < 1) return;
              response.forEach(function (element) {
                fetchedList += `<li class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                x-on:click="select('${element.code}')">
                ${element.label}
              </li>`
              });
              this.list = fetchedList
              this.open = true
            })
            .catch(err => console.log(err))
        }
      }
    };

    function inputSelect(name) {
      return {
        [name]: '',
        open: false,
        initialize(value) {
          this[name] = value
        },
        list: '',
        select(selectedInput) {
          this.open = false,
            this[name] = selectedInput
        },
        async onChange() {
          if (this[name] == '') return;
          let uri = `{{route('root')}}/ajax/${name}s/${this[name]}`;
          console.log(uri);
          await fetch(uri)
            .then((response) => response.json())
            .then((response) => {
              let fetchedList = ' ';
              if (response.length < 1) return;
              response.forEach(function (element) {
                fetchedList += `<li class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                x-on:click="select('${element.name}')">
                ${element.name}
              </li>`
              });
              this.list = fetchedList
              this.open = true
            })
            .catch(err => console.log(err))
        }
      }
    }
  </script>
  <script>
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let formAddBorrowing = document.querySelector('#addBorrowing').outerHTML
    function addBorrowing() {
      Swal.fire({
        title: '<h2 class="pt-8"><span class="font-poppins">Peminjaman baru</span></h2>',
        html: formAddBorrowing,
        showCancelButton: false,
        showConfirmButton: false,
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
          url = '{{route('root')}}/borrowings/' + borrowingId;
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
              'return_date': returndate
            })
          })
            .then(res => res.json())
            .then(res => {
              // console.log(res);
              if (res.status == 'ok') {
                Swal.fire({
                  title: 'Berhasil',
                  text: 'Tanggal pengembalian diperpanjang',
                  icon: 'success',
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
  </script>
  {{$script ?? '' }}
</body>

</html>