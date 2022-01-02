@props(['book'])
<div href="{{route('books.index')}}" id=" total-books-card"
  class="text-lg flex flex-row gap-4 flex-grow  border border-black/10 bg-white px-4 md:px-8 py-4 md:py-6 rounded-md shadow-sm">
  <div
    class=" overflow-hidden flex-shrink-0 h-fit w-24 md:w-32 aspect-[12/16] rounded bg-gray-300 flex items-center justify-center">
    @if($book->cover)
    <img class="object-cover h-full" src="{{asset('storage/'.$book->cover)}}" alt="" srcset="">
    @else
    <x-icons.books size="12" class=" text-gray-600" />
    @endif
  </div>
  <div class="">
    <h2 class="font-bold text-base md:text-lg xl:text-xl leading-5 max-w-lg">{{$book->title}} {{$book->title_description
      != '' ? '-
      "'.$book->title_description.'"'
      :
      ''}}
    </h2>
    <h5 class="text-base md:text-lg">oleh {{$book->author->name}}</h5>
    <div class="mt-2 leading-4 text-base md:text-lg">
      <h5 class="">
        <span class="w-20 md:w-36 inline-flex">Jumlah</span>: {{$book->amount}} buku
      </h5>
      <h5 class="flex max-w-lg">
        <span class="w-20 md:w-36 flex-shrink-0">Penerbit</span> :&nbsp;<span class="">{{$book->publisher->name}},
          {{$book->published_at}}.
          Tahun
          {{$book->publication_year}}</span>
      </h5>
      <h5 class="">
        <span class="w-20 md:w-36 inline-flex">Jumlah halaman</span>: {{$book->exemplar}} halaman
      </h5>
    </div>
  </div>
</div>