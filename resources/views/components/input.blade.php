@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-red-500 focus:ring-red-500 rounded-md shadow-sm dark:border-gray-500 dark:focus:ring-gray-500 dark:focus:border-gray-700']) !!}>
