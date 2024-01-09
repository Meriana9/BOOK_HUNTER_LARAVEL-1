<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($authors as $author)
        <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <img class="w-full h-48 object-cover" src="{{ $author->picture }}" alt="Movie Cover" />
            <div class="p-4">
                <h3 class="text-xl font-bold mb-2">{{ $author->firstname }} {{ $author->lastname }}</h3>
                <div class="flex items-center mb-2">
                    <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                    <span>8.9</span>
                </div>
                <p class="text-gray-400">
                    {{ $author->biography }}
                </p>
                <a href="author.html"
                    class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                    More details
                </a>
            </div>
        </article>
    @endforeach
</div>
