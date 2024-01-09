@extends('templates.index')

@section('title')
    Books
@stop

@section('content')
    @php
        $books = \App\Models\Book::orderBy('created_at', 'DESC')->paginate(9);
    @endphp

    <h2 class="text-2xl font-bold mb-4">Books</h2>
    @include('books._index', ['books' => $books])

    <div>{{ $books->links() }}</div>
@stop
