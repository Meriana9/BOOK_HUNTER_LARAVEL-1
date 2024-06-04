@extends('templates.index')

@section('title', 'Mes Favoris')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Mes Favoris</h2>

    @if ($favorites->isEmpty())
        <p class="text-gray-700">Vous n'avez pas encore de favoris.</p>
    @else
        @foreach ($favorites as $favorite)
            <div class="bg-gray-700 rounded-lg shadow-lg contact-card mb-4 p-6">
                <h3 class="text-xl font-bold text-pink-500">{{ $favorite->first_name }} {{ $favorite->last_name }}</h3>
                <p class="text-gray-300">Email: {{ $favorite->email }}</p>
                <p class="text-gray-300">Téléphone: {{ $favorite->phone }}</p>
                <p class="text-gray-300">Adresse: {{ $favorite->address }}</p>
                <p class="text-gray-300">Date de Naissance: {{ $favorite->date_of_birth }}</p>
                <div class="mt-4">
                    <a href="{{ route('contacts.show', $favorite->id) }}"
                        class="text-white bg-pink-500 hover:bg-pink-700 rounded-full px-4 py-2 transition-colors duration-300">Voir</a>
                    <a href="{{ route('contacts.edit', $favorite->id) }}"
                        class="text-white bg-pink-500 hover:bg-pink-700 rounded-full px-4 py-2 transition-colors duration-300 ml-2">Modifier</a>
                    <form action="{{ route('contacts.destroy', $favorite->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-pink-500 hover:bg-pink-700 rounded-full px-4 py-2 transition-colors duration-300 ml-2">Supprimer</button>
                    </form>
                    <form action="{{ route('favorites.remove', $favorite->id) }}" method="POST" class="inline-block ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-blue-500 hover:bg-blue-700 rounded-full px-4 py-2 transition-colors duration-300">Supprimer
                            du
                            favoris</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

    <div>{{ $favorites->links() }}</div>
@endsection
