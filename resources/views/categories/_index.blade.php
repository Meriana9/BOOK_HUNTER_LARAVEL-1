<ul class="list-reset">
    @foreach ($categories as $category)
        <li>
            <a class="text-gray-300 hover:text-white" href="#">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>
