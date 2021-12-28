@props(['title' => null, "link" => '', 'class' => ''])
<a href="{{$link}}">
  <x-button title="{{$title}}" class="{{$class}}">
    {{$slot}}
  </x-button>
</a>