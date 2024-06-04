@extends('templates.index')

@section('title', 'Résultats de recherche')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Résultats de recherche pour "{{ $searchTerm }}"</h2>

    @if($contacts->isEmpty())
        <p class="text-gray-700">Aucun contact trouvé.</p>
    @else
        @foreach ($contacts as $contact)
            <div class="bg-gray-700 rounded-lg shadow-lg contact-card mb-4 p-6">
                <h3 class="text-xl font-bold text-pink-500">{{ $contact->first_name }} {{ $contact->last_name }}</h3>
                <p class="text-gray-300">Email: {{ $contact->email }}</p>
                <p class="text-gray-300">Téléphone: {{ $contact->phone }}</p>
                <p class="text-gray-300">Adresse: {{ $contact->address }}</p>
                <p class="text-gray-300">Date de Naissance: {{ $contact->date_of_birth }}</p>
                <div class="mt-4">
                    <a href="{{ route('contacts.show', $contact->id) }}" class="text-white bg-pink-500 hover:bg-pink-700 rounded-full px-4 py-2 transition-colors duration-300">Voir</a>
                    <a href="{{ route('contacts.edit', $contact->id) }}" class="text-white bg-pink-500 hover:bg-pink-700 rounded-full px-4 py-2 transition-colors duration-300 ml-2">Modifier</a>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-pink-500 hover:bg-pink-700 rounded-full px-4 py-2 transition-colors duration-300 ml-2">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach

        {{ $contacts->links() }}
    @endif
@endsection
