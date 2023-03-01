@props(['listing'])
@php
    $tags = explode(',', $listing->tags)
@endphp

@foreach ($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/listings/{{$tag}}">{{$tag}}</a>
    </li>
@endforeach