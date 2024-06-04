<ul class="list-reset">
    @foreach ($categories as $category)
    <li>
        <a href="{{ route('contacts.filterByCategory', $category->id) }}">{{ $category->name }}</a>
    </li>
@endforeach

</ul>
