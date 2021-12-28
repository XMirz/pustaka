<x-dashboard-layout>
    <x-slot name="title">Peminjaman</x-slot>
    <div class="flex flex-row space-x-8">
        <x-cards.total-borrowings totalBorrowedTitle="{{$totalBorrowedTitle ?? 0}}"
            totalBorrowedBooks="{{$totalBorrowedBooks ?? 0}}" />
    </div>
</x-dashboard-layout>