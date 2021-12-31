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
                  onclick="deleteRow('members','{{$m->id}}','Hapus {{$m->name}}?' , 'Hapus {{$m->name}} dari anggota perpustakaan?','Berhasil dihapus', '{{$m->name}} telah dihapus!' )">
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

  </x-slot>
</x-dashboard-layout>