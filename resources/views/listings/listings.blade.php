@extends('layout')

@section('content')

@include('blocks.hero')
@include('blocks.search')

@foreach ($listings as $listing)

    
<div class="bg-gray-50 border border-gray-200 rounded p-6">
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src={{$listing->logo ? asset('storage/'.$listing->logo) : asset('images/no-image.png')}}
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/details/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">
                {{$listing->company}}
            </div>
            <ul class="flex">

                <x-tags :listing="$listing" />
            </ul>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</div>

@endforeach
    <div class="mt-5">
        {{$listings->links()}}
    </div>
@endsection