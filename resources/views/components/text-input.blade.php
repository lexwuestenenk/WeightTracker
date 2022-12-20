@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-800 focus:border-indigo-500 focus:ring-indigo-500 bg-gray-900 rounded-md shadow-sm']) !!}>
