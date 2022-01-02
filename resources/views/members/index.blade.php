<x-dashboard-layout>
  <x-slot name="title">Anggota</x-slot>
  <div class="flex flex-row space-x-8">
    <x-cards.total-members totalMembers="{{$totalMembers}}" />
  </div>
  <x-section-card class="">
    <x-section-header title="Anggota perpustakaan">
      <div class="flex flex-row justify-around items-center">
        <x-button-link title="Tambah" link="{{ route('members.create') }}">
          <x-icons.plus size="5" />
        </x-button-link>
      </div>
    </x-section-header>
    <div class="overflow-x-auto">
      @if($members->count() > 0)
      <table class="w-full">
        <thead class="table-head">
          <tr class="">
            <th class="">#</th>
            <th class="">Nama</th>
            <th class="">Jenis kelamin</th>
            <th class="">Status</th>
            <th class="">NISN / NIP</th>
            <th class="">Alamat</th>
            <th scope=" col" class="relative">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody class="table-body">
          @foreach ($members as $m)
          <tr data-id="{{$m->id}}">
            <td>{{$loop->iteration}}</td>
            <td>{{$m->name}}</td>
            <td>{{$m->gender == 'M' ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>{{$m->role}}</td>
            <td>{{$m->nisn ?? $m->nip ?? '-'}}</td>
            <td>{{$m->address}}</td>
            <td>
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