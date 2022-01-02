@props(['book'])
<div href="{{route('books.index')}}" id=" total-books-card"
  class=" flex flex-row gap-4 flex-grow  border border-black/10 bg-white px-4 md:px-8 py-4 md:py-6 rounded-md shadow-sm">
  <div
    class=" overflow-hidden flex-shrink-0 h-fit w-24 md:w-32 aspect-[12/16] rounded bg-gray-300 flex items-center justify-center">
    @if($book->cover)
    <img class="object-cover h-full" src="{{asset('storage/'.$book->cover)}}" alt="" srcset="">
    @else
    <x-icons.books size="12" class=" text-gray-600" />
    @endif
  </div>
  <div class="w-full">
    <h2 class="font-bold text-base md:text-xl max-w-lg leading-5">{{$book->title}} {{$book->title_description != '' ? '-
      "'.$book->title_description.'"'
      :
      ''}}
    </h2>
    <div class="mt-2 text-base md:text-lg ">
      <h5 class="leading-5">
        <span class="w-20 md:w-36 inline-flex">Penulis</span>: {{$book->author->name}}
      </h5>
      <h5 class="leading-5">
        <span class="w-20 md:w-36 inline-flex">Kategory</span>: {{$book->category->name}}
      </h5>
      <h5 class="leading-5">
        <span class="w-20 md:w-36 inline-flex">Penulis</span>: {{$book->isbn}}
      </h5>
      <h5 class="leading-5 flex max-w-lg">
        <span class="w-20 md:w-36 flex-shrink-0">Terbitan</span> :&nbsp;<span class="">{{$book->publisher->name}},
          {{$book->published_at}}.
          Tahun
          {{$book->publication_year}}</span>
      </h5>
      <h5 class="leading-5">
        <span class="w-20 md:w-36 inline-flex">Jumlah</span>: {{$book->amount}} buku
      </h5>
      <h5 class="leading-5">
        <span class="w-20 md:w-36 inline-flex">Tempat</span>: Rak {{$book->category->place}}
      </h5>
      <h5 class="leading-5">
        <span class="w-20 md:w-36 inline-flex">Jumlah halaman</span>: {{$book->exemplar}} halaman
      </h5>
      <div class="w-full text-sm md:text-lg flex justify-between font-poppins font-semibold">
        <h5 class="leading-5">
          <span class="w-20 md:w-36 inline-flex">Kode buku</span>: {{$book->book_code}}
        </h5>
        {!!$book->stock->stock > 0 ? '<h6 class="text-blue-600">Tersedia</h6>' : '<h6 class="text-red-500">
          Kosong</h6>'!!}
      </div>
    </div>
  </div>
</div>