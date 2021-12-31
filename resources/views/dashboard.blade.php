<x-dashboard-layout>
  <x-slot name="title">Dashboard</x-slot>
  <x-section-header title="Selamat datang, {{auth()->user()->name}}">
  </x-section-header>
  <div class="flex flex-row flex-wrap gap-4 md:gap-6">
    <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
    <x-cards.total-borrowings totalBorrowedTitle="{{$totalBorrowedTitle ?? 0}}"
      totalBorrowedBooks="{{$totalBorrowedBooks ?? 0}}" />
    <x-cards.total-members totalMembers="{{$totalMembers}}" />
    <x-cards.total-categories totalCategories="{{$totalCategories ?? 0}}" />
  </div>
  {{-- --}}
  <x-section-header title="Peminjaman buku terbaru">
  </x-section-header>
  <div class="flex flex-row flex-wrap gap-2">
    @foreach ($borrowings as $b)
    @if(!($loop->iteration > 4))
    <x-cards.new-borrowing :borrowing="$b" />
    @endif
    @endforeach

  </div>
  {{-- --}}
  <x-section-header title="Buku terbaru">
  </x-section-header>
  <div class="flex flex-row flex-wrap gap-2 ">
    @foreach ($books as $b)
    @if(!($loop->iteration > 4))
    <x-cards.new-book :book="$b" />
    @endif
    @endforeach

  </div>
</x-dashboard-layout>