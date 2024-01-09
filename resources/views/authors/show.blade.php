@extends('templates.index')

@section('title')
    {{ $author->title }}
@stop

@section('content')
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/3 px-1 lg:px-4 mb-4">
                <img class="w-full h-auto rounded-lg" src="{{ $author->picture }}"
                    alt="{{ $author->firstname }} {{ $author->lastname }}" />
            </div>
            <div class="w-full lg:w-2/3 px-1 lg:px-4 mb-4">
                <h2 class="font-bold text-2xl mb-2">{{ $author->firstname }} {{ $author->lastname }}</h2>
                <p class="text-gray-300 mb-4">Biographie:</p>
                <p class="text-gray-300 mb-4">
                    {{ $author->biography }}
                </p>
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500 mr-1">
                        <i class="fas fa-star"></i>
                    </span>
                    <span>9.0</span>
                </div>
                <ul class="list-disc list-inside text-gray-300">
                    @foreach ($author->books as $book)
                        <li>
                            <a href="{{ route('books.show', [
                                'book' => $book->id,
                                'slug' => \illuminate\Support\Str::slug($book->title, '-'),
                            ]) }}"
                                class="hover:text-red-500 underline font-medium">{{ $book->title }}</a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </div>
@stop
