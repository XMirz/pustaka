<x-slot name="head">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</x-slot>
<div class=" bg-white w-72 text-gray-800  relative inset-y-0  shadow-md">
  <div class="p-6 space-y-6">
    <div class=" flex flex-row items-center space-x-4 justify-center ">
      <div class="w-14 h-14">
        <x-icons.app />
      </div>
      <div class="font-poppins">
        <h1 class="text-xl font-semibold ">Perpustakaan</h1>
        <h4 class="">SMK Telkom</h4>
      </div>
    </div>
    <div class="flex flex-col space-y-4 pt-6">
      <button onclick="addBorrowing()" class="relative bg-white border  border-blue-500 max-w-[3rem] hover:max-w-full hover:grow h-10 overflow-hidden whitespace-nowrap  rounded-md
      flex flex-row justify-center items-center font-poppins font-medium uppercase tracking-wider shadow-xl
      shadow-blue-500/30 hover:shadow-blue-500/50 duration-700 origin-right transition-all  group">
        <x-icons.plus size="5" class="relative my-2 mx-2" />
        <span class="relative py-2 max-w-none group-hover:max-w-full hidden group-hover:inline-block">Peminjaman
          Baru</span>
      </button>
      <div id="nav-item" class="">
        <ul class="tracking-wider">
          <x-nav-item title="Dashboard" isActive="{{Request::is('dashboard')}}" link="{{ route('dashboard.index') }}">
            <x-icons.dashboard></x-icons.dashboard>
          </x-nav-item>
          <x-nav-item title="Buku" isActive="{{Request::is('books*')}}" link="{{ route('books.index') }}">
            <x-icons.books />
          </x-nav-item>
          <x-nav-item title="Peminjaman" isActive="{{Request::is('borrowings*')}}"
            link="{{ route('borrowings.index',)}}">
            <x-icons.transaction />
          </x-nav-item>
          <x-nav-item title="Anggota" isActive="{{Request::is('members*')}}" link="{{ route('members.index',)}}">
            <x-icons.people />
          </x-nav-item>
          <x-nav-item title="Kategory" isActive="{{Request::is('categories*')}}" link="{{ route('categories.index',)}}">
            <x-icons.category />
          </x-nav-item>
        </ul>
      </div>
    </div>
  </div>
</div>