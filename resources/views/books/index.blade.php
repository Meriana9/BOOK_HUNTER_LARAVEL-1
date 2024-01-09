@extends('templates.index')

@section('title')
    Books
@stop

@section('content')
    <h2 class="text-2xl font-bold mb-4">Books</h2>
    @include('books._index', [
        'books' => \App\Models\Book::orderBy('created_at', 'DESC')->limit(9)->get(),
    ])

    <div>Pagination</div>
@stop
