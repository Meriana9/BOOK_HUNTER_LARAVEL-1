@auth
    <!-- Aside -->
    <aside class="w-full md:w-1/4 p-4">
        <!-- Recherche -->
        <form action="{{ route('contacts.search') }}" method="GET" class="bg-gray-700 rounded-lg shadow-lg p-4 mb-6">
            <h2 class="font-bold text-lg mb-4">Recherche</h2>
            <input type="text" name="search" placeholder="Chercher un contact..." class="w-full p-2 mb-4 bg-gray-800 rounded" />
            <button type="submit" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded w-full">
                Chercher
            </button>
        </form>

        <!-- Catégories -->
        <div class="bg-gray-700 rounded-lg shadow-lg p-4 mb-4">
            <h2 class="font-bold text-lg mb-4">Catégories</h2>
            @include('categories._index', [
                'categories' => \App\Models\Category::orderBy('name', 'ASC')->get(),
            ])
        </div>

        <!-- Tags -->
        <div class="bg-gray-700 rounded-lg shadow-lg p-4">
            <h2 class="font-bold text-lg mb-4">Tags</h2>
            @include('tags._index', [
                'tags' => \App\Models\Tag::orderBy('name', 'ASC')->get(),
            ])
        </div>
    </aside>
@endauth
