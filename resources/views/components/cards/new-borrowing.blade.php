@props(['borrowing'])
<div href="{{route('borrowings.index')}}" id=" total-books-card"
  class="flex-grow  border border-black/10 bg-white px-8 py-4 rounded-md shadow-sm hover:shadow-2xl transition-shadow group">
  <h2 class="font-bold text-xl ">{{$borrowing->book->title}}</h2>
  <h4 class="text-xl ">oleh {{$borrowing->member->name}}</h4>
  <div class="text-lg mt-2 leading-5">
    <h4 class="">
      <span class="w-48 inline-flex">Jumlah</span>: {{$borrowing->member->name}}
    </h4>
    <h4 class="">
      <span class="w-48 inline-flex">Tanggal pengembalian</span>: {{Date('d F Y', strtotime($borrowing->return_date))}}
    </h4>
  </div>
</div>