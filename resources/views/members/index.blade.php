<x-dashboard-layout>
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
        <tbody class="text-base lg:text-lg w-full leading-5">
          @foreach ($members as $m)
          <tr class="hover:bg-gray-100" data-id="{{$m->id}}">
            <td class="px-0 py-1 lg:py-2 text-center">{{$loop->iteration}}</td>
            <td class="px-4 py-1 lg:py-2">{{$m->name}}</td>
            <td class="px-4 py-1 lg:py-2">{{$m->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td class="px-4 py-1 lg:py-2">{{$m->role}}</td>
            <td class="px-4 py-1 lg:py-2">{{$m->nisn ?? $m->nip ?? '-'}}</td>
            <td class="px-4 py-1 lg:py-2">{{$m->address}}</td>
            <td class="px-4 py-1 lg:py-2">
              <div class="flex flex-row justify-end items-center space-x-2  ">
                <x-button-link class="px-[6px] py-[6px] hover:scale-110"
                  link="{{ route('members.edit', ['member' => $m->id]) }}">
                  <x-icons.edit size="5" />
                </x-button-link>
                @if (!$m->borrowing->where('status', '=', 'NOT_RETURNED' )->count() >
                0)
                <x-button
                  class="px-[6px] py-[6px] !bg-red-500 shadow-red-500/30 hover:shadow-red-500/50  hover:scale-110"
                  onclick="destroyMember('{{$m->id}}', '{{$m->name}}')">
                  <x-icons.trash size="5" />
                </x-button>
                @endif
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
      // @var token ada di layout induk , dashboard-layout
      function destroyMember(memberId,name){
        console.log(memberId)
        Swal.fire({
          title: 'Hapus '+name+ '?',
          text: 'Hapus '+name+ ' dari anggota perpustakaan?',
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
            url = '{{route('root')}}/members/'+memberId;
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
                  text: name+ ' dihapus',
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