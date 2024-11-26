@props(['active' => false])

<a href="{{ $attributes['href'] }}" class="{{ $active ? 'inline-flex items-center justify-center py-3 text-purple-700 bg-white rounded-lg' : 'inline-flex items-center justify-center py-3 hover:text-gray-400 hover:bg-gray-700 focus:text-gray-400 focus:bg-gray-700 rounded-lg' }}">
    {{ $slot }}
</a> 
