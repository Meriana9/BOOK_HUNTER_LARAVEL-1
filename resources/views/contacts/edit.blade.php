<!-- resources/views/contacts/edit.blade.php -->

@extends('templates.index')

@section('content')

<div class="container mx-auto flex flex-wrap pt-4 pb-12">
    <main class="w-full md:w-3/4 p-4">
        <div class="container mx-auto pb-12">
            <div class="flex flex-wrap justify-center">
                <div class="w-full">
                    <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-4 text-center">
                            Modifier le contact "{{ $contact->first_name }} {{ $contact->last_name }}"
                        </h2>
                        <div>
                            <label for="categories" class="block mb-1">Catégories</label>
                            <select id="categories" name="categories[]" multiple class="w-full border rounded px-3 py-2 text-gray-700">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <form method="POST" action="{{ route('contacts.update', ['contact' => $contact->id]) }}">
                            @csrf
                            @method('PUT')

                            <!-- Prénom -->
                            <div>
                                <label for="first_name" class="block mb-1">Prénom</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $contact->first_name }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700" required>
                            </div>

                            <!-- Nom de famille -->
                            <div>
                                <label for="last_name" class="block mb-1">Nom de famille</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $contact->last_name }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700" required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-1">Email</label>
                                <input type="email" id="email" name="email" value="{{ $contact->email }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700" required>
                            </div>

                            <!-- Téléphone -->
                            <div>
                                <label for="phone" class="block mb-1">Téléphone</label>
                                <input type="text" id="phone" name="phone" value="{{ $contact->phone }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700">
                            </div>

                            <!-- Adresse -->
                            <div>
                                <label for="address" class="block mb-1">Adresse</label>
                                <input type="text" id="address" name="address" value="{{ $contact->address }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700">
                            </div>

                            <!-- Entreprise -->
                            <div>
                                <label for="company" class="block mb-1">Entreprise</label>
                                <input type="text" id="company" name="company" value="{{ $contact->company }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700">
                            </div>

                            <!-- Date de naissance -->
                            <div>
                                <label for="date_of_birth" class="block mb-1">Date de naissance</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ $contact->date_of_birth }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700">
                            </div>

                            <!-- Notes -->
                            <div>
                                <label for="notes" class="block mb-1">Notes</label>
                                <textarea id="notes" name="notes" class="w-full border rounded px-3 py-2 text-gray-700">{{ $contact->notes }}</textarea>
                            </div>

                            <!-- Image de profil -->
                            <div>
                                <label for="profile_image" class="block mb-1">Image de profil</label>
                                <input type="text" id="profile_image" name="profile_image" value="{{ $contact->profile_image }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700">
                            </div>

                            <!-- Dernier contact -->
                            <div>
                                <label for="last_contacted_at" class="block mb-1">Dernier contact</label>
                                <input type="date" id="last_contacted_at" name="last_contacted_at" value="{{ $contact->last_contacted_at }}"
                                    class="w-full border rounded px-3 py-2 text-gray-700">
                            </div>

                            <!-- Bouton pour soumettre le formulaire -->
                            <button type="submit" class="bg-red-400 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mt-4">
                                Modifier le contact
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@stop
