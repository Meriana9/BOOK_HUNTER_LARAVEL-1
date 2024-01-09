@extends('templates.index')

@section('title')
    Popular Books and Authors
@stop

@section('content')
    @include('books._populars')
    @include('authors._populars')
@stop
