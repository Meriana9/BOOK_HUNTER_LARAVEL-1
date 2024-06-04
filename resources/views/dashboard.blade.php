@extends('templates.index')

@section('title', 'Dashboard')

@section('content')
    @auth
        @php
            $contacts = \App\Models\Contact::orderBy('created_at', 'DESC')->limit(3)->get();
        @endphp

        @include('contacts._derniers', ['contacts' => $contacts])
    @else
        <div class="description">
            <h2 class="text-2xl font-bold mb-4">Bienvenue sur notre site de gestion de contacts !</h2>
            <p>Ce site vous permet de gérer facilement vos contacts, de les organiser par catégories, et bien plus encore.</p>
            <a href="{{ route('register') }}"
                class="text-white bg-blue-500 hover:bg-blue-700 rounded-full px-4 py-2 transition-colors duration-300 mt-4 inline-block">Inscrivez-vous
                maintenant</a>
            <a href="{{ route('login') }}"
                class="text-white bg-blue-500 hover:bg-blue-700 rounded-full px-4 py-2 transition-colors duration-300 mt-4 inline-block">Connectez-vous
            </a>
        </div>
    @endauth
@stop
