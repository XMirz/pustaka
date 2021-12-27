@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md outline-none border-1
border-gray-300
hover:border-blue-500 focus:border-blue-500 transition-all']) !!}>