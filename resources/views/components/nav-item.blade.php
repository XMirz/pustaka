<li class="">
    <a href="{{ $link }}" class="flex flex-row  items-center space-x-4 w-full px-3 py-2 rounded-lg {{ $isActive ? '
      bg-blue-500 text-white' : '' }}" href="#">
        {{$slot}}
        <span>{{$title}}</span>
    </a>
</li>