@props(['borrowing'])
<div href="{{route('borrowings.index')}}"
  class="card-dashboard flex-grow  border border-black/10 bg-white px-4 md:px-8 py-4 md:py-6 rounded-md shadow-sm">
  <h2 class="font-bold text-base md:text-lg  xl:text-xl leading-5">{{$borrowing->book->title}}</h2>
  <h4 class="text-xl ">oleh {{$borrowing->member->name}}</h4>
  <div class="text-base md:text-lg mt-2 leading-4">
    <h4 class="">
      <span class="w-48 inline-flex">Jumlah</span>: {{$borrowing->amount}}
    </h4>
    <h4 class="">
      <span class="w-48 inline-flex">Tanggal pengembalian</span>: {{Date('d F Y', strtotime($borrowing->return_date))}}
    </h4>
  </div>
</div>