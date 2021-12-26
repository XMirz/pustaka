@props(['title' => '', "type" => "button"])
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-500 text-white rounded-md bg
    flex flex-row items-center space-x-2 py-2 px-3 font-poppins font-medium uppercase tracking-wider shadow-xl
    shadow-blue-500/30 hover:shadow-blue-500/50 transition-all']) }}>
    {{ $slot }}
    <span>{{$title}}</span>
</button>