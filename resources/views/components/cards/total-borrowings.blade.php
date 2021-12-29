@props(["totalBorrowedTitle" => 0, "totalBorrowedBooks" => 0])
<div id="total-books-card"
  class="flex-grow border border-black/10 bg-white px-8 py-4 rounded-md shadow-sm hover:shadow-2xl transition-shadow group">
  <div class="">
    <h2 class="font-bold text-xl text-blue-600">Total Peminjaman</h2>
  </div>
  <div class="flex justify-end">
    <div class="flex flex-col items-end justify-end">
      <div class=" h-full w-12">
        <x-icons.switch size="12" class="group-hover:text-blue-600" />
      </div>
      <h3 class="text-lg font-bold mt-auto mb-0.5 ">
        <span class="text-3xl group-hover:text-blue-600 transition-all">{{$totalBorrowedTitle}}</span> Peminjaman
      </h3>
      <h4 class="text-md mt-auto mb-0.5 ">
        <span class=" group-hover:text-blue-600 transition-all">{{$totalBorrowedBooks}}</span> Jumlah
        Buku
      </h4>
    </div>
  </div>
</div>