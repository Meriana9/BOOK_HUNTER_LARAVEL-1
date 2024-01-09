@extends('templates.index')

@section('title')
    {{ $book->title }}
@stop

@section('content')
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/3 px-1 lg:px-4 mb-4">
                <img class="w-full h-auto rounded-lg" src="{{ $book->cover }}" alt="{{ $book->title }}" />
            </div>
            <div class="w-full lg:w-2/3 px-1 lg:px-4 mb-4">
                <h2 class="font-bold text-2xl mb-2">{{ $book->title }}</h2>
                <p class="text-gray-300 mb-4">
                    Par
                    <a href="{{ route('authors.show', [
                        'author' => $book->author->id,
                        'slug' => \Illuminate\Support\Str::slug($book->author->firstname . ' ' . $book->author->lastname, '-'),
                    ]) }}"
                        class="hover:text-red-500 underline font-medium">{{ $book->author->firstname }}
                        {{ $book->author->lastname }}</a>
                </p>
                <p class="text-gray-300 mb-4">Sortie le {{ $book->publicated_at }}</p>
                <p class="text-gray-300 mb-4">Genre: {{ $book->category->name }}</p>
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500 mr-1">
                        <i class="fas fa-star"></i>
                    </span>
                    <span>9.0</span>
                </div>
                <div class="flex flex-wrap">
                    @foreach ($book->tags as $tag)
                        <a href="#"
                            class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold mr-2 hover:bg-gray-800 hover:text-white">{{ $tag->name }}</a>
                    @endforeach

                </div>
                <a href="#" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                    Ajouter à ma collection
                </a>
            </div>
        </div>
        <div>
            <h3 class="font-bold text-lg mb-2">Résumé</h3>
            <p class="text-gray-300">
                {{ $book->resume }}
            </p>
        </div>
    </div>
@stop
