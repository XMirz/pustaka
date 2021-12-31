<x-dashboard-layout>
  <x-slot name="title">Anggota Perpustakaan</x-slot>
  <x-section-card class="">
    <x-section-header title="Data anggota">
    </x-section-header>
    <div class="">
      <form action="{{route('members.update', ['member' => $member])}}" method="POST">
        @method('PUT')
        <div class="flex flex-row space-x-8 my-4">
          {{-- Form Kiri --}}
          <div class="flex-1 flex flex-col space-y-4">
            <div class="flex flex-col gap-y1 md:gap-y-2">
              <x-label for="name" :value="__('Nama lengkap')" />
              <x-input id="name" name="name" type="text" placeholder="Nama" :value="old('name', $member->name)" required
                autofocus />
            </div>

            <div class="flex flex-col gap-y1 md:gap-y-2" x-data="status">
              <x-label for="role" :value="__('Status')" />
              {{-- Custom Select Dropdowm --}}
              <input type="hidden" id="role" name="role" x-model="current" />
              <div class="relative">
                <button type="button" x-on:click="open=true"
                  class="relative  text-left w-full px-3 py-[9px] ring-1 ring-gray-300 hover:ring-blue-500  focus:ring-2 focus:ring-blue-500 rounded-md transition"
                  x-text="current">
                </button>
                <div @click.outside="open = false"
                  class="absolute z-10 top-11 left-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                  x-show="open">
                  <ul class="">
                    <li class="px-3 py-2  hover:bg-gray-100 cursor-pointer" x-on:click="select('Siswa', 'Siswa')">
                      Siswa
                    </li>
                    <li class="px-3 py-2  hover:bg-gray-100 cursor-pointer" x-on:click="select('Guru', 'Guru')">
                      Guru
                    </li>
                    <li class="px-3 py-2  hover:bg-gray-100 cursor-pointer" x-on:click="select('Karyawan', 'Karyawan')">
                      Karyawan
                    </li>
                  </ul>
                </div>
              </div>
              {{-- End custom select --}}
            </div>

            <div class="flex flex-col gap-y1 md:gap-y-2">
              <x-label for="code" :value="__('NIP/NISN')" />
              <x-input id="code" name="code" type="number" placeholder="NIP/NISN"
                :value="old('code', $member->nisn ?? $member->nip ?? '')" required autofocus />
            </div>

            <div class="flex flex-col gap-y1 md:gap-y-2" x-data="gender">
              <x-label for="gender" :value="__('Jenis Kelamin')" />
              {{-- Custom Select Dropdowm --}}
              <input type="hidden" id="gender" name="gender" x-model="currentId" />
              <div class="relative">
                <button type="button" x-on:click="open=true"
                  class="relative  text-left w-full px-3 py-[9px] ring-1 ring-gray-300 hover:ring-blue-500  focus:ring-2 focus:ring-blue-500 rounded-md transition"
                  x-text="current">
                </button>
                <div x-on:click.outside="open = false"
                  class="absolute z-10 top-11 left-0 bg-white shadow-lg rounded-md overflow-hidden ring-1 ring-black ring-opacity-5 py-1"
                  x-show="open">
                  <ul class="">
                    <li class="px-3 py-2  hover:bg-gray-100 cursor-pointer" x-on:click="select('Laki-laki', 'M')">
                      Laki-laki
                    </li>
                    <li class="px-3 py-2  hover:bg-gray-100 cursor-pointer" x-on:click="select('Perempuan', 'F')">
                      Perempuan
                    </li>
                  </ul>
                </div>
              </div>
              {{-- End custom select --}}
            </div>

            <div class="flex flex-col gap-y1 md:gap-y-2">
              <x-label for="address" :value="__('Alamat')" />
              <x-input id="address" name="address" type="text" placeholder="Alamat"
                :value="old('address', $member->address)" required autofocus />
            </div>
          </div>
        </div>
        @csrf
        <x-button class="w-full lg:w-auto justify-center lg:justify-start">
          {{ __('Simpan') }}
        </x-button>
      </form>
    </div>
  </x-section-card>
  <x-slot name="script">
    <script>
      document.addEventListener('alpine:init',()=>{
        Alpine.data('status', () => ({
          open : false,
          current : '{{$member->role}}',
          select(selected, selectedId){
            this.open = false;
            this.current =selected;
          }
        }));
        Alpine.data('gender', () => ({
          open : false,
          current : '{{$member->gender == "M" ? 'Laki-laki' : 'Perempuan'}}',
          currentId: '{{$member->gender}}',
          select(selected, selectedId){
            this.open = false;
            this.current =selected;
            this.currentId = selectedId;
          }
        }));
      });
    </script>
  </x-slot>
</x-dashboard-layout>