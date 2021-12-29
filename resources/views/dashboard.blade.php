<x-dashboard-layout>
    <x-slot name="title">Dashboard</x-slot>
    <div class="flex flex-row space-x-8">
        <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
        <x-cards.total-borrowings totalBorrowedTitle="{{$totalBorrowedTitle ?? 0}}"
            totalBorrowedBooks="{{$totalBorrowedBooks ?? 0}}" />
        <x-cards.total-members totalMembers="{{$totalMembers}}" />
    </div>
</x-dashboard-layout>