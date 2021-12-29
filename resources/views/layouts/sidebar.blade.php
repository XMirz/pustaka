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
    <div id="nav-item" class="">
      <ul class="tracking-wider">
        <x-nav-item title="Dashboard" isActive="{{Request::is('dashboard')}}" link="{{ route('dashboard.index') }}">
          <x-icons.dashboard></x-icons.dashboard>
        </x-nav-item>
        <x-nav-item title="Buku" isActive="{{Request::is('books*')}}" link="{{ route('books.index') }}">
          <x-icons.books />
        </x-nav-item>
        <x-nav-item title="Peminjaman" isActive="{{Request::is('borrowings*')}}" link="{{ route('borrowings.index',)}}">
          <x-icons.transaction />
        </x-nav-item>
        <x-nav-item title="Anggota" isActive="{{Request::is('members*')}}" link="{{ route('members.index',)}}">
          <x-icons.people />
        </x-nav-item>
      </ul>
    </div>
  </div>
</div>