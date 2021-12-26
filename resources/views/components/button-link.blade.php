@props(['title' => '', "link" => ''])
<a href="{{$link}}">
  <x-button title="{{$title}}">
    {{$slot}}
  </x-button>
</a>