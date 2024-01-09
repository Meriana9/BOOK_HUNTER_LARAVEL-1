<h2 class="text-2xl font-bold mb-4">Popular books</h2>
@include('books._index', [
    'books' => \App\Models\Book::orderBy('created_at', 'DESC')->limit(3)->get(),
])
