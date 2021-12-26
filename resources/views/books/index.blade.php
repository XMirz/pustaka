<x-dashboard-layout>
    <x-slot name="title">Buku</x-slot>
    <div class="flex flex-row space-x-8">
        <x-cards.total-books totalTitle="{{$totalTitle ?? 0}}" totalBooks="{{$totalBooks ?? 0}}" />
    </div>
    <x-section-header title="Daftar Buku">
        <div class="flex flex-row justify-around items-center">
            <x-button-link title="Tambah" link="{{ route('books.create') }}">
                <x-icons.plus size="5" />
            </x-button-link>
        </div>
    </x-section-header>
</x-dashboard-layout>