<!-- resources/views/templates/partials/_header.blade.php -->
<header class="bg-cyan-700 shadow-lg relative top-8" x-data="{ open: false, userMenuOpen: false }">
    <nav class="container mx-auto px-4 py-4 mb-16 flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ route('pages.home') }}">
                <img src="{{ asset('images/linknest_logo.png') }}" alt="LinkNest Logo" class="h-32 mr-3 absolute"
                    style="top: -28px" />
            </a>
            <a href="{{ route('pages.home') }}" class="text-white font-bold text-xl hidden">LinkNest</a>
        </div>

        <button @click="open = !open" class="text-white md:hidden">
            <i class="fa fa-bars"></i>
        </button>

        <div class="hidden md:flex items-center">
            @if (Auth::check())
                <div class="relative" x-data="{ userMenuOpen: false }">
                    <button @click="userMenuOpen = !userMenuOpen" class="text-white">
                        <img src="{{ asset('images/user.webp') }}" alt="{{ Auth::user()->name }}" class="w-16" />
                    </button>

                    <div x-show="userMenuOpen" @click.away="userMenuOpen = false"
                        class="absolute right-0 mt-2 w-48 bg-gray-100 rounded-md shadow-lg pb-1 z-50">
                        <div class="text-gray-200 px-4 py-2 bg-gray-400 text-center">
                            Hello, {{ Auth::user()->name }}
                        </div>
                        <a href="{{ route('profile.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mon Profil</a>
                        <a href="{{ route('contacts.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Mes Contacts</a>
                        <a href="{{ route('favorites.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Favoris</a>
                        <a href="{{ route('contacts.create') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Ajouter un Contact</a>
                        <a href="{{ route('categories._index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Gérer les Catégories</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Se
                                Déconnecter</button>
                        </form>
                    </div>
                </div>
            @else
                <a class="text-gray-300 hover:text-white px-3 py-2 hover:bg-gray-700" href="{{ route('register') }}">Se
                    connecter</a>
            @endif
        </div>
    </nav>

    <!-- Menu pour mobile -->
    <div x-show="open" class="md:hidden p-8">
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700"
            href="{{ route('contacts.index') }}">Contacts</a>
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{ route('profile.index') }}">Mon
            Profil</a>
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700" href="{{ route('contacts.index') }}">Mes
            Contacts</a>
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700"
            href="{{ route('favorites.index') }}">Favoris</a>
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700"
            href="{{ route('contacts.create') }}">Ajouter un Contact</a>
        <a class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700"
            href="{{ route('categories._index') }}">Gérer les Catégories</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block bg-gray-900 text-white px-4 py-2 hover:bg-gray-700">Se
                Déconnecter</button>
        </form>
    </div>
</header>
