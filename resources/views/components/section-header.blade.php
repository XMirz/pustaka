@props(['title' => ''] )

<div class="flex flex-row justify-between items-center">
  <h1 class="font-bold text-gray-700 text-2xl">{{$title}}</h1>
  <div class="flex flex-row justify-around items-center">
    {{$slot}}
  </div>
</div>