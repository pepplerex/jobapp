@extends('layout')

@section('content')
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>

        {{-- @foreach ($userListings as $listings)
            {{$listings->title}}
        @endforeach --}}
        

        <table class="w-full table-auto rounded-sm">
            <tbody>

                @if (count($listings) > 0)
                    @foreach ($listings as $listing)

                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a href="show.html">
                                {{$listing->title}}
                            </a>
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <a
                                href="listings/edit/{{$listing->id}}"
                                class="text-blue-400 px-6 py-2 rounded-xl"
                                ><i
                                    class="fa-solid fa-pen-to-square"
                                ></i>
                                Edit</a
                            >
                        </td>
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <form action="listings/delete/{{$listing->id}}" method="POST">
                                @csrf
                                <button class="text-red-600">
                                    <i
                                        class="fa-solid fa-trash-can"
                                    ></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                @else
                    <div class="px-4 py-8 bg-laravel rounded text-white border text-center border-red-300 text-xxlg">
                        <h1>You have not posted any job listings yet.</h1>
                    </div>
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection