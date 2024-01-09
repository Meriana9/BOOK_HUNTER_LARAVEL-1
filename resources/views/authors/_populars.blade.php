<h2 class="text-2xl font-bold mt-8 mb-4">Popular authors</h2>
@include('authors._index', [
    'authors' => \App\Models\Author::orderBy('created_at', 'DESC')->limit(3)->get(),
])
