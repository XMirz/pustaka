<x-dashboard-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-section-header title="Selamat datang, {{auth()->user()->name}}">
        <div class="flex flex-row justify-around items-center">
        </div>
    </x-section-header>
    <div class="flex flex-row flex-wrap gap-4 md:gap-6">
        <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
        <x-cards.total-borrowings totalBorrowedTitle="{{$totalBorrowedTitle ?? 0}}"
            totalBorrowedBooks="{{$totalBorrowedBooks ?? 0}}" />
        <x-cards.total-members totalMembers="{{$totalMembers}}" />
        <x-cards.total-categories totalCategories="{{$totalCategories ?? 0}}" />
    </div>
</x-dashboard-layout>