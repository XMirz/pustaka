<x-slot name="head">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</x-slot>
<div id="sidebar"
  class=" bg-white w-max text-gray-800 absolute md:relative z-10 left-0 inset-y-0  shadow-md -translate-x-full transition-transform">
  <div class="px-4 md:px-6 py-3 md:py-6 space-y-2 md:space-y-6">
    <div class="flex justify-end md:hidden">
      <button onclick="closeSidebar()">
        <x-icons.cross-circle />
      </button>
    </div>
    <div class=" flex flex-row items-center gap-x-2 md:gap-x-4 justify-center ">
      <x-icons.app class="w-10 md:w-12" />
      <div class="font-poppins flex flex-col -space-y-2 md:space-y-0 ">
        <h1 class="md:text-xl  font-semibold ">Perpustakaan</h1>
        <h4 class="">SMK Telkom</h4>
      </div>
    </div>
    <div class="flex flex-col space-y-4 pt-6">
      <div id="nav-item" class="">
        <ul class="tracking-wider space-y-2">
          <li class="">
            <button onclick="addBorrowing()"
              class="flex flex-row fonts items-center space-x-4 w-full px-3 py-2 rounded-lg border border-blue-500 hover:bg-blue-500  hover:text-white transition-all outline-none focus:outline-none ">
              <x-icons.plus></x-icons.plus>
              <span class="tracking-wider font-semibold text-base ">Peminjaman Baru</span>
            </button>
          </li>
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