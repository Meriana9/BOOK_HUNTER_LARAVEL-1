<!-- Aside -->
<aside class="w-full md:w-1/4 p-3">
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <h2 class="font-bold text-lg mb-4">Categories</h2>
        @include('categories._index', [
            'categories' => \App\Models\Category::orderBy('name', 'ASC')->get(),
        ])
    </div>
    <div class="bg-gray-700 rounded-lg shadow-lg p-4 mt-4">
        <h2 class="font-bold text-lg mb-4">Tags</h2>
        @include('tags._index', [
            'tags' => \App\Models\Tag::orderBy('name', 'ASC')->get(),
        ])
    </div>
</aside>
