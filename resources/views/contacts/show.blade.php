@extends('templates.index')

@section('content')

    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <main class="w-full md:w-3/4 p-4">
            <div class="container mx-auto flex flex-wrap pb-12">
                <!-- Page de détail du contact -->
                <section class="w-full">
                    <section class="mb-20">
                        <div class="bg-gray-700 rounded-lg shadow-lg contact-card" data-contact-type="personal">
                            <div class="md:flex">
                                <!-- Image du contact -->
                                <div class="w-full md:w-1/2 relative">
                                    <img class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                                        src="{{ asset('images/' . $contact->profile_image) }}"
                                        alt="{{ $contact->first_name }} {{ $contact->last_name }}" />
                                    <div class="absolute top-4 right-4">
                                        <button
                                            class="text-white bg-gray-400 hover:bg-red-700 rounded-full p-2 transition-colors duration-300"
                                            style="
                                            width: 40px;
                                            height: 40px;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                        ">
                                            <i class="fa fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Détails du contact -->
                                <div class="p-6 md:w-1/2">
                                    <h2 class="text-3xl font-bold mb-2 text-white">
                                        {{ $contact->first_name }} {{ $contact->last_name }}
                                    </h2>
                                    <p class="text-gray-300 text-sm mb-4">
                                        {{ $contact->email }}
                                    </p>
                                    <div class="mb-4">
                                        <strong class="text-white">Téléphone:</strong>
                                        <span class="text-pink-400">{{ $contact->phone }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <strong class="text-white">Adresse:</strong>
                                        <span class="text-gray-300">{{ $contact->address }}</span>
                                    </div>
                                    <div class="mb-4">
                                        <strong class="text-white">Date de Naissance:</strong>
                                        <span class="text-gray-300">{{ $contact->date_of_birth }}</span>
                                    </div>
                                    <div class="flex">
                                        <a href="{{ route('contacts.edit', $contact->id) }}"
                                            class="inline-block text-white bg-gray-500 hover:bg-gray-700 rounded-full px-4 py-2 transition-colors duration-300 mr-2">Modifier</a>
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                </section>
            </div>
        </main>
    </div>
@stop
