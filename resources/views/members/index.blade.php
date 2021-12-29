<x-dashboard-layout>
  <x-slot name="head">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </x-slot>

  <x-slot name="title">Anggota</x-slot>
  <div class="flex flex-row space-x-8">
    <x-cards.total-members totalMembers="{{$totalMembers}}" />
  </div>
  <x-section-card class="">
    <x-section-header title="Anggota perpustakaan">
      <div class="flex flex-row justify-around items-center">
        <x-button-link title="Tambah Anggota" link="{{ route('members.create') }}">
          <x-icons.plus size="5" />
        </x-button-link>
      </div>
    </x-section-header>
    <div class="overflow-x-auto">
      @if($members->count() > 0)
      <table class="w-full">
        <thead class="border-b border-gray-200 uppercase tracking-wider font-poppins font-semibold text-center">
          <tr class="">
            <th class="px-0 pb-3">#</th>
            <th class="px-4 py-3">Nama</th>
            <th class="px-4 py-3">Jenis kelamin</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">NISN / NIP</th>
            <th class="px-4 py-3">Alamat</th>
            <th scope=" col" class="relative px-4 py-1">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="text-lg w-full">
          @foreach ($members as $m)
          <tr class="hover:bg-gray-100" data-id="{{$m->id}}">
            <td class="px-0 py-3 text-center">{{$loop->iteration}}</td>
            <td class="px-4 py-3">{{$m->name}}</td>
            <td class="px-4 py-3">{{$m->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td class="px-4 py-3">{{$m->role}}</td>
            <td class="px-4 py-3">{{$m->nisn ?? $m->nip ?? '-'}}</td>
            <td class="px-4 py-3">{{$m->address}}</td>
            <td class="px-4 py-3">
              <div class="flex flex-row justify-center items-center space-x-2">
                <x-button-link class="px-[6px] py-[6px]" link="{{ route('members.edit', ['member' => $m->id]) }}">
                  <x-icons.edit size="5" />
                </x-button-link>
                <x-button-link class="px-[6px] py-[6px]">
                  <x-icons.plus size="5" />
                </x-button-link>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="flex flex-col justify-center items-center space-y-4">
        <x-icons.cross-circle size="12" />
        <h4 class="text-xl">Belum ada anggota perpustakaan.</h4>
      </div>
      @endif
    </div>
  </x-section-card>


  <x-slot name="script">
    <script>
      function bookcodes() {
        return {
          bookcode: '',
          open: false,
          initialize(value){
            this.bookcode = value
          },
          list: '',
          select(selectedInput){
            this.open = false,
            this.bookcode = selectedInput
          },
          async onChange(){
            if(this.bookcode == '') return;
            let uri = `{{route('root')}}/ajax/bookcodes/${this.bookcode}`;
            await fetch(uri)
            .then((response) => response.json())
            .then((response) => {
              let fetchedList = ' ';
              if(response.length < 1) return;
              response.forEach(function (element){
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
          initialize(value){
            this[name] = value
          },
          list: '',
          select(selectedInput){
            this.open = false,
            this[name] = selectedInput
          },
          async onChange(){
            if(this[name] == '') return;
            let uri = `{{route('root')}}/ajax/${name}s/${this[name]}`;
            console.log(uri);
            await fetch(uri)
            .then((response) => response.json())
            .then((response) => {
              let fetchedList = ' ';
              if(response.length < 1) return;
              response.forEach(function (element){
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
                '<input type="date" id="update_return_date" name="return_date" value="'+currentDate+'" class="block w-full rounded-md outline-none border-1 border-gray-300 hover:border-blue-500 focus:border-blue-500 transition-all"></input>'+
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
                  icon:'success'
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