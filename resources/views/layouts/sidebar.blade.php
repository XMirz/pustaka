<div class=" bg-white w-72 text-gray-800  relative inset-y-0  shadow-md">
  <div class="p-6 space-y-6">
    <div class="py-6 text-center">
      <h1 class="font-poppins text-xl font-semibold">Perpustakaan</h1>
    </div>
    <div id="nav-item" class="">
      <ul class="tracking-wider">
        <x-nav-item title="Dashboard" isActive="{{Request::is('dashboard')}}" link="{{ route('dashboard.index') }}">
          <x-icons.dashboard></x-icons.dashboard>
        </x-nav-item>
        <x-nav-item title="Buku" isActive="{{Request::is('books*')}}" link="{{ route('books.index') }}">
          <x-icons.books></x-icons.books>
        </x-nav-item>
        <x-nav-item title="Peminjaman" isActive="{{Request::is('dashboard/borrowings*')}}"
          link="{{ route('borrowings.index',)}}">
          <x-icons.transaction></x-icons.transaction>
        </x-nav-item>
      </ul>
    </div>
  </div>
</div>