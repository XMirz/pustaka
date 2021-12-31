@props(['book'])
<div href="{{route('books.index')}}" id=" total-books-card"
  class="text-lg flex-grow  border border-black/10 bg-white px-8 py-5 rounded-md shadow-sm">
  <h2 class="font-bold text-xl max-w-fit">{{$book->title}} {{$book->title_description != '' ? '-
    "'.$book->title_description.'"'
    :
    ''}}
  </h2>
  <h5 class="">oleh {{$book->author->name}}</h5>
  <div class="mt-2 leading-5">
    <h5 class="">
      <span class="w-36 inline-flex">Jumlah</span>: {{$book->amount}} buku
    </h5>
    <h5 class="">
      <span class="w-36 inline-flex">Penerbit</span>: {{$book->publisher->name}}, {{$book->published_at}}. Tahun
      {{$book->publication_year}}
    </h5>
    <h5 class="">
      <span class="w-36 inline-flex">Jumlah halaman</span>: {{$book->exemplar}} halaman
    </h5>
  </div>
</div>