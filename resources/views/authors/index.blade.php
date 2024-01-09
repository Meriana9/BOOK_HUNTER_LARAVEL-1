@extends('templates.index')

@section('title')
    Authors
@stop

@section('content')
    <h2 class="text-2xl font-bold mb-4">Authors</h2>
    @include('authors._index', [
        'authors' => \App\Models\Author::orderBy('created_at', 'DESC')->limit(9)->get(),
    ])

    <div>Pagination</div>
@stop
